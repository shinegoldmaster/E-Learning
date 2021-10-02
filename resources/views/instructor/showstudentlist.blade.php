
@extends('layouts/instructor-dashboard')
@section('instructor-dashboard')        
	     					
<section class="profile">
    <div class="container">
        <div class="section-title">
            <h3>{{trans('instructor.instructor_Dashboard')}}</h3>
        </div>

        <div class="row">
            <!-- sub-main -->
            <div class="col-md-3 col-sm-12">				
				@include('instructor.instructor-leftmenu')	
			</div>
            <div class="col-md-9 col-sm-9 col-xs-12">
                <div class="student-section-content card hoverable">
                    <div class="tab-content">
                        <!-- Page Content-->
						<div id="section-1" class="features inner">

						<div class="section-title bg-blue">
							<h3>{{trans('instructor.Student_List')}}</h3>
						</div>
						
						@if($studentList -> count()==0)
						<div class="messages-container" style="height: 100%">
							<div class="widget eboss no-padding no-margin">
								<div class="disable-overlay">
									<div class="disable-body">
										<div class="display-table">
											<div class="display-cell">
												<p class="text-center">
													{{trans('instructor.There_is_no_owned_students')}}
												</p>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						@else
						
						<div class="padding-right-20 padding-left-20 text-center">
							<table class="table table-bordered table-responsive">
								<thead>
									<tr>
										<td style="width:20px">#</td>
										<th>{{trans('instructor.Name')}}</th>
										<th>{{trans('instructor.Date')}} </th>	
										<th>{{trans('instructor.country')}}</th>
										<th>{{trans('instructor.Gender')}}</th>
										<th>{{trans('instructor.Age')}}</th>
									</tr>
								</thead>
								<tbody>
								  @foreach($studentList as $key=> $list)
									  <tr>			
										<td>{{$key+1}}</td>
										<td><a href ="/instructor/followup/{{$list->id}}"><strong>{{$list->name}}</strong></a></td>
										<td>{{$list->created_at}}</td>
										<td>{{$list->cname}}</td>
										<td>{{$list->gname}}</td>
										<td>{{$list->age}}</td>		
									  </tr>
								  @endforeach
								</tbody>
							</table>
							
						</div>
						
						@endif
							
						</div>

                    </div>
					<div class="text-center">
					{{$studentList->links()}}
					</div>
                </div>
            </div>

        </div>
    </div>
</section>	
  @stop  
	