<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="css/explore-categories.css">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('grid-header'); ?>
    <div class="Web-body mt-4 pt-3 PageBody">
        <div class="container">
            <div class="row">
                <?php $__env->stopSection(); ?>
                <?php $__env->startSection('sidebar'); ?>
                    <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php $__env->stopSection(); ?>
                <?php $__env->startSection('body'); ?>


                    <div class="col-12 col-md-9 col-lg-10">
                        <div class="bg-white container mt-4 pb-5 px-5">
                            <div class="text-center about text-dark">
                                <h1 class="mb-4 pt-3">About Us</h1>
                                <img src="img/blank4.png" height="80px" alt=""><br><br>
                                <p style="height: 200px"></p><br>



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