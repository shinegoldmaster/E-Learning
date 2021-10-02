  
  <?php $__env->startSection('frontend-content'); ?>   

<section id="content">

        <section class="register">
    <div class="container">
        <div class="section-title">
            <h3><?php echo e(trans('register.Sign_up')); ?></h3>
            <p><?php echo e(trans('register.register_p')); ?></p>
        </div>

        <form class="form-horizontal" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo e(csrf_field()); ?>

            <div class="row">
                <div class="col-md-8 col-md-offset-2 clearfix">
                    <h4 class="bg-info"><?php echo e(trans('register.info')); ?></h4>           
					
                    <div class="input-field col-md-6 col-sm-6 col-xs-12 ">
                        <label for="first_name" class="active"><?php echo e(trans('register.First_Name')); ?></label>
                        <input name="first_name" id="first_name" value="" placeholder="" class="validate" required autofocus type="text">
                        <span class="help-block">
                        </span>
                    </div>
                    <div class="input-field col-md-6 col-sm-6 col-xs-12">
                        <label for="last_name" class="active"><?php echo e(trans('register.Last_Name')); ?></label>
                        <input name="last_name" id="last_name" value="" placeholder="" class="validate" required type="text">
                        <span class="help-block">
                        </span>
                    </div>

                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group<?php echo e($errors->has('name') ? ' has-error' : ''); ?>">
                        <label for="name" class="active"><?php echo e(trans('register.Username')); ?> </label>
                        <input name="name" id="name" placeholder="" class="validate form-control" name="name" value="<?php echo e(old('name')); ?>" required  type="text">
						<?php if($errors->has('name')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('name')); ?></strong>
							</span>
						<?php endif; ?>
                        
                    </div>
					<input type="hidden" name="user-status" value="0">
                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
                        <label for="email" class="active"><?php echo e(trans('register.Email')); ?></label>
                        <input name="email" id="email" value="<?php echo e(old('email')); ?>" placeholder="" class="validate form-control" required type="email">
						
						<?php if($errors->has('email')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('email')); ?></strong>
							</span>
						<?php endif; ?>                       
                    </div>

                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
                        <label for="password" class="active"><?php echo e(trans('register.Password')); ?></label>
                        <input name="password" id="password" value="" placeholder="" class="validate form-control" required type="password">
						 <?php if($errors->has('password')): ?>
							<span class="help-block">
								<strong><?php echo e($errors->first('password')); ?></strong>
							</span>
						<?php endif; ?>
                    </div>

                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="password_confirm" class="active"><?php echo e(trans('register.Confirm')); ?></label>
                        <input name="password_confirmation" required  id="password_confirm" type="password">
                    </div>
					
					<div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right:0;">
				   
						<div class="box">
						  <label for="gender"><?php echo e(trans('register.Gender')); ?>:</label>
						  <select class="wide" id="gender" name="gender" required>
							<option value="1"><?php echo e(trans('register.male')); ?></option>
							<option value="2"><?php echo e(trans('register.female')); ?></option>						
						  </select>
						</div>
									
                    </div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right:0;">
				   
						<div class="box">
						  <label for="language"><?php echo e(trans('register.Language')); ?>:</label>
						  <select class="wide" id="language" name="language" required>
							<option value="1">English</option>
							<option value="2">العربية</option>						
						  </select>
						</div>
									
                    </div>
					
                    <div class="input-field col-md-6 col-sm-6 col-xs-12" style="margin: 45px auto;">
                        <label for="age" class="active"><?php echo e(trans('register.Age')); ?></label>
                        <input name="age" min="10" max="100" id="age" value="" type="number">
					</div>

					<div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right:0;margin: 45px auto;">
				   
						<div class="box">
						  <label for="country"><?php echo e(trans('register.Country')); ?>:</label>
						  <select class="wide" id="country" name="country" required>
												
						  </select>
						</div>
									
                    </div>               
                
            </div>
			
			
            <div class="row more-info">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h4 class="bg-warning"><?php echo e(trans('register.Add_info')); ?></h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="input-field col-md-6 col-xs-12">
                        <label for="phone"><?php echo e(trans('register.Phone')); ?></label>
                        <input id="phone"  name="phone" value=""  type="text">
                    </div>

                    <div class="input-field col-md-6 col-xs-12">
                        <label for="skype"><?php echo e(trans('register.Skype')); ?></label>
                        <input id="skype" name="skype" value=""  type="text">
                    </div>

                    <div class="input-field col-md-12 col-xs-12">
                        <label for="notes"><?php echo e(trans('register.Notes')); ?></label>
                        <textarea id="notes" name="notes" class="materialize-textarea" ></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
			
            <div class="row buttons">
                <div class="col-md-12 col-md-offset-4 col-xs-12">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <button type="submit" class="btn btn-warning bg-warning btn-block waves-effect"><?php echo e(trans('register.createacc')); ?></button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
    </section>

  <?php $__env->stopSection(); ?> 

<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>