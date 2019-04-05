<!--Sections-->
<div class="d-none d-lg-inline-block col-lg-3  news-section">

<?php if($bestArticle): ?>
<div class="card  mt-2 px-0">
    <div class=" text-white bg-dark card-header text-center h4">Best Articles today</div>
    <div class="card-body card-body-img  p-0 border border-dark my-0" onclick="window.location.href='<?php echo e(str_replace(' ', '-',$bestArticle->title)); ?>'" style="cursor: pointer;">
        <p class="card-title h6 font-weight-bold text-center mb-0 px-1 py-0"><?php echo e($bestArticle->title); ?></p>
       <div class=" img-carier d-inline-flex mt-1" style="background-image:url('\images/<?php echo e($bestArticle->img); ?>');    background-size: 100% 180px ,contain;
           height: 180px;
           width: 100%;
           background-repeat: no-repeat;
           background-position: center; "></div><small class="text-dark"></small>
    </div>  </div>
<?php endif; ?>



    <div class="card  mt-2 px-0">
        <div class=" text-white bg-secondary card-header text-center h4">LeaderBoard</div>
        <div class="card-body w-100 h-100 py-0">
            <table class="table-striped table-sm table-bordered leaderboard w-100">
                <thead>
                <tr>
                    <th class="text-center text-muted">User</th>
                    <th class="text-center text-muted">Points</th>
                </tr>
                </thead>
                <tbody>
                <?php $__currentLoopData = $topFive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $top): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr style="cursor: pointer" onclick="window.location.href='/user?name=<?php echo e($top->name); ?>'">
                    <th scope="row">
                        <img src="/<?php echo e($top->avatar); ?>"  width="30px" alt="">
                        <p class="align-bottom p-0 m-0 align-text-top small "><?php echo e(str_limit($top->name,24)); ?></p><br>
                    </th>
                    <td><span style="color: #a08332;"> ●</span><?php echo e($top->points); ?></td>
                </tr>
               <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>

    </div>



</div>
<!--Sections-->
