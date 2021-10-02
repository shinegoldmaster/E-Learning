
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        Quran Menu Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Quran Menu Management</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalQuranMenuCount); ?></h3>

				  <p>Quran Menu</p>
				</div>
				<div class="icon">
				  <i class="fa fa-diamond" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  More info <i class="fa fa-arrow-circle-right"></i>
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
            <?php if($errors->any()): ?>							
			<section class="widget-title">
				<div class="alert alert-success">
					<p class="text-center"><?php echo e($errors->first()); ?>						
					</p>
				</div>
			</section>						
			<?php endif; ?>
            <!-- /.box-header -->
            <div class="box-body">
              <table class="table table-bordered">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                 
                  <th>Title<a href="/admin/quranmenu?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>Create Date<a href="/admin/quranmenu?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>            
                  <th style="width: 210px">Action</th>
                </tr>
				<?php $__currentLoopData = $quranmeunList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>					
					  <td style="line-height: 60px;"><?php echo e($key+1); ?></td>
					 
					  <td  style="line-height: 60px;"><?php echo e($data->menu_name); ?></td>
					  <td  style="line-height: 60px;"><?php echo e($data->created_at); ?></td>
					
					 
					  <td  style="line-height: 60px;">	
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editnewmenu<?php echo e($data->id); ?>" data-original-title="Add New">
						<i class="fa fa-edit"></i>Edit</a>								  
												
						<form method="POST" id="quranmenu-delete-form<?php echo e($data->id); ?>" action="/admin/library/quranmenu-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "quranmenuid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#quranmenu-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>Delete</button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<?php echo e($quranmeunList->links()); ?>

		</div>
		  
        </div>
		
	  </div>
		
	<div class="modal fade" id="addnewmenu" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Add Quran Menu</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="quranmenu-save-new-form" action="/admin/library/quranmenu-new-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>	
						quranmenu title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="text" name="quranmenuname" value="" autofocus>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#quranmenu-save-new-form').submit();" data-original-title="save">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php $__currentLoopData = $quranmeunList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="editnewmenu<?php echo e($data->id); ?>" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Edit Quran Menu</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="quranmenu-save-edit-form" action="/admin/library/quranmenu-edit-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>	
						quranmenu title:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
							<input type="text" name="quranmenuname" value="<?php echo e($data->menu_name); ?>" autofocus>
							<input type="hidden" name="quranmenuid" value="<?php echo e($data->id); ?>">
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#quranmenu-save-edit-form').submit();" data-original-title="save">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		
    </section>
   
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>