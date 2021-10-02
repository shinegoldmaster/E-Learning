
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        Library Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Library Management</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalQuranMenuCount); ?></h3>

				  <p>Quran Menu</p>
				</div>
				<div class="icon">
				  <i class="fa fa-diamond" aria-hidden="true"></i>
				</div>
				<a href="/admin/quranmenu" class="small-box-footer">
				  More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-red">
				<div class="inner">
				  <h3><?php echo e($totalLibraryCategoryCount); ?></h3>

				  <p>Library Category</p>
				</div>
				<div class="icon">
				  <i class="fa fa fa-list" aria-hidden="true"></i>
				</div>
				<a href="/admin/librarycategory" class="small-box-footer">
				  More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-orange">
				<div class="inner">
				  <h3><?php echo e($totalLibrarySubcategoryCount); ?></h3>

				  <p>Library SubCategory</p>
				</div>
				<div class="icon">
				  <i class="fa fa-gg" aria-hidden="true"></i>
				</div>
				<a href="/admin/librarysubcategory" class="small-box-footer">
				  More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-6 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo e($totalLibraryItemsCount); ?></h3>

				  <p>Library Items</p>
				</div>
				<div class="icon">
				  <i class="fa fa-file-picture-o" aria-hidden="true"></i>
				</div>
				<a href="/admin/libraryitems" class="small-box-footer">
				  More info <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		
		
	  </div>
	
    </section>
   
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>