<?php $__env->startSection('header'); ?>
    <title>Profile - BlankUser</title>
    <meta name="description" content="My profile">
    <meta name="keywords" content="profile,my profile,account,myaccount">
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
        <div class="text-center text-md-center col-11 col-md-8 col-lg-9 bg-white profile PageBody mt-4 pt-3  ml-xl-3 pl-2 pl-lg-4 ml-lg-3 ml-md-4 ml-3">
            <div class="picandabout d-block d-lg-flex">
                <div class=" profile-img-carrier d-inline-block mt-4 m-0 p-0" >
                    <img src="/<?php echo e(auth()->user()->avatar); ?>" alt="" class="align-self-center ">
                    <p class="text-center bg-dark "><span style="font-size:20px;font-weight:bold ;font-family: monospace"><?php echo e(auth()->user()->points); ?></span><span style="font-size: 14px; padding-left:5px;">POINT</span></p>
                </div>

                <div class="information mt-3 px-3 w-100">
                    <h1 class="h2 pt-1 pb-0 pt-0 my-0"><?php echo e(auth()->user()->name); ?></h1>
                    <p class="small pb-2 text-muted">#<?php echo e(auth()->user()->id); ?></p>
                    <h6 class="h6 text-muted py-1 <?php echo e((auth()->user()->job == 'none')?'d-none':''); ?>"><?php echo e(auth()->user()->job); ?> </h6>
                    <p class="text-muted pt-2 "><?php echo e(auth()->user()->about); ?></p>
                    <span><a href="edit-profile">Click here to edit</a></span>
                </div>

            </div>
            <div class="row mt-4 text-muted pl-lg-5 pl-sm-1 pl-md-3 text-center text-md-left">
                <div class="col-6  ">
                    <div class="five-information">
                        <p class="<?php echo e((auth()->user()->job == 'none')?'d-none':''); ?>"><i class="fa fa-briefcase"></i>&nbsp;<?php echo e(auth()->user()->job); ?></p>
                        <p class="<?php echo e((auth()->user()->school == 'none')?'d-none':''); ?>"><i class="fa fa-graduation-cap"></i><?php echo e(auth()->user()->school); ?></p>
                        <p class="mb-0">&nbsp;<i class="fa fa-map-marker"></i>&nbsp;<?php echo e(auth()->user()->country); ?></p>

                    </div>
                </div>
                <div class="col-6 ">
                    <div class="three-information">
                        <p><i class="fa fa-clock-o"></i>Last login&nbsp;<?php echo e(\Carbon\Carbon::parse(auth()->user()->last_log_at)->diffForHumans()); ?></p>
                        <p><i class="fa fa-history"></i>Member for <?php echo e(auth()->user()->created_at->diffForHumans()); ?> </p>
                        <p><i class="fa fa-pencil pr-0"></i><?php echo e((auth()->user()->articles->count()=='0')?'no':''); ?> Articles</p>

                        

                    </div>
                </div>
            </div>

            <div class="<?php echo e((auth()->user()->articles->count() == 0)?'d-none':''); ?>">
            <p class="  text-muted text-center border-bottom mt-5 py-3 top-articles mb-4" >Top Articles</p>
            <?php $__currentLoopData = auth()->user()->articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="top-article  my-5" onclick="window.location.href='<?php echo e(str_replace(' ','-',$article->title)); ?>'" style="cursor:pointer;">
                <button class="btn  d-inline small  p-1 rounded text-white border points" style="width: 35px;height: 35px;"><?php echo e($article->points); ?></button>
                <p class="d-inline h4 text-left"><?php echo e($article->title); ?></p>
                <span class="text-muted small"><?php echo e($article->created_at->diffForHumans()); ?></span>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <br><hr>
        </div>
            </div>
        <!-- profile -->



<?php $__env->stopSection(); ?>
<?php $__env->startSection('grid-footer'); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="/js/profile.js"></script>
    <script>$('.search-form').on('submit',function (e) {
            e.preventDefault();
            var sss = $('.search-form input[type="text"]').val();
            var art = sss.replace(' ', '+');
            console.log(art);

            window.location="/search/"+art;

        });</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>