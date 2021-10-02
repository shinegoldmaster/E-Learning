
  @extends('layouts/front-layout')
  @section('frontend-content')   
	<section id="content">
        <section class="news"><!--===== Start News Section ======-->
			<div class="container">
				<div class="section-title">
					<h3>{{trans('frontend.al_maqraa_news')}}</h3>
				</div>
				<ul class="list-unstyled.no-margin.no-padding">
					@foreach($newsData as $data)
						<li class="col-md-4 col-sm-4 col-xs-12">
						  <!--Image Card-->
						  <div class="card hoverable border-bottom-info text-center">
							<div class="card-image">
							
								<?php $img_url = 'images/news/thumb/'.$data->thumb; ?>
								
								<div class="view overlay hm-cyan-light z-depth-1">
									<img src="{{ asset($img_url) }}" alt="{{$data->title}}">
									<a href="/news/details/{{$data->id}}">
										<div class="mask waves-effect"></div>
									</a>
								</div>
							</div>
							<div class="card-content">
								<h4><a title="{{$data->title}}" href="/news/details/{{$data->id}}" class="text-info news-title">{{$data->title}}</a></h4>
								<p>{{$data->des}}</p>
								<a href="/news/details/{{$data->id}}" class="btn btn-blue waves-effect waves-light">{{trans('frontend.See_More')}}</a>
							</div>
						  </div>
						  <!--Image Card-->
						</li>
					@endforeach	
				</ul>
				<div class="col-md-12 col-sm-12 col-xs-12 text-center">
					{{ $newsData->links() }}
				</div>
				
				
			</div>
		</section><!--===== End News Section ======-->
    </section>
	
  @stop  
	