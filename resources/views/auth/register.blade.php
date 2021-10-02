

  @extends('layouts/front-layout')
  @section('frontend-content')   

<section id="content">

        <section class="register">
    <div class="container">
        <div class="section-title">
            <h3>{{trans('register.Sign_up')}}</h3>
            <p>{{trans('register.register_p')}}</p>
        </div>

        <form class="form-horizontal" method="POST" action="{{ route('register') }}">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-8 col-md-offset-2 clearfix">
                    <h4 class="bg-info">{{trans('register.info')}}</h4>           
					
                    <div class="input-field col-md-6 col-sm-6 col-xs-12 ">
                        <label for="first_name" class="active">{{trans('register.First_Name')}}</label>
                        <input name="first_name" id="first_name" value="" placeholder="" class="validate" required autofocus type="text">
                        <span class="help-block">
                        </span>
                    </div>
                    <div class="input-field col-md-6 col-sm-6 col-xs-12">
                        <label for="last_name" class="active">{{trans('register.Last_Name')}}</label>
                        <input name="last_name" id="last_name" value="" placeholder="" class="validate" required type="text">
                        <span class="help-block">
                        </span>
                    </div>

                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label for="name" class="active">{{trans('register.Username')}} </label>
                        <input name="name" id="name" placeholder="" class="validate form-control" name="name" value="{{ old('name') }}" required  type="text">
						@if ($errors->has('name'))
							<span class="help-block">
								<strong>{{ $errors->first('name') }}</strong>
							</span>
						@endif
                        
                    </div>
					<input type="hidden" name="user-status" value="0">
                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <label for="email" class="active">{{trans('register.Email')}}</label>
                        <input name="email" id="email" value="{{ old('email') }}" placeholder="" class="validate form-control" required type="email">
						
						@if ($errors->has('email'))
							<span class="help-block">
								<strong>{{ $errors->first('email') }}</strong>
							</span>
						@endif                       
                    </div>

                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label for="password" class="active">{{trans('register.Password')}}</label>
                        <input name="password" id="password" value="" placeholder="" class="validate form-control" required type="password">
						 @if ($errors->has('password'))
							<span class="help-block">
								<strong>{{ $errors->first('password') }}</strong>
							</span>
						@endif
                    </div>

                    <div class="input-field col-md-6 col-sm-6 col-xs-12 form-group">
                        <label for="password_confirm" class="active">{{trans('register.Confirm')}}</label>
                        <input name="password_confirmation" required  id="password_confirm" type="password">
                    </div>
					
					<div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right:0;">
				   
						<div class="box">
						  <label for="gender">{{trans('register.Gender')}}:</label>
						  <select class="wide" id="gender" name="gender" required>
							<option value="1">{{trans('register.male')}}</option>
							<option value="2">{{trans('register.female')}}</option>						
						  </select>
						</div>
									
                    </div>
					<div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right:0;">
				   
						<div class="box">
						  <label for="language">{{trans('register.Language')}}:</label>
						  <select class="wide" id="language" name="language" required>
							<option value="1">English</option>
							<option value="2">العربية</option>						
						  </select>
						</div>
									
                    </div>
					
                    <div class="input-field col-md-6 col-sm-6 col-xs-12" style="margin: 45px auto;">
                        <label for="age" class="active">{{trans('register.Age')}}</label>
                        <input name="age" min="10" max="100" id="age" value="" type="number">
					</div>

					<div class="input-field col-md-6 col-sm-6 col-xs-12" style="padding-right:0;margin: 45px auto;">
				   
						<div class="box">
						  <label for="country">{{trans('register.Country')}}:</label>
						  <select class="wide" id="country" name="country" required>
												
						  </select>
						</div>
									
                    </div>               
                
            </div>
			
			
            <div class="row more-info">
                <div class="col-md-8 col-md-offset-2 col-sm-12">
                    <h4 class="bg-warning">{{trans('register.Add_info')}}</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-8 col-md-offset-2">

                    <div class="input-field col-md-6 col-xs-12">
                        <label for="phone">{{trans('register.Phone')}}</label>
                        <input id="phone"  name="phone" value=""  type="text">
                    </div>

                    <div class="input-field col-md-6 col-xs-12">
                        <label for="skype">{{trans('register.Skype')}}</label>
                        <input id="skype" name="skype" value=""  type="text">
                    </div>

                    <div class="input-field col-md-12 col-xs-12">
                        <label for="notes">{{trans('register.Notes')}}</label>
                        <textarea id="notes" name="notes" class="materialize-textarea" ></textarea>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
			
            <div class="row buttons">
                <div class="col-md-12 col-md-offset-4 col-xs-12">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <button type="submit" class="btn btn-warning bg-warning btn-block waves-effect">{{trans('register.createacc')}}</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
    </section>

  @stop 
