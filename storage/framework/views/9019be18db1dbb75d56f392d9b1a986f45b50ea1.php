<?php $__env->startSection('instructor-dashboard'); ?>
    <section class="profile">
        <div class="container">
            <div class="section-title">
                <h3><?php echo e(trans('instructor.instructor_Dashboard')); ?></h3>
            </div>
            <div class="row">
                <!-- sub-main -->
                <div class="col-md-3 col-sm-12">
                    <?php echo $__env->make('instructor.instructor-leftmenu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
                <div class="col-md-9 col-sm-9 col-xs-12">
                    <div class="student-section-content card hoverable">
                        <div class="tab-content">
                            <!-- Page Content-->
                            <div id="section-9">
                                <div class="send-msg">
                                    <div class="section-title bg-blue">
                                        <h3><?php echo e(trans('instructor.Messages')); ?></h3>
                                    </div>
                                    <?php if($errors->any()): ?>
                                        <div class="error"><?php echo e($errors->first()); ?></div>
                                    <?php endif; ?>
                                    <div class="padding-20">
                                        <div class="row">
                                            <form method="POST" action="/instructor/sendmessage" accept-charset="UTF-8" class="form-horizontal bordered">
                                                <?php echo e(csrf_field()); ?>

                                                <div class="col-md-8 col-md-offset-2 col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="box">
                                                                <select class="wide" id="receiver" name="receiver" required>
                                                                    <option value="" selected><?php echo e(trans('instructor.Receiver')); ?></option>
                                                                    <?php $__currentLoopData = $recipienterlist; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                        <option value="<?php echo e($item->id); ?>"><?php echo e($item->name); ?></option>
                                                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                                </select>
                                                                <script>
                                                                    $('#receiver').niceSelect();

                                                                </script>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="input-field col-md-12">
                                                            <textarea name="msg" id="msg" class="materialize-textarea" required=""></textarea>
                                                            <label for="textarea1"><?php echo e(trans('instructor.Msg')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="row text-center">
                                                        <button type="submit" class="btn btn-blue waves-effect"><i class="fa fa-send"></i> <?php echo e(trans('instructor.Send')); ?></button>
                                                        <a class="btn bg-danger waves-effect" style="color: #ffffff;" type="cancel" onclick="history.back(-1)"><i class="fa fa-ban" aria-hidden="true"></i> <?php echo e(trans('instructor.Cancel')); ?></a>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts/instructor-dashboard', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>