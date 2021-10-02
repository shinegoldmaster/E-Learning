<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        <?php echo e(trans ('admin.Assignment_SubCategory')); ?> : <?php echo e(trans ('admin.Instructor')); ?>

      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin/admin"><i class="fa fa-dashboard"></i><?php echo e(trans ('admin.Admin')); ?></a></li>
        <li class="active"><?php echo e(trans ('admin.Sub_Category_Assignment')); ?></li>
      </ol>
    </section>

   
    <section class="content">	
	   <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
		
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($joinCount); ?></h3>
				  <p><?php echo e(trans ('admin.Total_Assignment')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa  fa-suitcase" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-red">
				<div class="inner">
				  <h3><?php echo e($subcategoryCount); ?></h3>
				  <p><?php echo e(trans ('admin.SubCategory')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-gg" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-yellow">
				<div class="inner">
				  <h3><?php echo e($instructorCount); ?></h3>
				  <p><?php echo e(trans ('admin.Instructor')); ?></p>
				</div>
				<div class="icon">
				  <i class="ion ion-person-add"></i>
				</div>
				<a href="#" class="small-box-footer">
				  <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
			<div class="col-lg-3 col-xs-6">			  
			  <div class="small-box bg-green">
				<div class="inner">
				  <h3><?php echo e($subcategoryTime->setting_value); ?>&nbsp;<?php echo e(trans ('admin.Minutes')); ?></h3>
				  <p><?php echo e(trans ('admin.Session_Time')); ?></p>
				</div>
				<div class="icon">
				  <i class="fa fa-clock-o" aria-hidden="true"></i>
				</div>
				<a href="#" class="small-box-footer">
				 <?php echo e(trans ('admin.More_info')); ?><i class="fa fa-arrow-circle-right"></i>
				</a>
			  </div>
			</div>
			
		</div>
		
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
				<table class="table table-bordered admin-table">
				<tbody>
					<form method="POST" action="/admin/update-subcategorytime" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
						<?php echo e(csrf_field()); ?>	
						<input name = "settingid" value="<?php echo e($subcategoryTime->id); ?>"  type="hidden" />
						<tr>
							<td style="width:150px;border-right: none;line-height: 26px;"><?php echo e(trans ('admin.Setting_Time')); ?></td>
							<td style="border-left: none;border-right: none;" class="text-right"><input class="text-right" type="text" name="settingvalue" value="<?php echo e($subcategoryTime->setting_value); ?>" style="text-align: right; font-size:18px;"></td>
							<td  style="border-left: none;border-right: none;line-height: 26px;" class="text-left;" ><?php echo e(trans ('admin.Minutes')); ?></td>
							<td style="width:50px;border-left: none;"><button type="submit" class="btn btn-info" data-original-title="update"><i class="fa fa-save"></i></button>	</td>
						</tr>	
					</form>
				</tbody>
				</table>
			</div>
		</div>
		
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="box">	
				<table class="table table-bordered">
				<tbody>
					<form method="POST" action="/admin/assign-subcategory-insturctor" accept-charset="UTF-8" class="form-horizontal bordered" role="form" enctype="multipart/form-data" style="margin-right:10px;float:right;">
						<?php echo e(csrf_field()); ?>	
						
						<tr class="text-center"><td colspan="2"><h5><?php echo e(trans ('admin.Assignment_SubCategory_VS_Instructor')); ?> </h5></td></tr>
						<tr class="text-center">
							<td style="border-bottom:none"><?php echo e(trans ('admin.Sub_Category')); ?> </td>
							<td style="border-bottom:none"><?php echo e(trans ('admin.Instructor')); ?></td>
						</tr>
						<tr>
							
							<td style="border-top:none">
								<select class="form-control"  name="subcategoryfield" required >			
									<option value="0" selected><?php echo e(trans ('admin.Select_Sub_Category')); ?></option>
									<?php $__currentLoopData = $subcategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($list->id); ?>"><?php echo e($list->session_title); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
								</select>		
							</td>
							<td style="border-top:none">
								<select class="form-control"  name="instructorfield" required >			
									<option value="0" selected><?php echo e(trans ('admin.Select_Instructor')); ?></option>
									<?php $__currentLoopData = $instructorList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($list->id); ?>"><?php echo e($list->name); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>				
								</select>		
							</td>
						</tr>	
						<tr class="text-center">
							<td class="text-center" colspan="2">
								<button type="submit" class="btn btn-info" data-original-title="update"><i class="fa fa-hand-o-down"></i>&nbsp;&nbsp;<?php echo e(trans ('admin.Assignment')); ?></button>	
							</td>
						</tr>
					</form>
				</tbody>
				</table>
			</div>
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
            <div class="box-body">
              <table class="table table-bordered admin-table">
                <tbody><tr>
                  <th style="width: 25px">#</th>
                  <th><?php echo e(trans ('admin.SubCategory_Title')); ?><a href="/admin/assignsubcategory?sort=ctitle"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>  
                  <th><?php echo e(trans ('admin.Instructor_Name')); ?><a href="/admin/assignsubcategory?sort=iname"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>				 
                  <th><?php echo e(trans ('admin.Create_Date')); ?><a href="/admin/assignsubcategory?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th> 				                  
                  <th style="width: 110px"><?php echo e(trans ('admin.Action')); ?></th>
                </tr>
				<?php $__currentLoopData = $joinList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>					
					  <td><?php echo e($key+1); ?></td>					 
					  <td><?php echo e($data->session_title); ?></td> 
					  <td><?php echo e($data->name); ?></td>
					  <td><?php echo e($data->created_at); ?></td>				 
					  <td>				
						<form method="POST" id="assign-delete-form<?php echo e($data->id); ?>" action="/admin/assign-subcategory-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "assignid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#assign-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i><?php echo e(trans ('admin.Delete')); ?></button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
            
		  <div class="col-md-12 col-sm-12 col-xs-12 text-center">
		     <?php echo e($joinList->links()); ?>

		  </div>
		   </div> 
        </div>
		
		</div>
    </section>
   
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>