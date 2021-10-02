
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        <?php echo e(trans ('admin.Category_Management')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i><?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.Category_Management')); ?></li>
      </ol>
    </section>

   
    <section class="content">	
		<div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalCategoryCount); ?></h3>

				  <p><?php echo e(trans ('admin.Category')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-list" aria-hidden="true"></i></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?> <i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
		</div>
		<div class="text-right" style="margin-bottom:10px; margin-right:15px">
			<a href="/admin/categorymanagement/category-new" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>			
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
                  <th style="width: 75px"><?php echo e(trans ('admin.Icon')); ?></th>
                  <th><?php echo e(trans ('admin.Name')); ?><a href="/admin/categorymanagement?sort=name"><i id="user-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th><?php echo e(trans ('admin.Language')); ?></th>
                  <th><?php echo e(trans ('admin.Description_Date')); ?></th>
                  <th style="width: 210px"><?php echo e(trans ('admin.Action')); ?></th>
                </tr>
				<?php $__currentLoopData = $categoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<?php $img_url = 'images/icon/'.$data->group_icon; ?>
					<tr>					
					  <td style="line-height: 60px;"><?php echo e($key+1); ?></td>
					  <td><img style="background-color: aliceblue;width: 65px;" class="text-center" src="<?php echo e(asset($img_url)); ?>" style="width:65px"></img></td>
					  <td  style="line-height: 60px;"><?php echo e($data->group_name); ?></td>
					  <td  style="line-height: 60px;"><?php echo e($data->group_des); ?></td>
					  <td  style="line-height: 60px;">
					  <?php if($data->group_lang_id == '1'): ?>
						<label class="text-warning">English</label>
					  <?php else: ?>
						<label class="text-warning">العربية</label>
					  <?php endif; ?>
					  </td>
					  <td  style="line-height: 60px;">						
						<a type="button" class="btn btn-info" href="/admin/categorymanagement/category-edit/<?php echo e($data->id); ?>" style="margin-left:10px"><i class="fa fa-edit"></i><?php echo e(trans ('admin.Edit')); ?></a>						
						<form method="POST" id="category-delete-form<?php echo e($data->id); ?>" action="/admin/category-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "categoryid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#category-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i><?php echo e(trans ('admin.Delete')); ?></button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
				
              </tbody></table>
            </div>            
          </div>   		  
        </div>		
		</div>
		</div>
    </section>   
  </div>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>