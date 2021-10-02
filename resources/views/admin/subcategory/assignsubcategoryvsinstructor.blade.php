@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Assignment_SubCategory') }} : {{trans ('admin.Instructor') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Sub_Category_Assignment') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$joinCount}}</h3>
				  <p>{{trans ('admin.Total_Assignment') }}</p>
				</div>
				<div class="icon">
				  <i class="fa  fa-suitcase" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-red">
				<div class="inner">
				  <h3>{{$subcategoryCount}}</h3>
				  <p>{{trans ('admin.SubCategory') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-gg" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3>{{$instructorCount}}</h3>
				  <p>{{trans ('admin.Instructor') }}</p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3>{{$subcategoryTime->setting_value}}&nbsp;{{trans ('admin.Minutes') }}</h3>
				  <p>{{trans ('admin.Session_Time') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-clock-o" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				 {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
		</div>
		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
				<table class="table table-bordered admin-table">
				<tbody>
					<form method="POST" action="/admin/update-subcategorytime" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
						{{ csrf_field() }}	
						<input name = "settingid" value="{{$subcategoryTime->id}}"  type="hidden" />
						<tr>
							<td style="width:150px;border-right: none;line-height: 26px;">{{trans ('admin.Setting_Time') }}</td>
							<td style="border-left: none;border-right: none;" class="text-right"><input class="text-right" type="text" name="settingvalue" value="{{$subcategoryTime->setting_value}}" style="text-align: right; font-size:18px;"></td>
							<td  style="border-left: none;border-right: none;line-height: 26px;" class="text-left;" >{{trans ('admin.Minutes') }}</td>
							<td style="width:50px;border-left: none;"><button type="submit" class="btn btn-info" data-original-title="update"><i class="fa fa-save"></i></button>	</td>
						</tr>	
					</form>
				</tbody>
				</table>
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
				<table class="table table-bordered">
				<tbody>
					<form method="POST" action="/admin/assign-subcategory-insturctor" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
						{{ csrf_field() }}	
						
						<tr class="text-center"><td colspan="2"><h5>{{trans ('admin.Assignment_SubCategory_VS_Instructor') }} </h5></td></tr>
						<tr class="text-center">
							<td style="border-bottom:none">{{trans ('admin.Sub_Category') }} </td>
							<td style="border-bottom:none">{{trans ('admin.Instructor') }}</td>
						</tr>
						<tr>
							
							<td style="border-top:none">
								<select class="form-control"  name="subcategoryfield" required >			
									<option value="0" selected>{{trans ('admin.Select_Sub_Category') }}</option>
									@foreach($subcategoryList as $list)
										<option value="{{$list->id}}">{{$list->session_title}}</option>
									@endforeach				
								</select>		
							</td>
							<td style="border-top:none">
								<select class="form-control"  name="instructorfield" required >			
									<option value="0" selected>{{trans ('admin.Select_Instructor') }}</option>
									@foreach($instructorList as $list)
										<option value="{{$list->id}}">{{$list->name}}</option>
									@endforeach				
								</select>		
							</td>
						</tr>	
						<tr class="text-center">
							<td class="text-center" colspan="2">
								<button type="submit" class="btn btn-info" data-original-title="update"><i class="fa fa-hand-o-down"></i>&nbsp;&nbsp;{{trans ('admin.Assignment') }}</button>	
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
                  <th>{{trans ('admin.SubCategory_Title') }}<a href="/admin/assignsubcategory?sort=ctitle"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>  
                  <th>{{trans ('admin.Instructor_Name') }}<a href="/admin/assignsubcategory?sort=iname"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>				 
                  <th>{{trans ('admin.Create_Date') }}<a href="/admin/assignsubcategory?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th> 				                  
                  <th style="width: 110px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($joinList as $key => $data)
					
					<tr>					
					  <td>{{$key+1}}</td>					 
					  <td>{{$data->session_title}}</td> 
					  <td>{{$data->name}}</td>
					  <td>{{$data->created_at}}</td>				 
					  <td>				
						<form method="POST" id="assign-delete-form{{$data->id}}" action="/admin/assign-subcategory-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "assignid" value="{{$data->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#assign-delete-form{{$data->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
            
		  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
		     {{$joinList->links()}}
		  </div>
		   </div> 
        </div>
		
		</div>
    </section>
   
  </div>
  
  
@stop  