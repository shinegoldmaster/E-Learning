<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

	
<div class="content-wrapper">
   
    <section class="content-header text-center">
		<h1>
			<?php echo e(trans ('admin.Sub_Category_Edit')); ?>

		</h1>
		<ol class="breadcrumb">
			<li><a href="/amin/admin"><?php echo e(trans ('admin.Admin')); ?></a></li>
			<li><a href="/admin/subcategorymanagement"><?php echo e(trans ('admin.Sub_Category_Management')); ?></a></li>
			<li class="active"><?php echo e($index); ?></li>
		</ol>
	</section>
    <section class="content">
	 <div class="row">
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/subcategorymanagement/subcategory-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
			<button type="button" class="btn btn-info" onclick=" $('#subcategory-save-form').submit();" data-original-title="save"><i class="fa fa-save"></i></button>	
			<a href="/admin/subcategorymanagement" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
		</div>
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">
				<?php if($errors->any()): ?>							
				<section class="widget-title">
					<div class="alert alert-success">
						<p class="text-center">				<?php echo e($errors->first()); ?>							
						</p>
					</div>
				</section>
				<?php endif; ?>
				<div class="box-body">	
					<table class="table table-bordered admin-table">
					<tbody>
					
					<form method="POST" id="subcategory-save-form" action="/admin/subcategory-edit-save" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
					<?php echo e(csrf_field()); ?>	
					<input name = "subcategoryid" value="<?php echo e($subcategoryData->id); ?>"  type="hidden" />
						<tr><th  class="text-center" colspan="2"><?php echo e(trans ('admin.Sub_Category')); ?>-<?php echo e($subcategoryData->id); ?></th></tr>
						
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Sub_Category_Title')); ?></td>
							<td><input type="text" name="subcategorytitle" value="<?php echo e($subcategoryData->session_title); ?>"></td>
						</tr>
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Category')); ?></td>
							<td>
								<select class="form-control" name="categoryid" required >
								
								<?php $__currentLoopData = $categorylist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<?php if($subcategoryData->category_id == $list->id): ?>
										<option value="<?php echo e($list->id); ?>" selected><?php echo e($list->group_name); ?></option>			
									<?php else: ?>
										<option value="<?php echo e($list->id); ?>"><?php echo e($list->group_name); ?></option>
									<?php endif; ?>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>	
							
							</td>
						</tr>						
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Description')); ?></td>
							<td><textarea name="subcategorydes"><?php echo e($subcategoryData->notes); ?></textarea></td>
						</tr>
										
					</form>
					
					</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
	</section>
</div> 
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>