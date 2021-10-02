@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

	
<div class="content-wrapper">
   
    <section class="content-header text-center">
		<h1>
			{{trans ('admin.Sub_Category_Add') }}
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin/admin">{{trans ('admin.Admin') }}</a></li>
			<li><a href="/admin/subcategorymanagement">{{trans ('admin.Sub_Category_Management') }}</a></li>
			<li class="active">{{trans ('admin.new') }}</li>
		</ol>
	</section>
    <section class="content">
	 <div class="row">
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<button type="button" class="btn btn-info" onclick=" $('#subcategory-save-new-form').submit();" data-original-title="save"><i class="fa fa-save"></i></button>	
			<a href="/admin/subcategorymanagement" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
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
				<div class="box-body">	
					<table class="table table-bordered admin-table">
					<tbody>
					
					<form method="POST" id="subcategory-save-new-form" action="/admin/subcategory-new-save" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
					{{ csrf_field() }}	
					
						<tr><th  class="text-center" colspan="2">{{trans ('admin.Sub_Category_New') }}</th></tr>
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Sub_Category_Title') }}</td>
							<td><input type="text" name="subcategorytitle" value="" autofocus></td>
						</tr>	
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.SubCategory_Category') }}</td>
							<td>
								<select class="form-control"  name="subcategorycategory" required >			
									<option value="0" selected>{{trans ('admin.Select_Category') }}</option>
									@foreach($categorylist as $list)
										<option value="{{$list->id}}">{{$list->group_name}}</option>
									@endforeach				
								</select>		
							</td>
						</tr>						
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Description') }}</td>
							<td><textarea name="subcategorydes"></textarea></td>
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
	