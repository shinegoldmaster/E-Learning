@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

	
<div class="content-wrapper">
   
    <section class="content-header text-center">
		<h1>
			{{trans ('admin.Sub_Category_Edit') }}
		</h1>
		<ol class="breadcrumb">
			<li><a href="/amin/admin">{{trans ('admin.Admin') }}</a></li>
			<li><a href="/admin/subcategorymanagement">{{trans ('admin.Sub_Category_Management') }}</a></li>
			<li class="active">{{$index}}</li>
		</ol>
	</section>
    <section class="content">
	 <div class="row">
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/subcategorymanagement/subcategory-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
			<button type="button" class="btn btn-info" onclick=" $('#subcategory-save-form').submit();" data-original-title="save"><i class="fa fa-save"></i></button>	
			<a href="/admin/subcategorymanagement" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				@if($errors->any())							
				<section class="widget-title">
					<div class="alert alert-success">
						<p class="text-center">				{{$errors->first()}}							
						</p>
					</div>
				</section>
				@endif
				<div class="box-body">	
					<table class="table table-bordered admin-table">
					<tbody>
					
					<form method="POST" id="subcategory-save-form" action="/admin/subcategory-edit-save" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
					{{ csrf_field() }}	
					<input name = "subcategoryid" value="{{$subcategoryData->id}}"  type="hidden" />
						<tr><th  class="text-center" colspan="2">{{trans ('admin.Sub_Category') }}-{{$subcategoryData->id}}</th></tr>
						
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Sub_Category_Title') }}</td>
							<td><input type="text" name="subcategorytitle" value="{{$subcategoryData->session_title}}"></td>
						</tr>
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Category') }}</td>
							<td>
								<select class="form-control" name="categoryid" required >
								
								@foreach($categorylist as $list)
									@if($subcategoryData->category_id == $list->id)
										<option value="{{$list->id}}" selected>{{$list->group_name}}</option>			
									@else
										<option value="{{$list->id}}">{{$list->group_name}}</option>
									@endif
								@endforeach
								</select>	
							
							</td>
						</tr>						
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Description') }}</td>
							<td><textarea name="subcategorydes">{{$subcategoryData->notes}}</textarea></td>
						</tr>
										
					</form>
					
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</section>
</div> 
  @stop  
	