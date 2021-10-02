<!doctype html>
<html lang="<?php echo e(config('app.locale')); ?>">
    	
	<head>
		<title><?php echo e(trans ('global.instructor')); ?>|<?php echo e(trans ('global.dashboard')); ?></title>
		<meta charset="UTF-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
		<meta name="title" content="Almaqraa">
		<meta name="keywords" content="المقرأة,وسط العلمية,القرآن,الكريم">
		<meta name="headline" content="Almaqraa">
		<meta name="description" content="  هي نافذة علمية إلكترونية ،
تقدم خدمة تعليم كتاب الله تلاوة وحفظا ، وتحفيظ السنة
والمتون العلمية ضبطا عبر الانترنت.
مسارات المقرأة:
– المسار الأول : تعليم القرآن الكريم ( رجال – نساء )
– المسار الثاني : تحفيظ السنة والمتون العلمية ( رجال – نساء )
	">
		<meta name="author" content="Al-maqraa">
		<meta name="generator" content="www.maqraa.com">
		<meta name="copyright" content="copyright free">
		<meta name="coverage" content="Worldwide">
		<meta name="original" content="yes">
		<meta name="kind" content="Quran">
		<meta name="language" content="English">
		<meta name="flanguage" content="English">
		<meta name="robots" content="follow">
		<meta name="googlebot" content="index, follow">
		<meta name="revisit-after" content="0 days">
		<meta name="identifier" content="https://maqraa.com/">
		<meta name="base_url" content="https://maqraa.com/en/en/">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">	
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />	
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" />
		<link href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css" rel="stylesheet" />
		<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		<link rel="shortcut icon" href="<?php echo e(asset('images/favicon.png')); ?>">
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">		
		<link href="<?php echo e(asset('css/main.css')); ?>" rel="stylesheet">		
		<link rel="stylesheet" href="<?php echo e(asset('css/niceselect/nice-select.css')); ?>">
		<link href="<?php echo e(asset('css/datepicker/material-datetime-picker.css')); ?>" rel="stylesheet">	
		<script src="<?php echo e(asset('js/jquery2.2.4.js')); ?>"></script>
		<script src="<?php echo e(asset('js/jquery.nice-select.js')); ?>"></script>

		<link href="<?php echo e(asset('css/design_v2.css')); ?>" rel="stylesheet">
		
		
		
		
		<style>				
			.jssorl-004-double-tail-spin img {
				animation-name: jssorl-004-double-tail-spin;
				animation-duration: 1.2s;
				animation-iteration-count: infinite;
				animation-timing-function: linear;
			}

			@keyframes  jssorl-004-double-tail-spin {
				from {
					transform: rotate(0deg);
				}
				to {
					transform: rotate(360deg);
				}
			}
			.jssorb051 .i {position:absolute;cursor:pointer;}
			.jssorb051 .i .b {fill:#fff;fill-opacity:0.5;stroke:#000;stroke-width:400;stroke-miterlimit:10;stroke-opacity:0.5;}
			.jssorb051 .i:hover .b {fill-opacity:.7;}
			.jssorb051 .iav .b {fill-opacity: 1;}
			.jssorb051 .i.idn {opacity:.3;}

			.jssora051 {display:block;position:absolute;cursor:pointer;}
			.jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
			.jssora051:hover {opacity:.8;}
			.jssora051.jssora051dn {opacity:.5;}
			.jssora051.jssora051ds {opacity:.3;pointer-events:none;}
		</style>	
		<script src="https://unpkg.com/babel-polyfill@6.2.0/dist/polyfill.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.js"></script>
	    <script src="https://cdnjs.cloudflare.com/ajax/libs/rome/2.1.22/rome.standalone.js"></script>
		<script  src="<?php echo e(asset('js/datetimepicker/material-datetime-picker.js')); ?>" type="text/javascript">	</script>	
	</head>
	<?php if(config('app.locale')  == 'en'): ?>
		<body class="ltr">
	<?php else: ?>
		<body class="rtl">
	<?php endif; ?>
        <div class="flex-center position-ref full-height">
           
            <div class="content">
                <div class="title m-b-md">
					<?php echo $__env->make('layouts.header-top', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<!-- start header -->
                    <nav class="navbar _v2 nav-bg-gray no-border no-margin no-padding">
						<div class="container">
							<div class="navbar-header">
								<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-2">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
								<a class="navbar-brand waves-effect waves-light _v2 logo-header" href="/">
									<img src="<?php echo e(asset('images/logo.png')); ?>" class="img-responsive" alt="">
								</a>
							</div>

							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-2">
								<ul class="nav navbar-nav navbar-right">
									<li class="mains active"><a href="/main" class="waves-effect waves-light"><?php echo e(trans ('global.main')); ?></a></li>
									<li class="abouts"><a href="/about" class="waves-effect"><?php echo e(trans ('global.about_us')); ?></a></li>
									<li class="programs"><a href="/program" class="waves-effect"><?php echo e(trans ('global.list_programs')); ?></a></li>				
									<li class="helps"><a href="/help" class="waves-effect"><?php echo e(trans ('global.help_page')); ?></a></li>
									<?php if(Route::has('login')): ?>
										
										<?php if(Auth::check()): ?>
											<li class="dropdown open">
												<a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="true">
													<i class="fa fa-bell"></i>
													<span class="badge">0</span>
												</a>
											</li>
											<li class="dropdown">
												<a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="false">
													<i class="fa fa-envelope"></i>
													<span class="badge" id="messageCount"><?php echo e($myMessageCount); ?></span>
												</a>
												<ul class="dropdown-menu notification-drop messages" role="menu">
													<li>
														<div class="read-more">												
															<a href="/instructor/msgs-received" class="btn btn-warning"><?php echo e(trans ('global.see_more')); ?></a>
														</div>
													</li>
												</ul>
											</li>
									
									
											<li class="dropdown">
												<a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="false">
													<i class="fa fa-user"></i>
													<?php echo e(Auth::user()->name); ?> 
													<span class="caret"></span>
												</a>
												<ul class="dropdown-menu" role="menu">
													<li>
														<a href="/instructor/instructor-info-show">
															<i class="fa fa-user"></i><?php echo e(trans ('global.edit_profile')); ?>

														</a>
													</li>
													
													<li>
														<a href="<?php echo e(route('logout')); ?>"	onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
															<i class="fa fa-sign-out"></i><?php echo e(trans ('global.sign_out')); ?>

														</a>

														<form id="logout-form" action="<?php echo e(route('logout')); ?>" method="POST" style="display: none;">
															<?php echo e(csrf_field()); ?>

														</form>
													</li>													
												</ul>
											</li>
										<?php else: ?>
											<li class="logins"><a href="#" data-toggle="modal" data-target="#modalLogin" class="waves-effect"><?php echo e(trans ('global.login')); ?></a></li>
											<li class="signups"><a href="/register/" class="waves-effect"><?php echo e(trans ('global.register')); ?></a></li>	
										<?php endif; ?>
										
									<?php endif; ?>
														
									<?php if(config('app.locale')  == 'en'): ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="false">
											<i class="fa fa-flag fa-right"></i>
											&nbsp;English
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu" role="menu">							
											<li>											
												<a href="/language/ar"	onclick="event.preventDefault(); document.getElementById('change-lagnuage1-form').submit();">
													العربية
												</a>

												<form id="change-lagnuage1-form" action="/language/ar" method="POST" style="display: none;">
													<?php echo e(csrf_field()); ?>

												</form>
											</li>
										</ul>
									</li>
									<?php else: ?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle waves-effect" data-toggle="dropdown" role="button" aria-expanded="false">
											<i class="fa fa-flag fa-right"></i>
											&nbsp;العربية
											<span class="caret"></span>
										</a>
										<ul class="dropdown-menu" role="menu">
											<li>
												<a href="/language/en"	onclick="event.preventDefault(); document.getElementById('change-lagnuage2-form').submit();">
													English
												</a>
												<form id="change-lagnuage2-form" action="/language/en" method="POST" style="display: none;">
													<?php echo e(csrf_field()); ?>

												</form>
											</li>							
										</ul>
									</li>
									<?php endif; ?>									
									
								</ul>
							</div>
						</div>
					</nav>
					<!-- end header -->
						
					
					<div class="modal fade" id="modalLogin" role="dialog">
						<div class="modal-dialog">

							<!-- Modal content-->
							<div class="modal-content">
								<div class="modal-header text-center">
									<h4><i class="fa fa-user"></i><?php echo e(trans ('global.login')); ?></h4>
								</div>
								<div class="modal-body">
									<div class="row">
										<span id="loginModaleMessage"></span>
										<form class="col-md-12" role="form" method="POST" action="<?php echo e(route('login')); ?>">
											 <?php echo e(csrf_field()); ?>

											<div class="row">												
												
												<div class="input-field">
													<label for="email" class="active"><?php echo e(trans ('global.username_or_email')); ?></label>
													<input class="validate" name="email" id="email" value="" placeholder="" required="" type="text">
													
												</div>
												<div class="input-field">
													<label for="password" class="active"><?php echo e(trans ('global.password')); ?></label>
													<input id="password" name="password" class="validate" placeholder="" required="" type="password">
													
												</div>
												<div class="input-field">
													<input name="remember" class="filled-in" id="filled-in-box" value="1" type="checkbox">
													<label for="filled-in-box" class="check"><?php echo e(trans ('global.remember_me')); ?></label>
												</div>
												<div class="text-center margin-top-10">
													<button type="submit" class="btn btn-warning bg-warning btn-block waves-effect" style="width: 100px;"><?php echo e(trans ('global.login')); ?></button>
												</div>
												<div class="text-center margin-top-10 loader" id="loginSpinner" style="display: none;"></div>
											</div>
										</form>
									</div>
								</div>
								<!--Footer-->
								<div class="modal-footer">
									<button id="close" type="submit" class="btn btn-default btn-default pull-left" data-dismiss="modal"><?php echo e(trans ('global.close')); ?></button>
									<div id="forget-password" class="options pull-right">
									   <a class="btn btn-info waves-effect waves-light" href="<?php echo e(route('password.request')); ?>">
										  <?php echo e(trans ('global.forgot_password')); ?>

									   </a>
									</div>
									<!--/.Footer-->
								</div>
								<!-- /.Modal content-->
							</div>
						</div>
					</div>
					
					
					
					<!-- start banner -->
					<div class="main-banner text-center _v2	">
						<div class="container">
							<div class="texts">
								<h1><?php echo e(trans ('global.recite_it_as_it_should_be_recited')); ?></h1>
								<h2><?php echo e(trans ('global.learn_reading_the_quran_correctly')); ?></h2>
								<p><?php echo e(trans ('global.now_you_can_learn_reading_remot')); ?></p>
							</div>
						</div>
					</div>
					<!-- end banner -->
					
					 <?php echo $__env->yieldContent('instructor-dashboard'); ?>
					
					<!-- start footer -->
					<?php echo $__env->make('layouts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
					<!-- end footer -->					
					
                </div>

                <div class="links">
                    
                </div>
            </div>
        </div>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
		<script  src="<?php echo e(asset('js/datetimepicker/datepickerforsearch.js')); ?>" type="text/javascript">	</script>
		<script  src="<?php echo e(asset('js/script.js')); ?>" type="text/javascript">	</script>		
    </body>
	
</html>
