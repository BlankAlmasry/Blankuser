<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="css/profile.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('grid-header'); ?>
    <div class="Web-body mt-4 pt-3">
        <div class="container">
            <div class="row">
            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('sidebar'); ?>
                <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php $__env->stopSection(); ?>
            <?php $__env->startSection('body'); ?>
                <?php echo $__env->make('layouts.flash-session', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <!-- profile -->

                    <div class="text-center text-md-center col-11 col-md-8 col-lg-9 mt-4 bg-white pt-3 pl-lg-5 pl-sm-2 pl-md-4 mx-4 profile">
                        <div class="picandabout d-block d-lg-flex">
                            <div class=" profile-img-carrier d-inline-block mt-4 m-0 p-0" >
                                <img src="<?php echo e($user->avatar); ?>" alt="" class="align-self-center ">
                                <p class="text-center bg-dark "><span style="font-size:20px;font-weight:bold ;font-family: monospace"><?php echo e($user->points); ?></span><span style="font-size: 14px; padding-left:5px;">POINT</span></p>
                            </div>
                            <div class="information mt-3 pl-3 pr-5 w-100">
                                <h1 class="h2 pt-1 pb-0 pt-0 my-0"><?php echo e($user->name); ?></h1>
                                <p class="small pb-3 text-muted">#<?php echo e($user->id); ?></p>
                                <h6 class="h6 text-muted"><?php echo e($user->job); ?></h6>
                                <p class="text-muted pt-3 "><?php echo e($user->about); ?></p>
                                <span><a href="edit-profile">Click here to edit</a></span>
                            </div>

                        </div>
                        <div class="row mt-4 text-muted pl-lg-5 pl-sm-1 pl-md-3 text-center text-md-left">
                            <div class="col-12 col-lg-6 ">
                                <div class="five-information">
                                    <p><i class="fa fa-briefcase"></i>&nbsp;<?php echo e($user->job); ?></p>
                                    <p><i class="fa fa-graduation-cap"></i><?php echo e($user->school); ?></p>
                                    <p><i class="fa fa-map-marker"></i>&nbsp;&nbsp;<?php echo e($user->country); ?></p>

                                </div>
                            </div>
                            <div class="col-12 col-lg-6">
                                <div class="three-information">
                                    <p><i class="fa fa-clock-o"></i>&nbsp;<?php echo e(\Carbon\Carbon::parse($user->last_log_at)->diffForHumans()); ?></p>
                                    <p><i class="fa fa-history"></i>&nbsp;<?php echo e($user->created_at->diffForHumans()); ?> </p>
                                    <p><i class="fa fa-pencil pr-0"></i><?php echo e($user->articles->count()); ?> Article</p>

                                </div>
                            </div>
                        </div>


                        <p class="text-muted text-center border-bottom mt-5 py-3 top-articles mb-4" >Top Articles</p>
                        <?php $__currentLoopData = $user->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="top-article  my-5">
                                <button class="btn  d-inline small  p-1 rounded text-white border points" style="width: 35px;height: 35px;"><?php echo e($article->points); ?></button>
                                <p class="d-inline h4 text-left"><?php echo e($article->title); ?></p>
                                <span class="text-muted small"><?php echo e($article->created_at->diffForHumans()); ?></span>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <br><hr>
                    </div>
                    <!-- profile -->



                <?php $__env->stopSection(); ?>
                <?php $__env->startSection('grid-footer'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="js/profile.js"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>