
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        <?php echo e(trans ('admin.News_Management')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.News_Management')); ?></li>
      </ol>
    </section>

   
    <section class="content">	
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalNewsCount); ?></h3>

				  <p><?php echo e(trans ('admin.News')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-easel"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?> <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/newsmanagement/news-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>			
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <?php if($errors->any()): ?>							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center">				<?php echo e($errors->first()); ?>					
					</p>
				</div>
			</section>						
			<?php endif; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th style="width: 75px"><?php echo e(trans ('admin.Thumbernail')); ?></th>
                  <th><?php echo e(trans ('admin.Title')); ?><a href="/admin/newsmanagement?sort=name"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th><?php echo e(trans ('admin.Description')); ?></th>
                  <th><?php echo e(trans ('admin.Create_Date')); ?></th>
                  <th style="width: 210px"><?php echo e(trans ('admin.Action')); ?></th>
                </tr>
				<?php $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $img_url = 'images/news/details/'.$data->thumb; ?>
					<tr>					
					  <td><?php echo e($key+1); ?></td>
					  <td style="background-color: aliceblue;"><img class="text-center" src="<?php echo e(asset($img_url)); ?>" style="width:65px"></img></td>
					  <td><?php echo e($data->title); ?></td>
					  <td><?php echo e($data->des); ?></td>
					  <td><?php echo e($data->created_at); ?></td>
					  <td>						
						<a type="button" class="btn btn-info" href="/admin/newsmanagement/news-edit/<?php echo e($data->id); ?>" style="margin-left:10px"><i class="fa fa-edit"></i><?php echo e(trans ('admin.Edit')); ?></a>						
						<form method="POST" id="news-delete-form<?php echo e($data->id); ?>" action="/admin/news-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "newsid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#news-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i><?php echo e(trans ('admin.Delete')); ?></button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>        
				
              </tbody></table>
            </div>
            
          </div>    
        </div>
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<?php echo e($newsList->links()); ?>

		</div>
		</div>
    </section>   
  </div>
  <?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>