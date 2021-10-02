  
  <?php $__env->startSection('frontend-content'); ?>      
					
	<section id="content">
     	<section class="register">
			<div class="container">
				<div class="section-title">
					<h3><?php echo e(trans ('login.Sign_in')); ?></h3>
				</div>
				<form class="form-horizontal" method="POST" action="<?php echo e(route('login')); ?>">
                        <?php echo e(csrf_field()); ?>

					<div class="row">

						<div class="col-md-8 col-md-offset-2">

							<h4 class="bg-blue"><i class="fa fa-user"></i> <?php echo e(trans ('login.Sign_in')); ?></h4>

							
							<label for="loginidentity"><?php echo e(trans ('login.Username_Email')); ?></label>
							<div class="input-field form-group<?php echo e($errors->has('email') ? ' has-error' : ''); ?>">
								<i class="fa fa-envelope prefix active"></i>
								<input class="validate required" name="email" id="email" value="<?php echo e(old('email')); ?>" required autofocus placeholder="<?php echo e(trans ('login.Username_Email')); ?>" type="email">
								<?php if($errors->has('email')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
							<br>
							<label for="password"><?php echo e(trans ('login.Password')); ?></label>
							<div class="input-field form-group<?php echo e($errors->has('password') ? ' has-error' : ''); ?>">
								<i class="fa fa-lock prefix active"></i>
								<input id="password" name="password" class="validate required" placeholder="<?php echo e(trans ('login.Password')); ?>" required type="password"><ul class="parsley-errors-list" id="parsley-id-5465"></ul>
								<?php if($errors->has('password')): ?>
                                    <span class="help-block">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                                <?php endif; ?>
							</div>
							<div class="input-field">
								<input name="remember" class="filled-in" id="filled-in-box1" <?php echo e(old('remember') ? 'checked' : ''); ?> type="checkbox">
								<label for="filled-in-box1" class="check"><?php echo e(trans ('login.Remember_me')); ?></label>
							</div><ul class="parsley-errors-list" id="parsley-id-multiple-remember"></ul>
						</div>
					</div>

					<div class="row buttons">
						<div class="col-md-12 col-md-offset-4 col-xs-12">
							<div class="col-md-4 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-blue btn-block waves-effect"><?php echo e(trans ('login.Sign_in')); ?></button>
							</div>
						</div>
						<div id="forget-password" class="col-md-12 col-md-offset-6 col-xs-12">
							<a href="<?php echo e(route('password.request')); ?>">
							   <u> <?php echo e(trans ('login.Forgot_password')); ?> </u>
							</a>
						</div>
					</div>

				</form>
			</div>
		</section>     	
     </section>
	
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>