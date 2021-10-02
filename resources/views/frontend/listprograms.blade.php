
  @extends('layouts/front-layout')
  @section('frontend-content')

	<section id="content">
        <!--===== Start Programs-Content ======-->
		<section class="features inner _v2">
			<div class="container">
				<div class="section-title">
					<h3>{{trans('frontend.List_programs')}}</h3>
				</div>
				<div class="row">

					@foreach($programData as $data)


					<div class="col-md-4 col-sm-6 col-xs-12">
						@if($data->id == 1)
							<div class="card hoverable bg-warning padding-20">
						@elseif($data->id == 2)
                            <div class="card hoverable bg-danger padding-20">
						@else
							<div class="card hoverable bg-info padding-20">
						@endif
							<?php $img_url = 'images/icon/'.$data->group_icon; ?>
							<img src="{{ asset($img_url) }}" class="img-responsive" alt="">
							<h4>{{$data->group_name}}</h4>

							@if($data->group_lang_id == '1')
								<label class="text-warning">English</label>
							@else
								<label class="text-warning">العربية</label>
							@endif

							<p> {{$data->group_des}}</p>
                                @if($data->id == 1)
							        <a href="/program/instructor/{{$data->id}}" class="btn btn-warning btn-border-warning btn-round" style="width: 40%">{{trans('frontend.Instructors')}}</a>
                                @elseif($data->id == 2)
                                    <a href="/program/instructor/{{$data->id}}" class="btn btn-danger btn-border-danger btn-round" style="width: 40%">{{trans('frontend.Instructors')}}</a>
                                @else
                                    <a href="/program/instructor/{{$data->id}}" class="btn btn-blue btn-border-blue btn-round" style="width: 40%">{{trans('frontend.Instructors')}}</a>
                                @endif

                            </div>
						</div>

						@endforeach

					</div>
				</div>
			</div>
		</section>
		<!--===== End Programs-Content ======-->
     </section>

  @stop
	