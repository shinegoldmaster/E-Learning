@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Library_Items_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Library_Items_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$totalItemsCount}}</h3>

				  <p>{{trans ('admin.Library_Items') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-file-picture-o" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }} <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<a href="/admin/libraryitems/libraryitems-new" class="btn btn-primary" data-original-title="Add New">
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
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                 
                  <th>{{trans ('admin.Title') }}<a href="/admin/libraryitems?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>{{trans ('admin.Sub_Category_Type') }}<a href="/admin/libraryitems?sort=type"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>{{trans ('admin.Mp3_file') }}</th>            
				  <th>{{trans ('admin.PDF_file') }}</th>            
				  <th>{{trans ('admin.Micro_office_file') }}</th> 
				  <th>{{trans ('admin.Create_Date') }}<a href="/admin/libraryitems?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>    
                         
                  <th style="width: 210px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($libraryitemsList as $key => $data)
					
					<tr>					
					  <td style="line-height: 60px;">{{$key+1}}</td>
					 
					  <td  style="line-height: 60px;">{{$data->item_name}}</td> 
					  <td  style="line-height: 60px;">
						<select name="categorytypes" style="width:100%">
						@foreach($subcategoryList as $list)
							@if($data->sub_cat_id == $list->id)
							<option value="{{$list->id}}" selected>{{$list->sub_cat_name}}</option>							
							@else
							<option value="{{$list->id}}">{{$list->sub_cat_name}}</option>		
							@endif
						@endforeach
						</select>
					  </td>
					  <td  style="line-height: 60px;">
						@if($data->mp3_link == '0')
							-
						@else
							{{$data->mp3_link}}
						@endif
					  </td>
					
					  <td  style="line-height: 60px;">
						@if($data->pdf_link == '0')
							-
						@else
							{{$data->pdf_link}}
						@endif
					  </td>
					
					  <td  style="line-height: 60px;">
						@if($data->ms_link == '0')
							-
						@else
							{{$data->ms_link}}
						@endif
					  </td>
					
					  <td  style="line-height: 60px;">{{$data->created_at}}</td>
					  
					  <td  style="line-height: 60px;">	
						<a href="/admin/libraryitems/libraryitems-edit/{{$data->id}}" class="btn btn-info"  data-original-title="Edit">
						<i class="fa fa-edit"></i>{{trans ('admin.Edit') }}</a>								  
												
						<form method="POST" id="libraryitems-delete-form{{$data->id}}" action="/admin/libraryitems-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "itemid" value="{{$data->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#libraryitems-delete-form{{$data->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		{{$libraryitemsList->links()}}
		</div>
		  
        </div>
		
	  </div>
		
    </section>
 
  </div>
  
  
@stop  