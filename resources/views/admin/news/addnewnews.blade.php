@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

	
<div class="content-wrapper">
   
    <section class="content-header text-center">
		<h1>
		 {{trans ('admin.Add_News') }}
		</h1>
		<ol class="breadcrumb">
			<li><a href="/main">{{trans ('admin.Admin') }}</a></li>
			<li><a href="/news/">{{trans ('admin.News_Management') }}</a></li>
			<li class="active">{{trans ('admin.new') }}</li>
		</ol>
	</section>
    <section class="content">
	<div class="row">
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<button type="button" class="btn btn-info" onclick=" $('#news-save-new-form').submit();" data-original-title="save"><i class="fa fa-save"></i></button>	
			<a href="/admin/newsmanagement" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
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
					
					<form method="POST" id="news-save-new-form" action="/admin/news-new-save" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
					{{ csrf_field() }}	
					
						<tr><th  class="text-center" colspan="2">{{trans ('admin.News') }}-{{trans ('admin.new') }}</th></tr>
						
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Title') }}</td>
							<td><input type="text" name="newstitle" value=""></td>
						</tr>										
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Description') }}</td>
							<td><textarea name="newsdes"></textarea></td>
						</tr>
						<tr class="text-right">
							<td style="width:250px;">{{trans ('admin.Images') }}</td>
							<td>							
								<div class="box js text-center" style="float:right;">
									<input type="file" name="newsimages[]" id="newsimages" class="inputfile inputfile-4" data-multiple-caption="{count} files selected" multiple />
									<label for="newsimages"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span>{{trans ('admin.Choose_file') }}&hellip;</span></label>
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
	