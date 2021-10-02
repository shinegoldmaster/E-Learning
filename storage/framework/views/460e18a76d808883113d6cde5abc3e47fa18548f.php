  
  <?php $__env->startSection('frontend-content'); ?>        
	<script src="<?php echo e(asset('js/chart.js')); ?>" type="text/javascript"></script>					
	<link href="<?php echo e(asset('css/main2.css')); ?>" rel="stylesheet">	

	<section id="stats">

        <div class="container">
            <div class="section-title"></div>
            <div class="section-title">
                <h3><?php echo e(trans('stats.Statics')); ?></h3>
            </div>
			
            <h4 class="no-margin text-center mb30"><?php echo e(trans('stats.users_country')); ?></h4>
			
            <div class="row">
               <div class="col-sm-6">
                    <div class="widget panel panel-success no-padding plus-space">
                        <div class="widget-body">
                            <!-- students -->
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
								<div class="divScroll" style="overflow: hidden; width: auto; height: 300px;">
									<table class="table table-striped">
										<thead>
										<tr>
											<th><?php echo e(trans('stats.Country')); ?></th>
											<th><?php echo e(trans('stats.Students')); ?></th>
										</tr>
										</thead>
										<tbody>
											<?php $__currentLoopData = $stuedntsCountByCountry; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($data->name); ?></td>
												<td><?php echo e($data->total); ?></td>
											</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
                        </div>
                    </div>
                    <div class="widget-footer no-bg text-center">
                    </div>
                    <br>
                </div> 

                
                <div class="col-sm-6">
                    <div class="widget panel panel-success no-padding plus-space">
                        <div class="widget-body">
                            <div class="slimScrollDiv" style="position: relative; overflow: hidden; width: auto; height: 300px;">
								<div class="divScroll" style="overflow: hidden; width: auto; height: 300px;">
									<table class="table table-striped">
										<thead>
											<tr>
												<th><?php echo e(trans('stats.Appointments')); ?></th>
												<th><?php echo e(trans('stats.Total')); ?></th>
											</tr>
										</thead>
										<tbody>	  	
										<?php $__currentLoopData = $getAllAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>									
											<tr>
											<?php if($list->status == 0): ?>
												<td>Available</td>
											<?php elseif($list->status == 1): ?>								
												<td>Reserved</td>
											<?php elseif($list->status == 2): ?>	
												<td>Cancelled</td>
											<?php else: ?>	
												<td>Attended</td>
											<?php endif; ?>	
												<td><?php echo e($list->total); ?></td>
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
								</div>
							</div>
                        </div>
                    </div>
                </div>
            </div>

            <h4 class="no-margin text-center mb30"><?php echo e(trans('stats.Programs')); ?></h4>
            <div class="row">              
                <div class="col-sm-12">

                    <div class="widget panel panel-success no-padding plus-space">
                        
                        <div class="widget-body">
            
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th><?php echo e(trans('stats.Programs')); ?></th>
                                    <th><?php echo e(trans('stats.Total')); ?></th>
                                </tr>
                                </thead>

                                <tbody>
								
								<?php $__currentLoopData = $getProgramCountByLangAndGroup; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td><?php echo e($data->name); ?></td>
										<?php if($data->total): ?>
											<td><?php echo e($data->total); ?></td>
										<?php else: ?>
											<td>0</td>
										<?php endif; ?>
									</tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="widget-footer no-bg text-center">
                </div>
                <br>
            </div>

            
			
            <div class="row">
                <div class="col-sm-6">


                    <div class="widget panel no-padding plus-space">
                        <div class="panel-heading">
                            <h5 class="panel-title text-center"><?php echo e(trans('stats.chart_programs')); ?></h5>
                        </div>

                        <div class="widget-body">
                            <div class="canvas-holder text-center" style="width:300px;text-align:center;margin: 10px auto;">
                                <canvas class="img-responsive" id="programChart" width="200" height="200" style="margin: 10px auto; width: 200px; height: 200px;"></canvas>
                            </div>
							<script>					
								var config = {
									type: 'pie',
									data: {
										datasets: [{
											data: [
											<?php
												foreach($getProgramCountByLangAndGroup as $data){
													echo  $data->total . ",";
												}
											?>
											],
											backgroundColor: [
												'#F7464A','#949FB1','#18af90','#F300F5',
											],
											label: 'Dataset 1'
										}],
										labels: [
											<?php
												foreach($getProgramCountByLangAndGroup as $data){
													echo "\"" . $data->name . "\",";
												}
											?>
										]
									},
									options: {
										responsive: true,
										legend: {
											position: 'bottom',
										},
										title: {
											display: false,
											text: 'chart of programs'
										}
									}
								};

														
							</script>	
                        </div>
						<?php $colors = array();
								array_push($colors, '#F7464A');
								array_push($colors, '#949FB1');
								array_push($colors, '#18af90');
								array_push($colors, '#F300F5');								
						?>
                        <div class="widget-footer panel-footer no-bg text-center" style="position: absolute;width: 94%;top: 330px;height: 55px;">
							<?php $i = 0;
								foreach($getProgramCountByLangAndGroup as $key => $data){ ?>
								<span class="label label-danger-alt" style="background-color: <?php echo e($colors[0]); ?>"><?php echo e($data->name); ?>

									<span class="icon-right">
									<?php if($data->total): ?>
										<?php echo e($data->total); ?>

									<?php else: ?>
										0
									<?php endif; ?>
								</span>                               
                            </span>
								<?php $i++;} ?>                    
                        </div>
                    </div>

                </div>
				
				
                <div class="col-sm-6">

                    <div class="widget panel no-padding plus-space">
                        <div class="panel-heading">
                            <h5 class="panel-title text-center"><?php echo e(trans('stats.chart_appointments')); ?></h5>
                        </div>
                        <div class="widget-body">
                            <div class="canvas-holder text-center" style="width:300px;text-align:center;margin: 10px auto;">
                                <canvas class="img-responsive" id="appointmentChart" width="200" height="200" style="margin: 10px auto; width: 200px; height: 200px;"></canvas>
                            </div>
							<script>					
								var config1 = {
									type: 'pie',
									data: {
										datasets: [{
											data: [
												<?php
													foreach($getAllAppointments as $data){
														echo  $data->total . ",";
													}
												?>
											],
											backgroundColor: [
												'#F7464A','#949FB1','#18af90','#F300F5',
											],
											label: 'Dataset 2'
										}],
										labels: [
											'Available',
											'Reserved',
											'Cancelled',
											'Attended',												
										]
									},
									options: {
										responsive: true,
										legend: {
											position: 'bottom',
										},
										title: {
											display: false,
											text: 'chart of appointments'
										}
									}
								};
								window.onload = function() {
									var ctx = document.getElementById("programChart").getContext("2d");
									window.myPie = new Chart(ctx, config);
								
									var ctx1 = document.getElementById("appointmentChart").getContext("2d");
									window.myPie1 = new Chart(ctx1, config1);
								};							
							</script>	
                        </div>
                        <div class="widget-footer panel-footer no-bg text-center" style="position: absolute;width: 94%;top: 330px;height: 55px;">
						<?php $__currentLoopData = $getAllAppointments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<?php if($list->status == 0): ?>	
                            <span class="label label-danger-alt" style="background-color: <?php echo $colors[0]; ?>;"><?php echo e(trans('stats.Available')); ?>

							<?php elseif($list->status == 1): ?>	                               
                            <span class="label label-default" style="background-color: <?php echo $colors[1]; ?>;"><?php echo e(trans('stats.Reserved')); ?>

                            <?php elseif($list->status == 2): ?>	
                            <span class="label label-warning" style="background-color: <?php echo $colors[2]; ?>;"><?php echo e(trans('stats.Cancelled')); ?>

                            <?php else: ?>
                            <span class="label label-success-alt" style="background-color: <?php echo $colors[3]; ?>;"><?php echo e(trans('stats.Attended')); ?>

							<?php endif; ?>
						    <?php if($data->total): ?>
								<span class="icon-right"><?php echo e($list->total); ?></span></span>
							<?php else: ?>
								<span class="icon-right">0</span></span>
							<?php endif; ?> 
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>

                </div>
            </div>

			
			

        </div>

	</section>
	
  <?php $__env->stopSection(); ?>  
	
<?php echo $__env->make('layouts/front-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>