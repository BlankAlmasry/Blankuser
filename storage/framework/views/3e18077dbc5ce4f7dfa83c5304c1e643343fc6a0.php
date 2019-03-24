<!--SideBar-->
<?php if(auth()->user()): ?>
<div class="d-none d-md-inline-block col-4 col-md-3 col-lg-2 target nav-section text-muted   p-0 pl-lg-3 pl-sm-0 pl-md-1" style="">
    <div class="Mytext font-weight-bold <?php echo e((
    $_SERVER['REQUEST_URI'] !=='/profile' &&
    $_SERVER['REQUEST_URI'] !=='/my-articles' &&
    $_SERVER['REQUEST_URI'] !=='/categories' &&
    $_SERVER['REQUEST_URI'] !=='/articles' &&
    $_SERVER['REQUEST_URI'] !=='/about' &&
    $_SERVER['REQUEST_URI'] !=='/contact' &&
    $_SERVER['REQUEST_URI'] !=='/users' &&
    $_SERVER['REQUEST_URI'] !=='/leaderboard'
    )?'text-black-50 active':''); ?> mt-4 text-mute w-100" onclick="window.location.href = '/home'">Home</div><hr>
    <div class="Mytext   w-100 <?php echo e(($_SERVER['REQUEST_URI'] =='/profile')?'text-black-50 active':''); ?> " onclick="window.location.href = '/profile'">
        <img src="/img/user2.jpg" class=" d-md-inline-block" width="20" height="20" class="d-inline align-top">
        <span>Profile</span>
    </div>
    <div class="Mytext w-100 <?php echo e(($_SERVER['REQUEST_URI'] =='/my-articles')?'text-black-50 active':''); ?> " onclick="window.location.href = '/my-articles'" ><i class="fa fa-pencil  d-md-inline-block" ></i> My Articles</div>
    <div class="Mytext w-100 <?php echo e(($_SERVER['REQUEST_URI'] =='/leaderboard')?'text-black-50 active':''); ?> " onclick="window.location.href = '/leaderboard'"><i class="fa fa-trophy  d-md-inline-block"></i> LeaderBoards</div><hr>
    <div class="Mytext w-100 Explore">Explore</div>
    <div class="Mytext w-100 Explore-parent pt-0 <?php echo e(($_SERVER['REQUEST_URI'] =='/users')?'text-black-50 active':''); ?> " onclick="window.location.href = '/users'">&nbsp;&nbsp;&nbsp;&nbsp;Users</div>
    <div class="Mytext w-100 Explore-parent <?php echo e(($_SERVER['REQUEST_URI'] =='/articles')?'text-black-50 active':''); ?> " onclick="window.location.href = '/articles'">&nbsp;&nbsp;&nbsp;&nbsp;Articles</div>
    <div class="Mytext  w-100 Explore-parent <?php echo e(($_SERVER['REQUEST_URI'] =='/categories')?'text-black-50 active':''); ?> " onclick="window.location.href = '/categories'">&nbsp;&nbsp;&nbsp;&nbsp;Categories</div><hr>
    <a href="/logout" class="Mytext w-100 text-primary"><i style="font-size: 12px ;color: #302e35; " class="fa  d-md-inline-block fa-sign-out"></i> Log Out</a>
</div>
<?php endif; ?>

<!--SideBar-->
<!-- SideBar Guest -->
<?php if(auth()->guest()): ?>

    <div class="d-none d-md-inline-block col-4 col-sm-3 col-md-3 col-lg-2 target nav-section text-muted   p-0 pl-lg-3 pl-sm-0 pl-md-1" style="">
    <div class="Mytext text-black-50  mt-4 active   text-mute w-100">Home</div><hr>
        <div class="Mytext w-100" onclick="window.location.href = 'leaderboard'"><i class="fa fa-trophy  d-md-inline-block"></i> LeaderBoards</div><hr>

        <div class="Mytext w-100 Explore">Explore</div>

        <div class="Mytext w-100 Explore-parent pt-0" onclick="window.location.href = '/users'">&nbsp;&nbsp;&nbsp;&nbsp;Users</div>
        <div class="Mytext w-100 Explore-parent" onclick="window.location.href = '/articles'">&nbsp;&nbsp;&nbsp;&nbsp;Articles</div>
        <div class="Mytext  w-100 Explore-parent" onclick="window.location.href = '/categories'">&nbsp;&nbsp;&nbsp;&nbsp;Categories</div><hr>
    <div class="Mytext w-100 text-primary" onclick="window.location.href='/login'"><i style="font-size: 12px ;color: #302e35; " class="fa d-none d-md-inline-block fa-sign-out"></i> Sign In</div>
</div>
<?php endif; ?>
<!-- Sidebar Guest -->
