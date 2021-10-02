@extends('layouts/admin-dashboard')
@section('admin-content')        
	     
@include('admin.admin-leftmenu')	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        {{trans ('admin.News_Management') }}
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i>{{trans ('admin.Admin') }}</a></li>
        <li class="active">{{trans ('admin.News_Management') }}</li>
      </ol>
    </section>

   
    <section class="content">	
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3>{{$totalNewsCount}}</h3>

				  <p>{{trans ('admin.News') }}</p>
				</div>
				<div class="icon">
				  <i class="ion ion-easel"></i>
				</div>
				<a href="#" class="small-box-footer">
				  {{trans ('admin.More_info') }} <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/newsmanagement/news-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>			
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
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th style="width: 75px">{{trans ('admin.Thumbernail') }}</th>
                  <th>{{trans ('admin.Title') }}<a href="/admin/newsmanagement?sort=name"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>{{trans ('admin.Description') }}</th>
                  <th>{{trans ('admin.Create_Date') }}</th>
                  <th style="width: 210px">{{trans ('admin.Action') }}</th>
                </tr>
				@foreach($newsList as $key => $data)
					<?php $img_url = 'images/news/details/'.$data->thumb; ?>
					<tr>					
					  <td>{{$key+1}}</td>
					  <td style="background-color: aliceblue;"><img class="text-center" src="{{asset($img_url) }}" style="width:65px"></img></td>
					  <td>{{$data->title}}</td>
					  <td>{{$data->des}}</td>
					  <td>{{$data->created_at}}</td>
					  <td>						
						<a type="button" class="btn btn-info" href="/admin/newsmanagement/news-edit/{{$data->id}}" style="margin-left:10px"><i class="fa fa-edit"></i>{{trans ('admin.Edit') }}</a>						
						<form method="POST" id="news-delete-form{{$data->id}}" action="/admin/news-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							{{ csrf_field() }}	
							<input name = "newsid" value="{{$data->id}}"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#news-delete-form{{$data->id}}').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>{{trans ('admin.Delete') }}</button>				
						</form>
					  </td>					
					</tr>					
				@endforeach        
				
              </tbody></table>
            </div>
            
          </div>    
        </div>
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		{{$newsList->links()}}
		</div>
		</div>
    </section>   
  </div>
  @stop  