
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<?php 
	$uri = $_SERVER['REQUEST_URI'];
	$orderDirection ='';
	if(substr_count($uri, '?') > 0){
		$orderDirection ='&direction=ASC';
		if(substr_count($uri, '&') > 0){
			$paramData = explode('&', $uri);				
			if($paramData[1] == 'direction=ASC')
				$orderDirection = '&direction=DESC';
			else
				$orderDirection = '&direction=ASC';
		}
	}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        <?php echo e(trans ('admin.User_Management')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.User_Management')); ?></li>
      </ol>
    </section>

    <section class="content">	
	<div class="row">	
		<div class="text-center">
			<h3><?php echo e($userType); ?> <?php echo e(trans ('admin.List')); ?></h3>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/usermanagement" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <?php if($errors->any()): ?>							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center">
						<?php echo e($errors->first()); ?>								
					</p>
				</div>
			</section>						
			<?php endif; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th><?php echo e(trans ('admin.Name')); ?><a href="/admin/usermanagement/show-user/<?php echo e($id); ?>?sort=name<?php echo e($orderDirection); ?>"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th><?php echo e(trans ('admin.Email')); ?><a href="/admin/usermanagement/show-user/<?php echo e($id); ?>?sort=email<?php echo e($orderDirection); ?>"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th><?php echo e(trans ('admin.Phone')); ?><a href="/admin/usermanagement/show-user/<?php echo e($id); ?>?sort=phone<?php echo e($orderDirection); ?>"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th><?php echo e(trans ('admin.Status')); ?></th>
                  <th style="width: 210px"><?php echo e(trans ('admin.Action')); ?></th>
                </tr>
				<?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<tr>					
					  <td><?php echo e($key+1); ?></td>
					  <td><?php echo e($list->name); ?></td>
					  <td><?php echo e($list->email); ?></td>
					  <td><?php echo e($list->phone); ?></td>
					  <td>
						<?php if($list->status == 0): ?>
							<?php echo e(trans ('admin.Student')); ?>

						<?php elseif($list->status == 1): ?>
							<?php echo e(trans ('admin.Instructor')); ?>

						<?php elseif($list->status == 2): ?>
							<?php echo e(trans ('admin.Moderator')); ?>

						<?php else: ?>
							<?php echo e(trans ('admin.Admin')); ?>

						<?php endif; ?>
					  </td>
					  <td>						
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#user_<?php echo e($list->id); ?>" style="margin-left:10px"><i class="fa fa-edit"></i><?php echo e(trans ('admin.Update')); ?></button>						
						<form method="POST" id="user-delete-form<?php echo e($list->id); ?>" action="/admin/user-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "userid" value="<?php echo e($list->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#user-delete-form<?php echo e($list->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i><?php echo e(trans ('admin.Delete')); ?></button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
				
              </tbody></table>
            </div>
            
          </div>    
		  <?php $__currentLoopData = $userList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			<!-- Modal -->
			<div class="modal fade modal-success" id="user_<?php echo e($list->id); ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<form method="POST" action="/admin/user-update" accept-charset="UTF-8" role="form">
				<?php echo e(csrf_field()); ?>	
					<input name = "userid" value="<?php echo e($list->id); ?>"  type="hidden" />
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title" id="myModalLabel"><?php echo e(trans ('admin.User_Update')); ?></h3>
					  </div>
					  <div class="modal-body">
						  <p><?php echo e(trans ('admin.Change_Status')); ?>: </p>									  
						  <select class="form-control" id="userstatus" name="userstatus" required >
							<?php if($list->status == 0): ?>
								<option value="0" selected><?php echo e(trans ('admin.Student')); ?></option>
								<option value="1"><?php echo e(trans ('admin.Instructor')); ?></option>
								<option value="2"><?php echo e(trans ('admin.Moderator')); ?></option>
							<?php elseif($list->status == 1): ?>
								<option value="0"><?php echo e(trans ('admin.Student')); ?></option>
								<option value="1" selected><?php echo e(trans ('admin.Instructor')); ?></option>
								<option value="2"><?php echo e(trans ('admin.Moderator')); ?></option>
							<?php else: ?>
								<option value="0"><?php echo e(trans ('admin.Student')); ?></option>
								<option value="1"><?php echo e(trans ('admin.Instructor')); ?></option>
								<option value="2" selected<?php echo e(trans ('admin.Moderator')); ?>></option>
							<?php endif; ?>
						  </select>								
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-outline pull-left" data-dismiss="modal"><?php echo e(trans ('admin.Close')); ?></button>
						<button type="submit" class="btn btn-outline"><?php echo e(trans ('admin.Save_changes')); ?></button>
					  </div>
					</div>
				</form>
			  </div>
			</div>
		  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
		<div class="col-md-9 col-sm-9 col-xs-12 text-center">
		<?php echo e($userList->links()); ?>

		</div>
	</div>
    </section>   
  </div>  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>