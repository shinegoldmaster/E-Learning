@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

	
<div class="content-wrapper">
   
    <section class="content-header text-center">
		<h1>
			{{trans ('admin.Library_Item_Add') }}
		</h1>
		<ol class="breadcrumb">
			<li><a href="/admin/admin">{{trans ('admin.Admin') }}</a></li>
			<li><a href="/admin/libraryitems">{{trans ('admin.Library_Item_Management') }}</a></li>
			<li class="active">{{trans ('admin.new') }}</li>
		</ol>
	</section>
    <section class="content">
	 <div class="row">
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<button type="button" class="btn btn-info" onclick=" $('#libraryitems-save-new-form').submit();" data-original-title="save"><i class="fa fa-save"></i></button>	
			<a href="/admin/libraryitems" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
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
					
					<form method="POST" id="libraryitems-save-new-form" action="/admin/libraryitems-new-save" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
					{{ csrf_field() }}	
					
						<tr><th  class="text-center" colspan="2">{{trans ('admin.Library_Item_New') }}</th></tr>
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Item_Name') }}</td>
							<td><input type="text" name="itemname" value="" autofocus></td>
						</tr>	
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.SubCategory') }}</td>
							<td>
								<select class="form-control"  name="subcategorytypes" required >			
									<option value="0" selected>{{trans ('admin.Select_Sub_Category') }}</option>
									@foreach($subcategorylist as $list)
										<option value="{{$list->id}}">{{$list->sub_cat_name}}</option>
									@endforeach				
								</select>		
							</td>
						</tr>
						
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Mp3_file_upload') }}</td>
							<td  style="background-color: aliceblue;">
							
								<div class="box js text-center">
									<input type="file" name="mp3_link" id="file-5" class="inputfile inputfile-4" />
									<label for="file-5"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>{{trans ('admin.Choose_file') }}&hellip;</span></label>
								</div>
											
							</td>
						</tr>							
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.PDF_file_upload') }}</td>
							<td  style="background-color: aliceblue;">
							
								<div class="box js text-center">
									<input type="file" name="pdf_link" id="file-6" class="inputfile inputfile-4" />
									<label for="file-6"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>{{trans ('admin.Choose_file') }}&hellip;</span></label>
								</div>
											
							</td>
						</tr>							
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Microsoft_file_upload') }}</td>
							<td  style="background-color: aliceblue;">
							
								<div class="box js text-center">
									<input type="file" name="ms_link" id="file-7" class="inputfile inputfile-4" />
									<label for="file-7"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>{{trans ('admin.Choose_file') }}&hellip;</span></label>
								</div>
											
							</td>
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
	