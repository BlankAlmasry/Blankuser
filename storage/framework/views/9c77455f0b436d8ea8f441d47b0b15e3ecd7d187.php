<?php $__env->startSection('header'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="css/explore-user.css">
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
                            <div class="pl-3 mt-4" style="background: #fff;">
                                <div class="container">
                                <h1 class="text-center mb-3">Users</h1>
                                <form class="mb-5 mt-4" method="post" action="users">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group text-center">
                                        <label for="username col-lg-3 col-md-3 col-4">Find User :</label>
                                        <input type="text" placeholder="Username" name="username" id="username" class="col-lg-8 col-md-7 col-5 form-control d-inline">
                                        <button id="searchuserbtn" class="btn btn-primary col-md-2 col-3 col-lg-1 mb-2">Find</button>
                                    </div>
                                </form>
                                    <div class="text-center h6 text-muted nouserfound"></div>

                                    <div class="row users-found">
                                        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="col-12 col-sm-6 col-lg-4 col-xl-3 mb-4" onclick="window.location.href ='user?name=<?php echo e($user->name); ?>'">
                                            <img src="<?php echo e($user->avatar); ?>" class="w-25 border">
                                            <div class="w-75 float-right text-muted pl-1">
                                                <p class="p-0 m-0 small text-dark"><?php echo e($user->name); ?></p>
                                                <p class="p-0 m-0 small"><?php echo e($user->points); ?></p>
                                                <p class="small p-0 m-0"><i class="fa fa-map-marker"></i> <?php echo e($user->country); ?></p>
                                            </div>
                                        </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




                                    </div>
                                 </div>
                            </div>
                    </div>











<?php $__env->stopSection(); ?>
<?php $__env->startSection('grid-footer'); ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script src="js/explore-user.js"></script>
    <script>
        $('#username').on('keyup',function(){
          $value =$(this).val();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/users')); ?>",
                type: 'POST',
                data: {
                    username :jQuery('input[name="username"]').val() ,
                },
                success: function(data){
                    $('.users-found').empty();
                    if (data == "No user found")
                    {
                        $('.nouserfound').html("No user found");

                    }else {
                        $('.nouserfound').empty();
                    $('.users-found').html(data);
                }},

            });
        })
    </script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>