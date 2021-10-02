<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

	
<div class="content-wrapper">
   
    <section class="content-header text-center">
		<h1>
			<?php echo e(trans ('admin.Category_Edit')); ?>

		</h1>
		<ol class="breadcrumb">
			<li><a href="/amin/admin"><?php echo e(trans ('admin.Admin')); ?></a></li>
			<li><a href="/admin/categorymanagement/"><?php echo e(trans ('admin.Category_Management')); ?></a></li>
			<li class="active"><?php echo e($index); ?></li>
		</ol>
	</section>
    <section class="content">
	<div class="row">
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/categorymanagement/category-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
			<button type="button" class="btn btn-info" onclick=" $('#category-save-form').submit();" data-original-title="save"><i class="fa fa-save"></i></button>	
			<a href="/admin/categorymanagement" class="btn btn-default" data-original-title="return"><i class="fa fa-reply"></i></a>
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
					<?php $__currentLoopData = $categoryData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<form method="POST" id="category-save-form" action="/admin/category-edit-save" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
					<?php echo e(csrf_field()); ?>	
					<input name = "categoryid" value="<?php echo e($data->id); ?>"  type="hidden" />
						<tr><th  class="text-center" colspan="2"><?php echo e(trans ('admin.Category')); ?>-<?php echo e($data->id); ?></th></tr>
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Category_Icon')); ?></td>
							<td  style="background-color: aliceblue;">
								<?php $img = 'images/icon/'.$data->group_icon; ?>
								<div class="text-center">
									<img src="<?php echo e(asset($img)); ?>" style="height:155px"></img>
									
								<div class="box js text-center" style="float:right;width: 20%;">
									<input type="file" name="categoryicon" id="categoryicon" class="inputfile inputfile-4"  />
									<label for="categoryicon"><figure><svg xmlns="http://www.w3.org/2000/svg" width="20" height="17" viewBox="0 0 20 17"><path d="M10 0l-5.2 4.9h3.3v5.1h3.8v-5.1h3.3l-5.2-4.9zm9.3 11.5l-3.2-2.1h-2l3.4 2.6h-3.5c-.1 0-.2.1-.2.1l-.8 2.3h-6l-.8-2.2c-.1-.1-.1-.2-.2-.2h-3.6l3.4-2.6h-2l-3.2 2.1c-.4.3-.7 1-.6 1.5l.6 3.1c.1.5.7.9 1.2.9h16.3c.6 0 1.1-.4 1.3-.9l.6-3.1c.1-.5-.2-1.2-.7-1.5z"/></svg></figure> <span><?php echo e(trans ('admin.Choose_file')); ?>&hellip;</span></label>
								</div>	
									
									
									
								</div>								
							</td>
						</tr>		
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Category_Name')); ?></td>
							<td><input type="text" name="categoryname" value="<?php echo e($data->group_name); ?>"></td>
						</tr>
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Category_Language')); ?></td>
							<td>
								<select class="form-control" name="categorylanguage" required >
									<?php if($data->group_lang_id == 1): ?>
										<option value="1" selected><?php echo e(trans ('admin.English')); ?></option>
										<option value="2"><?php echo e(trans ('admin.Arabic')); ?></option>
									<?php else: ?>
										<option value="1" ><?php echo e(trans ('admin.English')); ?></option>
										<option value="2" selected><?php echo e(trans ('admin.Arabic')); ?></option>
									<?php endif; ?>	
								</select>	
							
							</td>
						</tr>						
						<tr class="text-right">
							<td style="width:250px;"><?php echo e(trans ('admin.Description')); ?></td>
							<td><textarea name="categorydes"><?php echo e($data->group_des); ?></textarea></td>
						</tr>
										
					</form>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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