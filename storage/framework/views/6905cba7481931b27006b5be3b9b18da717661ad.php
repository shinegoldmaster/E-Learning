<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header  text-center">
      <h1>
        <?php echo e(trans ('admin.Show_General_Information')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i><?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.Dashboard')); ?></li>
      </ol>
    </section>


	<section class="content">
        
        <div class="col-lg-6 connectedSortable ui-sortable">
          <!-- quick email widget -->
          <div class="box box-info">
            <div class="box-header">
              <i class="fa fa-envelope"></i>

              <h3 class="box-title"><?php echo e(trans ('admin.Quick_Email')); ?></h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <button type="button" class="btn btn-info btn-sm" data-widget="remove" data-toggle="tooltip" title="Remove">
                  <i class="fa fa-times"></i></button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body">
              <form action="#" method="post">
                <div class="form-group">
                  <input type="email" class="form-control" name="emailto" placeholder="<?php echo e(trans ('admin.Email_to')); ?>:">
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" placeholder="<?php echo e(trans ('admin.Subject')); ?>">
                </div>
                <div>
                  <textarea class="textarea" placeholder="<?php echo e(trans ('admin.Message')); ?>" style="width: 100%; height: 125px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
              </form>
            </div>
            <div class="box-footer clearfix">
              <button type="button" class="pull-right btn btn-default" id="sendEmail"><?php echo e(trans ('admin.Send')); ?>

                <i class="fa fa-arrow-circle-right"></i></button>
            </div>
          </div>
		</div>
		
		
    
        <div class="col-lg-6 connectedSortable ui-sortable">

          

          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header ui-sortable-handle" style="cursor: move;">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title"><?php echo e(trans ('admin.Calendar')); ?></h3>
              <!-- tools box -->
              <div class="pull-right box-tools">               
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
			<div class="col-sm-12">
                  
                  <div class="progress xs" style="margin-bottom: 2px;">
                    <div class="progress-bar progress-bar-green" style="width: 100%;"></div>
                  </div>
                  
                </div>
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
			
			<div class="box-footer text-black">
              <div class="row">            
               
                <div class="col-sm-12">
                  
                  <div class="progress xs">
                    <div class="progress-bar progress-bar-green" style="width: 100%;"></div>
                  </div>
                  
                </div>
               
              </div>
            
            </div>


			
	
          </div>
          <!-- /.box -->

        </div>
        <!-- right col -->
      
	  
	</section>
   
    <section class="content">
		<div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($studentCount); ?></h3>

				  <p><?php echo e(trans ('admin.Student_Registrations')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="/admin/usermanagement/show-user/0" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?> <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo e($instructorCount); ?></h3>

				  <p><?php echo e(trans ('admin.Instructor_Registrations')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="/admin/usermanagement/show-user/1" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo e($moderatorCount); ?></h3>

				  <p><?php echo e(trans ('admin.Moderator_Registrations')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="/admin/usermanagement/show-user/2" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		 
		</div>
	 </div>
	 <div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-red">
				<div class="inner">
				  <h3><?php echo e($totalCategoryCount); ?></h3>

				  <p><?php echo e(trans ('admin.Total_Categroy')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-list"></i>
				</div>
				<a href="/admin/categorymanagement" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalAppointmentCount); ?></h3>

				  <p><?php echo e(trans ('admin.Availiable_Appointments')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa  fa-table"></i>
				</div>
				<a href="/admin/appointmentmanagement" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo e($totalNewsCount); ?></h3>

				  <p><?php echo e(trans ('admin.All_News')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-newspaper-o"></i>
				</div>
				<a href="/admin/newsmanagement" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		 
		</div>
	 </div>
    </section>
   
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>