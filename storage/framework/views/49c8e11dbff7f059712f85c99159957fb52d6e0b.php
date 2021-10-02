
<?php $__env->startSection('admin-content'); ?>        
	     
<?php echo $__env->make('admin.admin-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>	

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
   
    <section class="content-header text-center">
      <h1>
        Library Category Management
      </h1>
      <ol class="breadcrumb">
        <li><a href="/admin"><i class="fa fa-dashboard"></i> Admin</a></li>
        <li class="active">Library Category Management</li>
      </ol>
    </section>

   
    <section class="content">	
	 <div class="row">
		<div class="col-md-12 col-sm-12 col-xs-12">
			<div class="col-lg-4 col-xs-6">			  
			  <div class="small-box bg-aqua">
				<div class="inner">
				  <h3><?php echo e($totalLibraryCategoryCount); ?></h3>

				  <p>Library Category</p>
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
			<a href="#" class="btn btn-primary" data-toggle="modal" data-target="#addnewcategory" data-original-title="Add New">
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
                 
                  <th>Title<a href="/admin/librarycategory?sort=title"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
				  <th>Type<a href="/admin/librarycategory?sort=type"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>
                  <th>Create Date<a href="/admin/librarycategory?sort=date"><i id="subcategory-sort-status" class="fa fa-sort" aria-hidden="true" style="float:right;"></i></a></th>            
                  <th style="width: 210px">Action</th>
                </tr>
				<?php $__currentLoopData = $libraryCategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					
					<tr>					
					  <td style="line-height: 60px;"><?php echo e($key+1); ?></td>
					 
					  <td  style="line-height: 60px;"><?php echo e($data->cat_name); ?></td> 
					  <td  style="line-height: 60px;">
						<select name="categorytypes" style="width:100%">
							<?php if($data->types == '0'): ?>
							<option value="0" selected>Library</option>
							<option value="1">Quran Library</option>
							<?php else: ?>
							<option value="0">Library</option>
							<option value="1" selected>Quran Library</option>	
							<?php endif; ?>
						</select>
					  </td>
					  <td  style="line-height: 60px;"><?php echo e($data->created_at); ?></td>
					
					  <td  style="line-height: 60px;">	
						<a href="#" class="btn btn-info" data-toggle="modal" data-target="#editcategory<?php echo e($data->id); ?>" data-original-title="Add New">
						<i class="fa fa-edit"></i>Edit</a>								  
												
						<form method="POST" id="librarycategory-delete-form<?php echo e($data->id); ?>" action="/admin/library/librarycategory-delete" accept-charset="UTF-8" class="form-horizontal bordered" role="form" style="margin-right:10px;float:right;">
							<?php echo e(csrf_field()); ?>	
							<input name = "categoryid" value="<?php echo e($data->id); ?>"  type="hidden" />
							<button type="button" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#librarycategory-delete-form<?php echo e($data->id); ?>').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i>Delete</button>				
						</form>
					  </td>					
					</tr>					
				<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>             
				
              </tbody></table>
            </div>
            
          </div>    
		<div class="col-md-12 col-sm-12 col-xs-12 text-center">
		<?php echo e($libraryCategoryList->links()); ?>

		</div>
		  
        </div>
		
	  </div>
		
	<div class="modal fade" id="addnewcategory" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Add Library Category</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="librarycategory-save-new-form" action="/admin/library/librarycategory-new-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>	
					   <table class="table">
						<tbody>
						 <tr>
						  <th style="width: 150px" class="text-right">Category Name:</th>
						  <th><input type="text"  style="width: 100%" name="categoryname" value="" autofocus></th>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right">Category Type</td>
						  <td><select  style="width: 100%" name="categorytypes">		
							<option value="-1" selected>Select Library Type</option>
							<option value="0">Library</option>
							<option value="1">Quran Library</option></select></td>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right">Quran Menu </td>
						  <td><select name="menuid"  style="width: 100%; opacity:0.3; cursor: not-allowed;" disabled>		
							<option value="0" selected>Select Quran Meun</option>
							<?php $__currentLoopData = $quranmenudata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option value="<?php echo e($list->id); ?>"><?php echo e($list->menu_name); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select></td>
				         </tr>
				        </tbody>
				       </table>						
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#librarycategory-save-new-form').submit();" data-original-title="save">Save</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php $__currentLoopData = $libraryCategoryList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="modal fade" id="editcategory<?php echo e($data->id); ?>" role="dialog" style="display: none;">
		<div class="modal-dialog">
			
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title">Edit Library Category</h4>
				</div>
				<div class="modal-body">
					<form method="POST" id="librarycategory-save-edit-form" action="/admin/library/librarycategory-edit-save" accept-charset="UTF-8" class="form-horizontal bordered text-center" role="form" enctype="multipart/form-data">
					<?php echo e(csrf_field()); ?>	
					<input type="hidden" name="categoryid" value="<?php echo e($data->id); ?>">
					  <table class="table">
						<tbody>
						 <tr>
						  <th style="width: 150px" class="text-right">Category Name:</th>
						  <th><input type="text"  style="width: 100%" name="categoryname" value="<?php echo e($data->cat_name); ?>" autofocus></th>
				         </tr>
						 <tr>
						  <td style="width: 150px" class="text-right">Category Type</td>
						  <td><select name="categorytypes"  style="width: 100%">		
							<?php if($data->types == '0'): ?>
							<option value="0" selected>Library</option>
							<option value="1">Quran Library</option>
							<?php else: ?>
							<option value="0">Library</option>
							<option value="1" selected>Quran Library</option>	
							<?php endif; ?>
							</select></td>
				         </tr>
						
						 <tr>
						 <input type="hidden" id="libraryidvalue" value="<?php echo e($data->menu_id); ?>" />
						  <td style="width: 150px" class="text-right">Quran Menu </td>
						  <td><select name="menuid"  style="width: 100%">		
							<option value="0" selected>Select Quran Meun</option>
							<?php $__currentLoopData = $quranmenudata; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							 <?php if($list->id == $data->menu_id): ?>
							  <option value="<?php echo e($list->id); ?>" selected><?php echo e($list->menu_name); ?></option>
							 <?php else: ?>
							  <option value="<?php echo e($list->id); ?>"><?php echo e($list->menu_name); ?></option>
							 <?php endif; ?>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
							</select></td>
				         </tr>
						
				        </tbody>
				       </table>		
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-info" onclick=" $('#librarycategory-save-edit-form').submit();" data-original-title="save">Update</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
		
    </section>
   <script>
		$(document).ready(function() {
			var id = $('#libraryidvalue').val();
			changeDisableStatus(id);
		});
		$('select[name="categorytypes"]').on('change', function(){
			var id = $(this).val();
			changeDisableStatus(id);
		});
		
		function changeDisableStatus(id){
			if(id == '1'){
				$('select[name="menuid"]').prop('disabled',false);
				$('select[name="menuid"]').css('opacity', '1');
				$('select[name="menuid"]').css('cursor', 'pointer');
			}else{
				$('select[name="menuid"]').prop('disabled',true);
				$('select[name="menuid"]').css('opacity', '0.3');
				$('select[name="menuid"]').css('cursor', 'not-allowed');
			}
		}
   </script>
  </div>
  
  
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('layouts/admin-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>