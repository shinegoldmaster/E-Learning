
  @extends('layouts/front-layout')
  @section('frontend-content')      
					
	<div id="content">
        <section class="library">
		<div class="container">
			<div class="section-title">
				<h3>{{trans('library.The_proposed_library_materials')}}</h3>
				<p>   {{trans('library.description')}}</p>
			</div>
			<div class="row">
				<div class="col-md-8 col-md-offset-2 col-sm-12 col-xs-12">

					<div class="row search-box">
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="form-group">
								<input id="searchStr" class="form-control" placeholder="Search" type="text">
							</div>
						</div>
						<div class="col-md-5 col-sm-5 col-xs-12">
							<div class="box categorylist">						 
								<select class="wide" id="dropdown-categories" name="country" required>							
								</select>
							</div>									
						</div>
						<div class="col-md-2 col-sm-2 col-xs-12 text-center">
							<button id="categorySearch" type="button" class="btn btn-blue btn-block waves-effect waves-light dropdown-toggle" data-toggle="dropdown">
								{{trans('library.Search')}}
							</button>
						</div>
					</div>
				
					<div class="col-lg-12">
						<div class="data-grid_applied" data-grid="main">
						</div>
					</div>

					<div class="search-results">
						<div class="row">
							<div class="col-md-12 col-sm-12">
								<div class="section-title _lib_v2">
									<h3>{{trans('library.Show_Results')}}</h3>
								</div>
								<div class="search-result">
									<div class="card no-results">			
									</div>
									
								</div>
							
							</div>
							
						</div>
					</div>
				</div>
			</div>

		</div>
	</section>    
</div>
	
  @stop  
	