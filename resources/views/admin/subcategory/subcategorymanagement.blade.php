@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Sub_Category_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Sub_Category_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$totalsubcategoryCount}}</h3>

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
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/subcategorymanagement/subcategory-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>			
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
                  <th>{{trans ('admin.Title') }}<a href="/admin/subcategorymanagement?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>{{trans ('admin.Create_Date') }}<a href="/admin/subcategorymanagement?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th> <th>{{trans ('admin.Category') }}<a href="/admin/subcategorymanagement?sort=category"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>                  
                  <th style="width: 210px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($subcategoryList as $key => $data)
					
					<tr>					
					  <td style="line-height: 60px;">{{$key+1}}</td>
					 
					  <td  style="line-height: 60px;">{{$data->session_title}}</td>
					  <td  style="line-height: 60px;">{{$data->created_at}}</td>
					 <td  style="line-height: 60px;">					 
						<label class="text-warning">{{$data->group_name}}</label>
					 
					 </td>
					 
					  <td  style="line-height: 60px;">						
						<a type="button" class="btn btn-info" href="/admin/subcategorymanagement/subcategory-edit/{{$data->id}}" style="margin-left:10px"><i class="fa fa-edit"></i>{{trans ('admin.Edit') }}</a>						
						<form method="POST" id="subcategory-delete-form{{$data->id}}" action="/admin/subcategory-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "subcategoryid" value="{{$data->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#subcategory-delete-form{{$data->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		{{$subcategoryList->links()}}
		</div>
		  
        </div>
		
		</div>
		</div>
		
		
		
    </section>
   
  </div>
  
  
@stop  