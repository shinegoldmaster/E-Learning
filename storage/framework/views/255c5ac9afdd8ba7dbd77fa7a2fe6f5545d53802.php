
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        Library Items Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Library Items Management</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalItemsCount); ?></h3>

				  <p>Library Items</p>
				</div>
				<div class="icon">
				  <i class="fa fa-file-picture-o" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  More info <i class="fa fa-arrow-circle-right"></i>
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
              <table class="table table-bordered text-center">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                 
                  <th>Title<a href="/admin/libraryitems?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>Sub Category Type<a href="/admin/libraryitems?sort=type"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>Mp3 file</th>            
				  <th>PDF file</th>            
				  <th>Micro office file</th> 
				  <th>Create Date<a href="/admin/libraryitems?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>    
                         
                  <th style="width: 210px">Action</th>
                </tr>
				<?php $__currentLoopData = $libraryitemsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>					
					  <td style="line-height: 60px;"><?php echo e($key+1); ?></td>
					 
					  <td  style="line-height: 60px;"><?php echo e($data->item_name); ?></td> 
					  <td  style="line-height: 60px;">
						<select name="categorytypes" style="width:100%">
						<?php $__currentLoopData = $subcategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($data->sub_cat_id == $list->id): ?>
							<option value="<?php echo e($list->id); ?>" selected><?php echo e($list->sub_cat_name); ?></option>							
							<?php else: ?>
							<option value="<?php echo e($list->id); ?>"><?php echo e($list->sub_cat_name); ?></option>		
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					  </td>
					  <td  style="line-height: 60px;">
						<?php if($data->mp3_link == '0'): ?>
							-
						<?php else: ?>
							<?php echo e($data->mp3_link); ?>

						<?php endif; ?>
					  </td>
					
					  <td  style="line-height: 60px;">
						<?php if($data->pdf_link == '0'): ?>
							-
						<?php else: ?>
							<?php echo e($data->pdf_link); ?>

						<?php endif; ?>
					  </td>
					
					  <td  style="line-height: 60px;">
						<?php if($data->ms_link == '0'): ?>
							-
						<?php else: ?>
							<?php echo e($data->ms_link); ?>

						<?php endif; ?>
					  </td>
					
					  <td  style="line-height: 60px;"><?php echo e($data->created_at); ?></td>
					  
					  <td  style="line-height: 60px;">	
						<a href="/admin/libraryitems/libraryitems-edit/<?php echo e($data->id); ?>" class="btn btn-info"  data-original-title="Edit">
						<i class="fa fa-edit"></i>Edit</a>								  
												
						<form method="POST" id="libraryitems-delete-form<?php echo e($data->id); ?>" action="/admin/libraryitems-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "itemid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#libraryitems-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>Delete</button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<?php echo e($libraryitemsList->links()); ?>

		</div>
		  
        </div>
		
	  </div>
		
    </section>
 
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>