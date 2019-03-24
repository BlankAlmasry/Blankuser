<?php $__env->startSection('body'); ?>
    <div class="pt-5 PageBody">
    <div class="card col-10 col-md-8 col-lg-6 col-xl-4 m-auto p-0 mt-5 pb-2 first-form">
        <div class="w-75">
        </div>
        <h2 class="card-header text-center font-weight-bold ">Register</h2>
        <form action="register" method="post">
            <?php echo csrf_field(); ?>
            <div class="card-body ">
                <div class="form-group">
                    <label for="name">Name :</label>
                    <input placeholder="Your name" required type="text" id="name" name="name" class="form-control">
                    <small class="name3 d- small float-right text-muted alert-danger">name must be at least 3 characters</small>
                </div>
                <div class="form-group">
                    <label for="email">Email :</label>
                    <input placeholder="Your E-mail" required type="email" id="email" name="email" class="form-control">

                </div>
                <div class="form-group">
                    <label for="password">Password :</label>
                    <input placeholder="Password" required type="password" id="password" name="password" class="form-control">
                    <small class="password8  small float-right text-muted alert-danger">password must be at least 8 characters</small>

                </div>
                <div class="form-group">
                    <label for="password_confirmation">Confirm Password :</label>
                    <input placeholder="Confirm Password" required type="password" id="password_confirmation" name="password_confirmation" class="form-control">
                </div>
                <?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <button class="btn-success btn float-right next-btn">Register</button>
            </div>
        </form>
    </div>
    </div>
<?php $__env->stopSection(); ?>
<script>

</script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>