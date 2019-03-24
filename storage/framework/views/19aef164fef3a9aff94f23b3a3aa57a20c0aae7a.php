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


                    <div class="col-12 col-md-9 col-lg-10">
                        <div class="bg-white container mt-4 pb-5 px-5">
                            <div class="text-center about text-dark">
                                <h1 class="mb-4 pt-3">About Us</h1>
                                <img src="img/blank4.png" height="80px" alt=""><br><br>
                                <p>A Website made for Blank</p><br>
                                <p>By Joining Us , You accept Being A Blank , Everything about Your Personals here is null </p><br>
                                <p>We are for who just come to read information or publish it , not caring about people know him , who will read it nor popularity stuff</p><br>
                                <p>Only highest quality we be saved , better quality content will override the lower one</p><br>
                                <p>Every user Is Called Blank </p><br>
                                <p>Any personal Information About name , address or providing why to share it , Not allowed </p><br>
                                <p>In case of needing to prove that you are the writer of some articles to Interviewer <br> You can give him Token will be provided to you , max 5 uses allowed  and 1 token per day</p>



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