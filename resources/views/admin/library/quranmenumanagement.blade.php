@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Quran_Menu_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Quran_Menu_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$totalQuranMenuCount}}</h3>

				  <p>{{trans ('admin.Quran_Menu') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-diamond" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }} <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addnewmenu" data-original-title="Add New">
			<i class="fa fa-plus"></i></a>			
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
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                 
                  <th>{{trans ('admin.Title') }}<a href="/admin/quranmenu?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>{{trans ('admin.Create_Date') }}<a href="/admin/quranmenu?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>            
                  <th style="width: 210px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($quranmeunList as $key => $data)
					
					<tr>					
					  <td style="line-height: 60px;">{{$key+1}}</td>
					 
					  <td  style="line-height: 60px;">{{$data->menu_name}}</td>
					  <td  style="line-height: 60px;">{{$data->created_at}}</td>
					
					 
					  <td  style="line-height: 60px;">	
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editnewmenu{{$data->id}}" data-original-title="Add New">
						<i class="fa fa-edit"></i>{{trans ('admin.Edit') }}</a>								  
												
						<form method="POST" id="quranmenu-delete-form{{$data->id}}" action="/admin/library/quranmenu-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "quranmenuid" value="{{$data->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#quranmenu-delete-form{{$data->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		{{$quranmeunList->links()}}
		</div>
		  
        </div>
		
	  </div>
		
	<div class="modal fade" id="addnewmenu" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">{{trans ('admin.Add_Quran_Menu') }}</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="quranmenu-save-new-form" action="/admin/library/quranmenu-new-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}	
						{{trans ('admin.Quran_menu_title') }}:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="text" name="quranmenuname" value="" autofocus>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#quranmenu-save-new-form').submit();" data-original-title="save">{{trans ('admin.Save') }}</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">{{trans ('admin.Close') }}</button>
				</div>
			</div>
		</div>
	</div>
	@foreach($quranmeunList as $key => $data)
	<div class="modal fade" id="editnewmenu{{$data->id}}" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">{{trans ('admin.Edit_Quran_Menu') }}</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="quranmenu-save-edit-form" action="/admin/library/quranmenu-edit-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}	
						{{trans ('admin.Quran_menu_title') }}:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="text" name="quranmenuname" value="{{$data->menu_name}}" autofocus>
							<input type="hidden" name="quranmenuid" value="{{$data->id}}">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#quranmenu-save-edit-form').submit();" data-original-title="save">{{trans ('admin.Update') }}</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">{{trans ('admin.Close') }}</button>
				</div>
			</div>
		</div>
	</div>
	@endforeach	
		
    </section>
   
  </div>
  
  
@stop  