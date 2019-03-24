<?php $__env->startSection('header'); ?>
    <link rel="stylesheet" href="css/explore-categories.css">
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


                    <div class="col-12 col-md-9 col-lg-10 text-center text-dark px-3 mt-4 ">
                        <div class="container bg-white ">
                            <div class=" px-1  pt-2 px-lg-5 mx-lg-5  pb-5">
                                <h1>Categories</h1>
                                <p>Our Categories based on Articles written by admins or users and Started with 3 main Categories which are physics , mathematics and programming  </p>
                                <p>In case of writing Article with custom category chosen by user it will need more than 1/100 of articles of blog , more than 10 articles and more than 100 point </p>
                                <p>Category need to be scientific to be approval and counted  </p>
                                <br><br>
                                <table class="table table-bordered  ">
                                    <tr>
                                        <th>Category</th>
                                        <th>Articles</th>
                                        <th>Points</th>
                                    </tr>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <tr onclick="window.location.href='/<?php echo e(strtolower($category->name)); ?>'">
                                        <td ><?php echo e($category->name); ?></td>
                                        <td><?php echo e($category->articles()->count()); ?></td>
                                        <td><?php echo e($category->points); ?></td>
                                    </tr>

                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                </table>

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