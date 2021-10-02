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
			if($paramData[1] == 'direction=ASC')
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
        {{trans ('admin.User_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.User_Management') }}</li>
      </ol>
    </section>
    <section class="content">
		<div class="row">
		 <div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$studentCount}}</h3>

				  <p>{{trans ('admin.Student_Registrations') }}</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="/admin/usermanagement/show-user/0" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3>{{$instructorCount}}</h3>

				  <p>{{trans ('admin.Instructor_Registrations') }}</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="/admin/usermanagement/show-user/1" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3>{{$moderatorCount}}</h3>

				  <p>{{trans ('admin.Moderator_Registrations') }}</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="/admin/usermanagement/show-user/2" class="small-box-footer">
				 {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		 
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
          <div class="box">
            @if($errors->any())							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center">
						{{$errors->first()}}								
					</p>
				</div>
			</section>						
			@endif
			
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th>{{trans ('admin.Name') }}<a href="/admin/usermanagement?sort=name{{$orderDirection}}"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>{{trans ('admin.Email') }}<a href="/admin/usermanagement?sort=email{{$orderDirection}}"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>{{trans ('admin.Phone') }}<a href="/admin/usermanagement?sort=phone{{$orderDirection}}"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>{{trans ('admin.Status') }}<a href="/admin/usermanagement?sort=status{{$orderDirection}}"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th style="width: 210px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($userList as $key => $list)
					<tr>					
					  <td>{{$key+1}}</td>
					  <td>{{$list->name}}</td>
					  <td>{{$list->email}}</td>
					  <td>{{$list->phone}}</td>
					  <td>
						@if($list->status == 0)
							{{trans ('admin.Student') }}
						@elseif($list->status == 1)
							{{trans ('admin.Instructor') }}
						@elseif($list->status == 2)
							{{trans ('admin.Moderator') }}
						@else
							{{trans ('admin.Admin') }}
						@endif
					  </td>
					  <td>						
						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#user_{{$list->id}}" style="margin-left:10px"><i class="fa fa-edit"></i>{{trans ('admin.Update') }}</button>						
						<form method="POST" id="user-delete-form{{$list->id}}" action="/admin/user-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "userid" value="{{$list->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#user-delete-form{{$list->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
          </div>    

		  @foreach($userList as $list)

			<!-- Modal -->
			<div class="modal fade modal-success" id="user_{{$list->id}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
			  <div class="modal-dialog" role="document">
				<form method="POST" action="/admin/user-update" accept-charset="UTF-8" role="form">
				{{ csrf_field() }}	
					<input name = "userid" value="{{$list->id}}"  type="hidden" />
					<div class="modal-content">
					  <div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h3 class="modal-title" id="myModalLabel">{{trans ('admin.User_Update') }}</h3>
					  </div>
					  <div class="modal-body">
						  <p>{{trans ('admin.Change_Status') }}: </p>									  
						  <select class="form-control" id="userstatus" name="userstatus" required >
							@if($list->status == 0)
								<option value="0" selected>{{trans ('admin.Student') }}</option>
								<option value="1">{{trans ('admin.Instructor') }}</option>
								<option value="2">{{trans ('admin.Moderator') }}</option>
							@elseif($list->status == 1)
								<option value="0">{{trans ('admin.Student') }}</option>
								<option value="1" selected>{{trans ('admin.Instructor') }}</option>
								<option value="2">{{trans ('admin.Moderator') }}</option>
							@else
								<option value="0">{{trans ('admin.Student') }}</option>
								<option value="1">{{trans ('admin.Instructor') }}</option>
								<option value="2" selected>{{trans ('admin.Moderator') }}</option>
							@endif
						  </select>								
					  </div>
					  <div class="modal-footer">
						<button type="button" class="btn btn-outline pull-left" data-dismiss="modal">{{trans ('admin.Close') }}</button>
						<button type="submit" class="btn btn-outline">{{trans ('admin.Save_changes') }}</button>
					  </div>
					</div>
				</form>
			  </div>
			</div>
		  @endforeach         
        </div>
		<div class="col-md-9 col-sm-9 col-xs-12 text-center">
		{{$userList->links()}}
		</div>
		</div>
    </section>   
  </div>  
@stop  