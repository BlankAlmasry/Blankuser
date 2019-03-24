<?php $__env->startSection('header'); ?>
    <title>Articles - BlankUser</title>
    <meta name="description" content="Articles meta and categories">
    <meta name="keywords" content="articles,writer,author,categories,blankuser,blog">
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


                    <div class=" col-12 col-md-9 col-lg-10 text-center text-dark px-4 pt-4  ">
                        <div class="bg-white explore-article pb-5">
                            <div class="our-articles mb-5  ">
                                <h1 class="mb-4 ">Articles</h1>
                                <p>Our Articles is written by admin or users , CopyRights preserved for Author. </p>
                                <p>Our goal is to make respected Blog That allow user to add , edit and rate it's Articles under scientific evidence.</p>
                            </div>
                            <div class="rules mb-5  px-5">
                                <h1 class="mb-4">Meta</h1>
                                <p>Any Content Other than allowed Categories , will result into ban.</p>
                            </div>
                            <div class="approval mb-5  px-5">
                                <h1 class="mb-4">Approval</h1>
                                <p>Publish Article need to be approved by admin just in case of spam , mistakes or CopyRight issue. </p>
                            </div>
                            <h2>Main Categories</h2>

                            <table class="table table-bordered">
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

                            <a href="/add-article" class="float-right mt-1  mr-1 btn btn-primary">Add Post</a>
                        </div>



                    </div>



                <?php $__env->stopSection(); ?>
                <?php $__env->startSection('grid-footer'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>