<?php $__env->startSection('body'); ?>
    <div class="pt-5 PageBody">
        <div class="card col-10 col-md-8 col-lg-6 col-xl-4 m-auto p-0 mt-5 pb-2 first-form">
            <div class="w-75">
            </div>
            <h2 class="card-header text-center font-weight-bold ">Login</h2>
            <form action="login" method="post">
                <?php echo csrf_field(); ?>
                <div class="card-body ">
                    <div class="form-group">
                        <label for="email">Email :</label>
                        <input placeholder="Your E-mail" required type="email" id="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password :</label>
                        <input placeholder="Password" required type="password" id="password" name="password" class="form-control">
                    </div>
                    <?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    <button class="btn-primary btn float-right next-btn">Login</button>
                    <a class="btn btn-link" href="/password/reset">
                        <spin class="forgotyour">Forgot Your Password?</spin>
                    </a>
                </div>
            </form>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>