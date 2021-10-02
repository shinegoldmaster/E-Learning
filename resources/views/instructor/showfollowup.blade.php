
@extends('layouts/instructor-dashboard')
@section('instructor-dashboard')        
<style>
	.no-border, .no-border td{
		border: none !important;
	}	
	.mt-0{
		margin-top: 0 !important;
	}
	.mb-0{
		margin-bottom: 0 !important;
	}
</style>     					
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

						<div class="section-title mb-0">
							<?php 
								$refNum ="";
								$materialName = "";
								if(count($followData)>0){
									$refNum = $followData[0]->ref_num;
									$materialName = $followData[0]->group_name;
								}
								
							?>
							<table class="text-right no-border table table-responsive">
							  <tbody>
								<tr>
								  <td>{{trans('instructor.FollowUp_Paper')}}</td>
								  <td>
								  <td colspan="2">#{{$refNum}}</td>
								</tr>
								<tr>
								  <td>{{trans('instructor.Student_Name')}}:</td>
								  <td>{{$studentName->name}}</td>
								  <td>{{trans('instructor.Month_Name')}}:</td>
								  <td>{{$currentMonth}}</td>						  
								</tr>
								<tr>
								  <td colspan="2"><strong>{{trans('instructor.Material_Name')}}</strong></td>
								  <td colspan="2"><strong>{{$materialName}}</strong></td>
								</tr>
							  </tbody>
							</table>
							
						</div>
						
						 
						
						<div class="padding-right-20 padding-left-20 text-center">
						@if($errors->any())							
						<section class="widget-title">
							<div class="alert alert-success">
								<p class="text-center">{{$errors->first()}}						
								</p>
							</div>
						</section>						
						@endif
							<table class="mt-0 table table-bordered table-responsive">
								<thead>
									<tr>
										<th style="width:20px" rowspan="2">{{trans('instructor.Notes')}}</th>
										<th rowspan="2">{{trans('instructor.Grade')}}</th>
										<th colspan="2">{{trans('instructor.Review')}}</th>	
										<th rowspan="2">{{trans('instructor.Grade')}}</th>
										<th colspan="2">{{trans('instructor.Memorize')}}</th>				
										<th rowspan="2">{{trans('instructor.Date')}}</th>
										<th rowspan="2">{{trans('instructor.Day')}}</th>
										<th rowspan="2">{{trans('instructor.Instructor_Name')}}</th>
										<th rowspan="2">{{trans('instructor.Group_Section_Name')}}</th>
										<th rowspan="2">{{trans('instructor.Action')}}</th>
									</tr>
									<tr>
										
										<th>{{trans('instructor.To')}}</th>
										<th>{{trans('instructor.From')}}</th>
										<th>{{trans('instructor.')}}</th>
										<th>{{trans('instructor.From')}}</th>
										
									</tr>
								</thead>
								<tbody>
									@if($followData -> count() > 0)
									  @foreach($followData as $data)
									    <form action="/instructor/followupdate" method="POST" class="form-horizontal bordered" role="form">
										{{ csrf_field() }}	
										  <input name = "followid" value="{{$data->id}}"  type="hidden" />
										  <tr>
											  <td><input type="text" name="notes" value="{{$data->notes}}"></td>
											  <td><input type="text" name="grade_from" value="{{$data->grade_from}}"></td>
											  <td><input type="text" name="review_to" value="{{$data->review_to}}"></td>
											  <td><input type="text" name="review_from" value="{{$data->review_from}}"></td>
											  <td><input type="text" name="grade_to" value="{{$data->grade_to}}"></td>
											  <td><input type="text" name="memorize_to" value="{{$data->memorize_to}}"></td>
											  <td><input type="text" name="memorize_from" value="{{$data->memorize_from}}"></td>
											  <td style="line-height:4;"><span>{{$data->date_name}}</span></td>
											  <td style="line-height:4;"><span>{{$data->week_name}}</span></td>
											  <td><input type="text" name="iname" value="{{$data->iname}}"></td>
											  <td><input type="text" name="group_section" value="{{$data->group_section}}"></td>
										  
										  
											  <td style="line-height:4;"><button type="submit" class="btn bg-info waves-effect">{{trans('instructor.update')}}</button></td>
										
										  </tr>
										</form>
									  @endforeach
									@else
									<tr>
									  <td colspan="20" class="text-center">{{trans('instructor.There_is_No_Data')}}!</td>
									</tr>
									@endif
								</tbody>
							</table>
						</div>
					  </div>

                    </div>
					<div class="text-center">
					
					</div>
                </div>
            </div>

        </div>
    </div>
</section>	
  @stop  
	