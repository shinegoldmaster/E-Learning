
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        <?php echo e(trans ('admin.Library_SubCategory_Management')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> <?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.Library_SubCategory_Management')); ?></li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalSubCategoryCount); ?></h3>

				  <p><?php echo e(trans ('admin.Library_SubCategory')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-diamond" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">			
			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addnewsubcategory" data-original-title="Add New">
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
                 
                  <th><?php echo e(trans ('admin.Title')); ?><a href="/admin/librarysubcategory?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th><?php echo e(trans ('admin.Category_Type')); ?><a href="/admin/librarysubcategory?sort=type"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th><?php echo e(trans ('admin.Create_Date')); ?><a href="/admin/librarysubcategory?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>            
                  <th style="width: 210px"><?php echo e(trans ('admin.Action')); ?></th>
                </tr>
				<?php $__currentLoopData = $librarySubCategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>					
					  <td style="line-height: 60px;"><?php echo e($key+1); ?></td>
					 
					  <td  style="line-height: 60px;"><?php echo e($data->sub_cat_name); ?></td> 
					  <td  style="line-height: 60px;">
						<select name="categorytypes" style="width:100%">
						<?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($data->cat_id == $list->id): ?>
							<option value="<?php echo e($list->id); ?>" selected><?php echo e($list->cat_name); ?></option>							
							<?php else: ?>
							<option value="<?php echo e($list->id); ?>"><?php echo e($list->cat_name); ?></option>		
							<?php endif; ?>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select>
					  </td>
					  <td  style="line-height: 60px;"><?php echo e($data->created_at); ?></td>
					
					  <td  style="line-height: 60px;">	
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editsubcategory<?php echo e($data->id); ?>" data-original-title="Add New">
						<i class="fa fa-edit"></i><?php echo e(trans ('admin.Edit')); ?></a>								  
												
						<form method="POST" id="librarysubcategory-delete-form<?php echo e($data->id); ?>" action="/admin/library/librarysubcategory-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "subcategoryid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#librarysubcategory-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i><?php echo e(trans ('admin.Delete')); ?></button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<?php echo e($librarySubCategoryList->links()); ?>

		</div>
		  
        </div>
		
	  </div>
		
	<div class="modal fade" id="addnewsubcategory" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title"><?php echo e(trans ('admin.Add_Library_Sub_Category')); ?></h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="librarysubcategory-save-new-form" action="/admin/library/librarysubcategory-new-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>	
					   <table class="table">
						<tbody>
						 <tr>
						  <th style="width: 150px" class="text-right"><?php echo e(trans ('admin.Sub_Category_Name')); ?>:</th>
						  <th><input type="text"  style="width: 100%" name="subcategoryname" value="" autofocus></th>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right"><?php echo e(trans ('admin.Category_Type')); ?></td>
						  <td><select name="categorytypes" style="width:100%">
							<option value="0"><?php echo e(trans ('admin.Select_Category')); ?></option>
							<?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>	
								
								<option value="<?php echo e($list->id); ?>"><?php echo e($list->cat_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select></td>
				         </tr>						 
				        </tbody>
				       </table>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#librarysubcategory-save-new-form').submit();" data-original-title="save"><?php echo e(trans ('admin.Save')); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans ('admin.Close')); ?></button>
				</div>
			</div>
		</div>
	</div>
	<?php $__currentLoopData = $librarySubCategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="editsubcategory<?php echo e($data->id); ?>" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title"><?php echo e(trans ('admin.Edit_Library_Category')); ?></h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="librarysubcategory-save-edit-form" action="/admin/library/librarysubcategory-edit-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>	
					<input type="hidden" name="subcategoryid" value="<?php echo e($data->id); ?>">
					  <table class="table">
						<tbody>
						 <tr>
						  <th style="width: 150px" class="text-right"><?php echo e(trans ('admin.Category_Name')); ?>:</th>
						  <th><input type="text"  style="width: 100%" name="subcategoryname" value="<?php echo e($data->sub_cat_name); ?>" autofocus></th>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right"><?php echo e(trans ('admin.Category_Type')); ?></td>
						  <td><select name="categorytypes" style="width:100%">
							<?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<?php if($data->cat_id == $list->id): ?>
								<option value="<?php echo e($list->id); ?>" selected><?php echo e($list->cat_name); ?></option>							
								<?php else: ?>
								<option value="<?php echo e($list->id); ?>"><?php echo e($list->cat_name); ?></option>		
								<?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</select></td>
				         </tr>
						
				        </tbody>
				       </table>		
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#librarysubcategory-save-edit-form').submit();" data-original-title="save"><?php echo e(trans ('admin.Update')); ?></button>
					<button type="button" class="btn btn-default" data-dismiss="modal"><?php echo e(trans ('admin.Close')); ?></button>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		
    </section>
 
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>