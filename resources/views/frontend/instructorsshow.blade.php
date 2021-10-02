
  @extends('layouts/front-layout')
  @section('frontend-content')    
	<section id="content">
       
		<section class="features inner instructors _v2">
			<div class="container">
				<div class="section-title">
					<h3>{{trans('instructorsshow.Instructors_List')}}</h3>
					<p>{{trans('instructorsshow.Instructors_p')}}</p>
				</div>

				<div class="row">
				@foreach($instructorAppointData as $data)
					<div class="col-md-4 col-sm-6 col-xs-12">
						@if($data->group_id == '1')
							<div class="card hoverable bg-warning padding-20">
						@else
							<div class="card hoverable bg-danger padding-20">
						@endif
							<?php $img_url = 'images/icon/'.$data->group_icon; ?>
							<img src="{{ asset($img_url) }}" class="img-responsive" alt="">
							
							<h4>{{$data->name}}</h4>
							
							@if($data->group_lang_id == '1')
								<label class="text-warning">{{trans('instructorsshow.Language')}}: English</label>
							@else
								<label class="text-warning">{{trans('instructorsshow.Language')}}: العربية</label>
							@endif
							
							</label>
							@if($data->total)
								<span>available sessions :{{$data->total}}</span>
								<p>{{$data->group_des}}</p>
								<a href="/program/appointments/{{$data->id}}/" class="btn btn-warning btn-border-warning btn-round waves-effect" style="width: 70%">{{trans('instructorsshow.available_sessions')}}</a>
							@else
								<span>available sessions :0</span>
								<p>{{$data->group_des}}</p>
								<a href="" class="btn btn-round btn-warning btn-border-warning waves-effect" disabled style="width: 70%">{{trans('instructorsshow.available_sessions')}}</a>
							@endif
							</div>
					</div>
				@endforeach
				</div>
			</div>
		</section>

    </section>
	
  @stop  
	