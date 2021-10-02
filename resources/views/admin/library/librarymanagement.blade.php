@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.Library_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.Library_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$totalQuranMenuCount}}</h3>

				  <p>{{trans ('admin.Quran_Menu') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-diamond" aria-hidden="true"></i>
				</div>
				<a href="/admin/quranmenu" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-red">
				<div class="inner">
				  <h3>{{$totalLibraryCategoryCount}}</h3>

				  <p>{{trans ('admin.Library_Category') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa fa-list" aria-hidden="true"></i>
				</div>
				<a href="/admin/librarycategory" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-orange">
				<div class="inner">
				  <h3>{{$totalLibrarySubcategoryCount}}</h3>

				  <p>{{trans ('admin.Library_SubCategory') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-gg" aria-hidden="true"></i>
				</div>
				<a href="/admin/librarysubcategory" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3>{{$totalLibraryItemsCount}}</h3>

				  <p>{{trans ('admin.Library_Items') }}</p>
				</div>
				<div class="icon">
				  <i class="fa fa-file-picture-o" aria-hidden="true"></i>
				</div>
				<a href="/admin/libraryitems" class="small-box-footer">
				  {{trans ('admin.More_info') }}<i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		
		
	  </div>
	
    </section>
   
  </div>
  
  
@stop  