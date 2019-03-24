<?php $__env->startSection('header'); ?>
    <title>Article Categories - BlankUser.com</title>
    <meta name="description" content="Our Article Categories are Science , Technology , Engineer and mathematics (STEM) .">
    <meta name="keywords" content="STEM,article,categories,science,math,mathematics,tech,technology,engineer">
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
                    <div class="col-12 col-md-9 col-lg-10 text-center text-dark px-3 mt-4 ">
                        <div class="container bg-white ">
                            <div class=" px-1  pt-2 px-lg-5 mx-lg-5  pb-5">
                                <h1>Categories</h1>
                                <p>Our articles based on 4 main Categories which are Science , Technology , Engineer and Mathematics </p>
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