
  @extends('layouts/front-layout')
  @section('frontend-content')     
	<link href="{{ asset('css/main1.css') }}" rel="stylesheet">	
	
	<section class="features inner">
		<div class="container">
			<div class="section-title _v2">
				<h3>{{trans('frontend.help_page')}}</h3>
				<p>{{trans('frontend.Maqraa_easy_handle_improve_reading')}}<br>
					{{trans('frontend.Al_Maqraa_working_Saturday')}}</p>
			</div>
		</div>

		<div class="row">

			<section class="">
				<div class="container">
					<div class="block text-center">
					
						<div class="section-title _v2">
					        	<h3>{{trans('frontend.First_Register_in_Al_Maqraa')}}</h3>
				        	</div>
						<ul class="help-list">
							<li>
								<p><strong>{{trans('frontend.help1_1')}}</strong></p>
								<span class="arrow"></span>
								<figure class="img-container"><img src="{{ asset('images/help/shot1.png') }}" alt=""></figure>
							</li>
							<li>
								<p><strong>{{trans('frontend.help1_2')}}</strong></p>
								<span class="arrow"></span>
								<figure class="img-container"><img src="{{ asset('images/help/shot2.png') }}" alt=""></figure>
							</li>
							<li>
								<p><strong>{{trans('frontend.help1_3')}}</strong></p>
							</li>
						</ul>

						
						<div class="section-title _v2">
					        	<h3>{{trans('frontend.Second_Book_appointment')}}</h3>
				        	</div>
				        	
						<ul class="help-list">
							<li>
								<p><strong>{{trans('frontend.help2_1')}}</strong></p>
								<figure class="img-container"><img src="{{ asset('images/help/shot3.png') }}" alt=""></figure>
							</li>
							<li>
								<p><strong>{{trans('frontend.help2_2')}}</strong></p>
								<figure class="img-container"><img src="{{ asset('images/help/shot4.png') }}" alt=""></figure>
							</li>
							<li>
								<p><strong>{{trans('frontend.help2_3')}}</strong></p>
								<figure class="img-container"><img src="{{ asset('images/help/shot5.png') }}" alt=""></figure>
							</li>
							<li>
								<p><strong>{{trans('frontend.help2_4')}}</strong></p>
								<figure class="img-container"><img src="{{ asset('images/help/shot6.png') }}" alt=""></figure>
							</li>
						</ul>
						


						
						
						<div class="section-title _v2">
					        	<h3>{{trans('frontend.Third_recitation')}}</h3>
				        	</div>
						
						<ul class="help-list">
							<li>
								<p><strong>{{trans('frontend.help3_1')}}</strong></p>
								<figure class="img-container"><img src="{{ asset('images/help/shot7.png') }}" alt=""></figure>
							</li>
							<li>
								<p><strong>{{trans('frontend.help3_2')}}</strong></p>
								<figure class="img-container plus-space"><img src="{{ asset('images/help/shot8.png') }}" alt=""></figure>

								<p><strong>{{trans('frontend.help3_3')}}</strong></p>
								<figure class="img-container plus-space"><img src="{{ asset('images/help/shot9.png') }}" alt=""></figure>

                                <p><strong>٤- التأكد من سماحية الميكرفون للمتصفح</strong></p>
								<figure class="img-container plus-space"><img src="{{ asset('images/help/shot10.png') }}" alt=""></figure>

                                <div class="alert alert-danger" style="max-width: 770px; width: 100%; margin-left: auto; margin-right: auto;">
                                    <p><strong class="icon-left">{{trans('frontend.Important_note')}}</strong>{{trans('frontend.You_stay_receive_instructor_calls')}}</p>
								</div>
                            </li>
						</ul>
					</div>
				</div>
			</section>
			
		</div>
	</section>
	
  @stop  
	