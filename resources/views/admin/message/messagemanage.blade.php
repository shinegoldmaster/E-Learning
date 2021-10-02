@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	
<?php 
	$uri = $_SERVER['REQUEST_URI'];
	$orderDirection ='';
	if(substr_count($uri, '?') > 0){
		$orderDirection ='&direction=ASC';
		if(substr_count($uri, '&') > 0){
			$paramData = explode('&', $uri);
			$count = count($paramData) - 1;
			if($paramData[$count] == 'direction=ASC')
				$orderDirection = '&direction=DESC';
			else
				$orderDirection = '&direction=ASC';
		}
	}

?>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Message_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Message_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$messageCount}}</h3>
				  <p>{{trans ('admin.Total_Messages') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-envelope" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.Total_Messages') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
						
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3>{{$instructorCount}}</h3>
				  <p>{{trans ('admin.Instructor') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-user-md"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }} <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3>{{$studentCount}}</h3>
				  <p>{{trans ('admin.Student') }}</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
		</div>		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
				<table class="table table-bordered">
				<tbody>
					<form method="GET" action="/admin/messagemanagement" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
						{{ csrf_field() }}	
						
						
						<tr class="text-center">							
							<td  class="col-md-2 col-sm-2 col-xs-12"  style="border-bottom:none">{{trans ('admin.Instructor') }}</td>
										
							<td class="col-md-3 col-sm-3 col-xs-12" style="border-top:none">
								<select class="form-control"  name="instructorid" required >			
									<option value="0" selected>{{trans ('admin.Select_Instructor') }}</option>
									@foreach($instructorList as $list)
										<option value="{{$list->id}}">{{$list->name}}</option>
									@endforeach				
								</select>		
							</td>
							
							<td  class="col-md-2 col-sm-2 col-xs-12"  style="border-bottom:none">{{trans ('admin.Student') }}</td>
										
							<td class="col-md-3 col-sm-3 col-xs-12" style="border-top:none">
								<select class="form-control"  name="studentid" required >			
									<option value="0" selected>{{trans ('admin.Select_Student') }}</option>
									@foreach($studentList as $data)
										<option value="{{$data->id}}">{{$data->name}}</option>
									@endforeach				
								</select>		
							</td>
							
							
							<td class="col-md-2 col-sm-2 col-xs-12 text-center">
								<button type="submit" class="btn btn-info" data-original-title="update"><i class="fa fa-search"></i>&nbsp;&nbsp;{{trans ('admin.Filter') }}</button>	
							</td>
						</tr>
					</form>
				</tbody>
				</table>
			</div>
		</div>
		
		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            @if($errors->any())							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center">{{$errors->first()}}						
					</p>
				</div>
			</section>						
			@endif           
            <div class="box-body">
              <table class="table table-bordered admin-table">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th>{{trans ('admin.Sender') }}<a href="/admin/messagemanagement?sort=from{{$orderDirection}}"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>  
                  <th>{{trans ('admin.Receiver') }}<a href="/admin/messagemanagement?sort=to{{$orderDirection}}"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>				 
                  <th>{{trans ('admin.Message_Contents') }}<a href="/admin/messagemanagement?sort=contents{{$orderDirection}}"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>{{trans ('admin.Date') }}<a href="/admin/messagemanagement?sort=created_at{{$orderDirection}}"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th> 		     
               
                </tr>
				@foreach($messageList as $key => $data)		
					<tr>					
					  <td>{{$key+1}}</td>					 
					  <td>{{$data->sname}}</td> 
					  <td>{{$data->rname}}</td>
					  <td>{{$data->contents}}</td>
					  <td>{{$data->created_at}}</td>
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
            
		  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
		     {{$messageList->links()}}
		  </div>
		   </div> 
        </div>
		
		</div>
    </section>
    <script>
		$(function () {
			$('#datetimepicker4').datetimepicker();
		});
    </script>
  </div>
  
  
@stop  