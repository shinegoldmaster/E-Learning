  
  <?php $__env->startSection('instructor-dashboard'); ?>   
  
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3><?php echo e(trans('instructor.instructor_Dashboard')); ?></h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">
			
				<?php echo $__env->make('instructor.instructor-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	
			</div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
                        
        
    <div class="section-title bg-info">
        <h3><?php echo e(trans('instructor.My_Info')); ?></h3>
    </div>
    <div id="user-info" class="register">
        <?php if($errors->any()): ?>							
		<section class="widget-title">
			<div class="alert alert-success">
				<p class="text-center">
					<?php echo e($errors->first()); ?>								
				</p>
			</div>
		</section>						
		<?php endif; ?>
		<div class="clearfix"></div>
		
        <form method="POST" action="/instructor/info-update" accept-charset="UTF-8" class="form-horizontal bordered" accept-char="UTF-8" data-parsley-validate="" novalidate="">
		   <?php echo e(csrf_field()); ?>

		<?php $__currentLoopData = $instructorInfo; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="row">
            <div class="col-md-10 col-md-offset-1 col-sm-12 col-xs-12">
                <div class="section-title bg-info">
                    <h3><?php echo e(trans('instructor.Basic_informations')); ?> </h3>
                </div>
                <div class="input-field col-md-6 col-sm-6 col-xs-12 ">
                    <input name="first_name1" id="first_name1" value="<?php echo e($item->firstname); ?>" placeholder="First Name" class="validate" type="text">
                    <label for="first_name1" class="active"><?php echo e(trans('instructor.First_Name')); ?></label>
                    <span class="help-block">                        
                    </span>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12 ">
                    <input name="last_name1" id="last_name1" value="<?php echo e($item->lastname); ?>" placeholder="Last Name" class="validate" type="text">
                    <label for="last_name1" class="active"><?php echo e(trans('instructor.Last_Name')); ?> </label>
                    <span class="help-block">                        
                    </span>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="username" id="username" value="<?php echo e($item->name); ?>" placeholder="Username" class="validate" type="text">
                    <span class="help-block">                        
                    </span>
                    <label for="username" class="active"><?php echo e(trans('instructor.Username')); ?></label>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="email1" id="email1" value="<?php echo e($item->email); ?>" placeholder="Email" class="validate" type="email">                            
                    </span>
                    <label for="email1" class="active"><?php echo e(trans('instructor.Email')); ?></label>
                </div>

                <!--div class="input-field col-md-12 col-sm-12 col-xs-12">
                    <input name="oldpass" data-parsley-minlength="6" id="oldpass" value="" placeholder="Enter old password" class="validate" type="password">
                    <label for="oldpass" class="active">Enter old password</label>
                </div-->

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="newpass" data-parsley-minlength="6" id="newpass" value="" placeholder="New password" class="validate" type="password">
                    <label for="newpass" class="active"><?php echo e(trans('instructor.New_password')); ?></label>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="renewpass" data-parsley-equalto="#newpass" id="renewpass" value="" placeholder="Re-enter new password" class="validate" type="password">
                    <label for="renewpass" class="active"><?php echo e(trans('instructor.Reenter_new_password')); ?></label>
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right: 0;margin-top: 20px;">

                        <div class="box">						  
						  <select class="wide" id="gender" name="gender" required>
							<?php if($item->gender == 1): ?>
								<option value="1" selected><?php echo e(trans('instructor.male')); ?></option>
								<option value="2"><?php echo e(trans('instructor.female')); ?></option>
							<?php else: ?>
								<option value="1"><?php echo e(trans('instructor.male')); ?></option>
								<option value="2" selected><?php echo e(trans('instructor.female')); ?></option>
							<?php endif; ?>
						  </select>
						  <label for="gender" class="active mt15"><?php echo e(trans('instructor.Gender')); ?>:</label>
						</div>
                    
                </div>

                <div class="input-field  col-md-6 ol-sm-6 col-xs-12 " style="padding-right: 0;margin-top: 20px;" >
                   
                        <div class="box">
						  
						  <select class="wide" id="language" name="language" required>
							<?php if($item->language == 1): ?>
								<option value="1" selected>English</option>
								<option value="2">العربية</option>
							<?php else: ?>
								<option value="1">English</option>
								<option value="2" selected>العربية</option>
							<?php endif; ?>
						  </select>
						  <label for="language" class="active  mt15"><?php echo e(trans('instructor.Language')); ?>:</label>
						</div>
                    
                </div>

                <div class="input-field col-md-6 col-sm-6 col-xs-12">
                    <input name="age1" min="10" max="100" id="age1" value="<?php echo e($item->age); ?>"  placeholder="Age" class="validate" type="number">
                    <label for="age1" class="active"><?php echo e(trans('instructor.Age')); ?></label>
                </div>
				<input type="hidden" name="user-status2" value="1">
                <div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right: 0;margin-top: 20px;">
                   <div class="box">					  
					  <select class="wide" id="country1" name="country1" required>
											
					  </select>
					  <label for="country1"  class="active  mt15"><?php echo e(trans('instructor.Country')); ?>:</label>
					</div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>

			<div class="row more-info">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="section-title bg-warning">
						<h3><?php echo e(trans('instructor.Additional_informations')); ?> </h3>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="phone1" data-parsley-type="number" name="phone1" value="<?php echo e($item->phone); ?>" type="text">
						<label for="phone1"><?php echo e(trans('instructor.Phone')); ?></label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="skype1" name="skype1" value="<?php echo e($item->skype); ?>" type="text">
						<label for="skype1" class="active"><?php echo e(trans('instructor.Skype_ID')); ?></label>
					</div>
					<div class="input-field col-md-12 col-sm-12 col-xs-12">
						<textarea id="notes1" name="notes1" class="materialize-textarea" ><?php echo e($item->notes); ?></textarea>
						<label for="notes1"><?php echo e(trans('instructor.Notes')); ?></label>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>

			<div class="row more-info">
				<div class="col-md-8 col-md-offset-2 col-sm-12">
					<div class="section-title bg-warning">
						<h3><?php echo e(trans('instructor.Your_Connections')); ?> </h3>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="cwhatsapp" name="cwhatsapp" value="" type="text">
						<label for="cwhatsapp"><?php echo e(trans('instructor.whatsapp')); ?></label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="csoma" name="csoma" value="" type="text">
						<label for="csomasoma')}}</label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="cline" name="cline" value="" type="text">
						<label for="cline"><?php echo e(trans('instructor.line')); ?></label>
					</div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12">
						<input id="cviber" name="cviber" value="" type="text">
						<label for="cviber"><?php echo e(trans('instructor.viber')); ?></label>
					</div>
					<div class="clearfix"></div>
				</div>
			</div>	

			<div class="row buttons">
				<div class="col-md-12 col-md-offset-4 col-xs-12">
					<div class="col-md-4 col-sm-6 col-xs-12">
						<button type="submit" class="btn btn-warning bg-warning btn-block waves-effect"><?php echo e(trans('instructor.save')); ?></button>
					</div>
				</div>
			</div>
			
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </form>
    </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
  
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>