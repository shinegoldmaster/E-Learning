
  @extends('layouts/front-layout')
  @section('frontend-content')      
					
	<section id="content">
     	<section class="register">
			<div class="container">
				<div class="section-title">
					<h3>{{trans ('login.Sign_in') }}</h3>
				</div>
				<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
					<div class="row">

						<div class="col-md-8 col-md-offset-2">

							<h4 class="bg-blue"><i class="fa fa-user"></i> {{trans ('login.Sign_in') }}</h4>

							
							<label for="loginidentity">{{trans ('login.Username_Email') }}</label>
							<div class="input-field form-group{{ $errors->has('email') ? ' has-error' : '' }}">
								<i class="fa fa-envelope prefix active"></i>
								<input class="validate required" name="email" id="email" value="{{ old('email') }}" required autofocus placeholder="{{trans ('login.Username_Email') }}" type="email">
								@if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
							</div>
							<br>
							<label for="password">{{trans ('login.Password') }}</label>
							<div class="input-field form-group{{ $errors->has('password') ? ' has-error' : '' }}">
								<i class="fa fa-lock prefix active"></i>
								<input id="password" name="password" class="validate required" placeholder="{{trans ('login.Password') }}" required type="password"><ul class="parsley-errors-list" id="parsley-id-5465"></ul>
								@if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
							</div>
							<div class="input-field">
								<input name="remember" class="filled-in" id="filled-in-box1" {{ old('remember') ? 'checked' : '' }} type="checkbox">
								<label for="filled-in-box1" class="check">{{trans ('login.Remember_me') }}</label>
							</div><ul class="parsley-errors-list" id="parsley-id-multiple-remember"></ul>
						</div>
					</div>

					<div class="row buttons">
						<div class="col-md-12 col-md-offset-4 col-xs-12">
							<div class="col-md-4 col-sm-6 col-xs-12">
								<button type="submit" class="btn btn-blue btn-block waves-effect">{{trans ('login.Sign_in') }}</button>
							</div>
						</div>
						<div id="forget-password" class="col-md-12 col-md-offset-6 col-xs-12">
							<a href="{{ route('password.request') }}">
							   <u> {{trans ('login.Forgot_password') }} </u>
							</a>
						</div>
					</div>

				</form>
			</div>
		</section>     	
     </section>
	
	
  @stop  
	