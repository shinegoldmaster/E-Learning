
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	
<?php 
	$uri = $_SERVER['REQUEST_URI'];
	$orderDirection ='';
	if(substr_count($uri, '?') > 0){
		$orderDirection ='&direction=ASC';
		if(substr_count($uri, '&') > 0){
			$paramData = explode('&', $uri);
			$count = count($paramData) - 1;
			if($paramData[$count] == 'direction=ASC')
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
        <?php echo e(trans ('admin.Message_Management')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i><?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.Message_Management')); ?></li>
      </ol>
    </section>

   
    <section class="content">	
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($messageCount); ?></h3>
				  <p><?php echo e(trans ('admin.Total_Messages')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-envelope" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.Total_Messages')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
						
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo e($instructorCount); ?></h3>
				  <p><?php echo e(trans ('admin.Instructor')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-user-md"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?> <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo e($studentCount); ?></h3>
				  <p><?php echo e(trans ('admin.Student')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
		</div>		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
				<table class="table table-bordered">
				<tbody>
					<form method="GET" action="/admin/messagemanagement" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
						<?php echo e(csrf_field()); ?>	
						
						
						<tr class="text-center">							
							<td  class="col-md-2 col-sm-2 col-xs-12"  style="border-bottom:none"><?php echo e(trans ('admin.Instructor')); ?></td>
										
							<td class="col-md-3 col-sm-3 col-xs-12" style="border-top:none">
								<select class="form-control"  name="instructorid" required >			
									<option value="0" selected><?php echo e(trans ('admin.Select_Instructor')); ?></option>
									<?php $__currentLoopData = $instructorList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
								</select>		
							</td>
							
							<td  class="col-md-2 col-sm-2 col-xs-12"  style="border-bottom:none"><?php echo e(trans ('admin.Student')); ?></td>
										
							<td class="col-md-3 col-sm-3 col-xs-12" style="border-top:none">
								<select class="form-control"  name="studentid" required >			
									<option value="0" selected><?php echo e(trans ('admin.Select_Student')); ?></option>
									<?php $__currentLoopData = $studentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($data->id); ?>"><?php echo e($data->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
								</select>		
							</td>
							
							
							<td class="col-md-2 col-sm-2 col-xs-12 text-center">
								<button type="submit" class="btn btn-info" data-original-title="update"><i class="fa fa-search"></i>&nbsp;&nbsp;<?php echo e(trans ('admin.Filter')); ?></button>	
							</td>
						</tr>
					</form>
				</tbody>
				</table>
			</div>
		</div>
		
		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            <?php if($errors->any()): ?>							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center"><?php echo e($errors->first()); ?>						
					</p>
				</div>
			</section>						
			<?php endif; ?>           
            <div class="box-body">
              <table class="table table-bordered admin-table">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th><?php echo e(trans ('admin.Sender')); ?><a href="/admin/messagemanagement?sort=from<?php echo e($orderDirection); ?>"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>  
                  <th><?php echo e(trans ('admin.Receiver')); ?><a href="/admin/messagemanagement?sort=to<?php echo e($orderDirection); ?>"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>				 
                  <th><?php echo e(trans ('admin.Message_Contents')); ?><a href="/admin/messagemanagement?sort=contents<?php echo e($orderDirection); ?>"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th><?php echo e(trans ('admin.Date')); ?><a href="/admin/messagemanagement?sort=created_at<?php echo e($orderDirection); ?>"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th> 		     
               
                </tr>
				<?php $__currentLoopData = $messageList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>		
					<tr>					
					  <td><?php echo e($key+1); ?></td>					 
					  <td><?php echo e($data->sname); ?></td> 
					  <td><?php echo e($data->rname); ?></td>
					  <td><?php echo e($data->contents); ?></td>
					  <td><?php echo e($data->created_at); ?></td>
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
            
		  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
		     <?php echo e($messageList->links()); ?>

		  </div>
		   </div> 
        </div>
		
		</div>
    </section>
    <script>
		$(function () {
			$('#datetimepicker4').datetimepicker();
		});
    </script>
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>