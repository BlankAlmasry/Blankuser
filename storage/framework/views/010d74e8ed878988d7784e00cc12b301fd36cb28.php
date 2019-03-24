<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="css/leaderboard.css">

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
<div class="col-12 col-md-9 col-lg-10 leaderboard  pl-2 mt-4">
    <div class="bg-white ">
        <div class="leaderboardrank">
            <div class="py-1 px-3" style="background-color: black ">
                <img src="img/blanksquare.jpg"width="50px" height="50px" class="">
                <h3 class="text-white d-inline position-relative " style="top: 8px;">Leaderboard</h3>
            </div>

        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <div class="pl-4 py-2 border-bottom">
                <div class=" d-inline-block">
                    <span class="h5 d-inline"><?php echo e($i+=1); ?></span>
                    <img src="<?php echo e($user->avatar); ?>" height="70px" width="70px" class="rounded-circle user-img">
                </div>

                <div class=" d-inline-block " style="position: relative;top:12px">
                    <p class=" h3 mb-0 pb-0 d-block"><?php echo e($user->name); ?></p>
                </div>
                <div class="float-right h5 text-muted font-weight-normal mt-4 mr-4 pt-1 "><?php echo e($user->points); ?> POINT</div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>









<?php $__env->stopSection(); ?>
<?php $__env->startSection('grid-footer'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>