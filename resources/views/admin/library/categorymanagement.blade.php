@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Library_Category_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Library_Category_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$totalLibraryCategoryCount}}</h3>

				  <p>{{trans ('admin.Library_Category') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-diamond" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">{{trans ('admin.More_info') }}
				   <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addnewcategory" data-original-title="Add New">
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
                 
                  <th>{{trans ('admin.Title') }}<a href="/admin/librarycategory?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>{{trans ('admin.Type') }}<a href="/admin/librarycategory?sort=type"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>{{trans ('admin.Create_Date') }}<a href="/admin/librarycategory?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>            
                  <th style="width: 210px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($libraryCategoryList as $key => $data)
					
					<tr>					
					  <td style="line-height: 60px;">{{$key+1}}</td>
					 
					  <td  style="line-height: 60px;">{{$data->cat_name}}</td> 
					  <td  style="line-height: 60px;">
						<select name="categorytypes" style="width:100%">
							@if($data->types == '0')
							<option value="0" selected>{{trans ('admin.Library') }}</option>
							<option value="1">{{trans ('admin.Quran_Library') }}</option>
							@else
							<option value="0">{{trans ('admin.Library') }}</option>
							<option value="1" selected>{{trans ('admin.Quran_Library') }}</option>	
							@endif
						</select>
					  </td>
					  <td  style="line-height: 60px;">{{$data->created_at}}</td>
					
					  <td  style="line-height: 60px;">	
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editcategory{{$data->id}}" data-original-title="Add New">
						<i class="fa fa-edit"></i>{{trans ('admin.Edit') }}</a>								  
												
						<form method="POST" id="librarycategory-delete-form{{$data->id}}" action="/admin/library/librarycategory-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "categoryid" value="{{$data->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#librarycategory-delete-form{{$data->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		{{$libraryCategoryList->links()}}
		</div>
		  
        </div>
		
	  </div>
		
	<div class="modal fade" id="addnewcategory" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">{{trans ('admin.Add_Library_Category') }}</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="librarycategory-save-new-form" action="/admin/library/librarycategory-new-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}	
					   <table class="table">
						<tbody>
						 <tr>
						  <th style="width: 150px" class="text-right">{{trans ('admin.Category_Name') }}:</th>
						  <th><input type="text"  style="width: 100%" name="categoryname" value="" autofocus></th>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right">{{trans ('admin.Category_Type') }}</td>
						  <td><select  style="width: 100%" name="categorytypes">		
							<option value="-1" selected>{{trans ('admin.Select_Library_Type') }}</option>
							<option value="0">{{trans ('admin.Library') }}</option>
							<option value="1">{{trans ('admin.Quran_Library') }}</option></select></td>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right">{{trans ('admin.Quran_Menu') }}</td>
						  <td><select name="menuid"  style="width: 100%; opacity:0.3; cursor: not-allowed;" disabled>		
							<option value="0" selected>{{trans ('admin.Select_Quran_Meun') }}</option>
							@foreach($quranmenudata as $list)
							<option value="{{$list->id}}">{{$list->menu_name}}</option>
							@endforeach
							</select></td>
				         </tr>
				        </tbody>
				       </table>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#librarycategory-save-new-form').submit();" data-original-title="save">{{trans ('admin.Save') }}</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">{{trans ('admin.Close') }}</button>
				</div>
			</div>
		</div>
	</div>
	@foreach($libraryCategoryList as $data)
	<div class="modal fade" id="editcategory{{$data->id}}" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">{{trans ('admin.Edit_Library_Category') }}</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="librarycategory-save-edit-form" action="/admin/library/librarycategory-edit-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					{{ csrf_field() }}	
					<input type="hidden" name="categoryid" value="{{$data->id}}">
					  <table class="table">
						<tbody>
						 <tr>
						  <th style="width: 150px" class="text-right">{{trans ('admin.Category_Name') }}:</th>
						  <th><input type="text"  style="width: 100%" name="categoryname" value="{{$data->cat_name}}" autofocus></th>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right">{{trans ('admin.Category_Type') }}</td>
						  <td><select name="categorytypes"  style="width: 100%">		
							@if($data->types == '0')
							<option value="0" selected>{{trans ('admin.Library') }}</option>
							<option value="1">{{trans ('admin.Quran_Library') }}</option>
							@else
							<option value="0">{{trans ('admin.Library') }}</option>
							<option value="1" selected>{{trans ('admin.Quran_Library') }}</option>	
							@endif
							</select></td>
				         </tr>
						
						 <tr>
						 <input type="hidden" id="libraryidvalue" value="{{$data->menu_id}}" />
						  <td style="width: 150px" class="text-right">{{trans ('admin.Quran_Menu') }} </td>
						  <td><select name="menuid"  style="width: 100%">		
							<option value="0" selected>{{trans ('admin.Select_Quran_Meun') }}</option>
							@foreach($quranmenudata as $list)
							 @if($list->id == $data->menu_id)
							  <option value="{{$list->id}}" selected>{{$list->menu_name}}</option>
							 @else
							  <option value="{{$list->id}}">{{$list->menu_name}}</option>
							 @endif
							@endforeach
							</select></td>
				         </tr>
						
				        </tbody>
				       </table>		
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#librarycategory-save-edit-form').submit();" data-original-title="save">{{trans ('admin.Update') }}</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">{{trans ('admin.Close') }}</button>
				</div>
			</div>
		</div>
	</div>
	@endforeach	
		
    </section>
   <script>
		$(document).ready(function() {
			var id = $('#libraryidvalue').val();
			changeDisableStatus(id);
		});
		$('select[name="categorytypes"]').on('change', function(){
			var id = $(this).val();
			changeDisableStatus(id);
		});
		
		function changeDisableStatus(id){
			if(id == '1'){
				$('select[name="menuid"]').prop('disabled',false);
				$('select[name="menuid"]').css('opacity', '1');
				$('select[name="menuid"]').css('cursor', 'pointer');
			}else{
				$('select[name="menuid"]').prop('disabled',true);
				$('select[name="menuid"]').css('opacity', '0.3');
				$('select[name="menuid"]').css('cursor', 'not-allowed');
			}
		}
   </script>
  </div>
  
  
@stop  