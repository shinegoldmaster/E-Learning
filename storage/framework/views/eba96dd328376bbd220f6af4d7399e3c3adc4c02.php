<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

 
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        <?php echo e(trans ('admin.Appointment_Management')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i> <?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.Appointment_Management')); ?></li>
      </ol>
    </section>

   
    <section class="content">	
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($appointmentCount); ?></h3>
				  <p><?php echo e(trans ('admin.Total_Appointments')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-table" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?> <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
						
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo e($instructorCount); ?></h3>
				  <p><?php echo e(trans ('admin.Instructor')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?>  <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
		</div>		
	
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
			

			<?php if(count($errors)): ?>							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center"><?php echo e($errors->first()); ?>						
					</p>
				</div>
			</section>						
			<?php endif; ?>
				
			<form method="POST" action="/admin/appointment-register" accept-charset="UTF-8" class="form-horizontal bordered" style="float: right;width: 100%;background: white;">
				<?php echo e(csrf_field()); ?>	
				<table class="table table-bordered">
					<tbody>	
						<tr class="text-center"><td colspan="3"><h4><?php echo e(trans ('admin.Appointments_Schedule')); ?> (<?php echo e(trans ('admin.Time_Table')); ?>) </h4></td></tr>
						<tr class="text-center">							
							<td  class="col-md-4 col-sm-4 col-xs-12"  style="border-bottom:none"><?php echo e(trans ('admin.Instructor')); ?></td>
							<td colspan="2" class="col-md-8 col-sm-8 col-xs-12"  style="border-bottom:none"><?php echo e(trans ('admin.Date_time_range')); ?></td>
						</tr>
						<tr>							
							<td class="col-md-4 col-sm-4 col-xs-12" style="border-top:none">
								<select class="form-control"  name="joinid"  >			
									<option value="0" selected><?php echo e(trans ('admin.Select_Instructor')); ?></option>
									<?php $__currentLoopData = $joinList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
								</select>		
							</td>
							
							<td  class="date-picker col-md-4 col-sm-4 col-xs-12"  style="border-top:none; border-right:none;">
								<input type="text" name="sessiondate" value="" id="datetimepicker2"/>				
							</td>
						
							<td  class="col-md-4 col-sm-4 col-xs-12"  style="border-top:none; border-left:none;">
								<nav class="navbar" role="navigation">
								<div class="container-fluid">
								  
									<div class="form-group">
									  <select class="selectpicker" multiple data-actions-box="true" name="selecttimes">
										  <optgroup>
											<?php 
																					
												for($i=0; $i<24; $i++){
													for($j=0; $j<60; $j+=$timeInterval){
														$clocks = $i;
														$minutes = $j;						
														$seconds = "00";
														if($clocks < 10) $clocks = "0" . $clocks;
														if($minutes < 10) $minutes = "0" . $minutes;	
														$item = $clocks . ":" . $minutes . ":" . $seconds;											
														echo "<option>".$item."</option>";	
													}					
												} 
											?>		  
										  </optgroup>
									  </select>
									</div>
								</div>								
							  </nav>
							</td>
						</tr>	
						<tr class="text-center">
							<td class="text-center" colspan="3">
								<button type="submit" class="btn btn-info" data-original-title="schedule"><i class="fa fa-hand-o-down"></i>&nbsp;&nbsp;<?php echo e(trans ('admin.Appointment')); ?></button>	
							</td>
						</tr>
					
				</tbody>
				</table></form>
			</div>
		</div>
		
		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            
            <div class="box-body">
              <table class="table table-bordered admin-table">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th><?php echo e(trans ('admin.SubCategory_Title')); ?><a href="/admin/appointmentmanagement?sort=ctitle"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>  
                  <th><?php echo e(trans ('admin.Instructor_Name')); ?><a href="/admin/appointmentmanagement?sort=iname"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>				 
                  <th><?php echo e(trans ('admin.Session_Time')); ?><a href="/admin/appointmentmanagement?sort=time"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th> 				                  
                  <th style="width: 110px"><?php echo e(trans ('admin.Action')); ?></th>
                </tr>
				<?php $__currentLoopData = $appointmentList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>					
					  <td><?php echo e($key+1); ?></td>					 
					  <td><?php echo e($data->session_title); ?></td> 
					  <td><?php echo e($data->name); ?></td>
					  <td><?php echo e($data->session_time); ?></td>				 
					  <td>				
						<form method="POST" id="appointment-delete-form<?php echo e($data->id); ?>" action="/admin/appointment-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "appointmentid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#appointment-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i><?php echo e(trans ('admin.Delete')); ?></button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
            
		  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
		     <?php echo e($appointmentList->links()); ?>

		  </div>
		   </div> 
        </div>
		
		</div>
    </section>
	<!-- date-time-picker -->
	<script  src="<?php echo e(asset('js/admin/jquery.datetimepicker.full.js')); ?>" type="text/javascript">	</script>
	
    <script>
		$('#datetimepicker2').datetimepicker({
			timepicker:false,
			format:'Y-m-d',
			formatDate:'Y-m-d',
		});
    </script>
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>