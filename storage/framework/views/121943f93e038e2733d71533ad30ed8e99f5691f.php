<?php $__env->startSection('header'); ?>
    <title><?php echo e($post->first()->title); ?> - BlankUser</title>
    <meta name="description" content="<?php echo e(str_limit(trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9]/', ' ',urldecode(html_entity_decode(strip_tags($post->first()->body)))))),120)); ?>">
    <meta name="keywords" content="<?php $__currentLoopData = $post->first()->tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?><?php echo e($tag->name); ?>,<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="stylesheet" href="css/post.css">
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
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-9 col-lg-7 PageBody">
            <div class="bg-white post-more px-4 text-dark">
                <div class="post-stuff">
                <div class="row mt-4">
                    <div class="col-11 px-0 mx-0">
                        <h1 class="article-title h2 font-weight-bold pl-xl-3 text-center mt-4  px-0 mx-0">
                                <?php echo e($article->title); ?>

                            </h1>
                    </div>
                    <div class="col-1 px-0 mx-0">
                        <div class="  d-inline-block ">
                            <div class="vote-system mt-4 ml-3" <?php if(auth()->guest()): ?>onclick="window.location.href='/login '"<?php endif; ?>>
                                <span class="upvote <?php if(auth()->user()&&App\Vote::where('user_id','=',auth()->user()->id)->where('article_id','=',$article->id)->where('points','=','1')->first()!=null): ?><?php echo e('active'); ?><?php endif; ?>"></span>
                                <p class="votes"><?php echo e($article->points); ?></p>
                                <span class="downvote <?php if(auth()->user()&&App\Vote::where('user_id','=',auth()->user()->id)->where('article_id','=',$article->id)->where('points','=','-1')->first()!=null): ?><?php echo e('active'); ?> <?php endif; ?>"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="images/<?php echo e($article->img); ?>" class="mt-2 pb-3 post-img">
               <?php echo $article->body; ?>


                <hr class="px-4">
                <div class="maker d-block text-center align-content-center">
                    <h2 class="d-inline-block p-0 m-0" style="position: relative; top: -10px; left: 3px">Author </h2>
                    <br>
                    <img  src="<?php echo e($article->user->avatar); ?>" class=" acc-icon d-inline my-0 mb-0 "  height="60px" style="cursor: pointer;" onclick="window.location.href='user?name=<?php echo e($article->user->name); ?>'">
                    <br>                <div style="display: inline-block!important;" class="mt-0 ml-auto">
                        <p class="d-inline text-muted " style="cursor: pointer;" onclick="window.location.href='user?name=<?php echo e($article->user->name); ?>'"><?php echo e($article->user->name); ?></p><br>
                        <p class="small d-inline text-muted"><?php echo e($article->user->about); ?></p>
                    </div>
                </div>
                <hr class="px-4">
            </div>
                <?php if(auth()->user()): ?>
                <form class="comment-form">
                    <textarea  cols="30" rows="5" placeholder="Comment" name="comment" id="comment" class="form-control"></textarea>
                    <input type="submit" class="form-control btn btn-primary" value="Comment" >
                </form>
                <?php endif; ?>

                <br>
<?php echo $__env->make('layouts.comments', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->stopSection(); ?>

    <?php $__env->startSection('sections'); ?>
        <?php echo $__env->make('layouts.sections', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php $__env->stopSection(); ?>
<?php $__env->startSection('grid-footer'); ?>
            </div>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
    <script src="js/post.js"></script>

    <script>
        $(".upvote").on("click",function(){if($(this).hasClass("active")){$(this).removeClass("active");var t=$(".votes").html();t=parseInt(t)-1,$(".votes").html(t)}else if($(".downvote").hasClass("active")){$(this).addClass("active"),$(".downvote").removeClass("active");t=$(".votes").html();t=parseInt(t)+2,$(".votes").html(t)}else{$(this).addClass("active");t=$(".votes").html();t=parseInt(t)+1,$(".votes").html(t)}$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({url:"<?php echo e(url('/'.str_replace('?','',$article->title).'/vote' )); ?>",type:"POST",data:{points:1}})}),$(".downvote").on("click",function(){if($(this).hasClass("active")){$(this).removeClass("active");var t=$(".votes").html();t=parseInt(t)+1,$(".votes").html(t)}else if($(".upvote").hasClass("active")){$(this).addClass("active"),$(".upvote").removeClass("active");t=$(".votes").html();t=parseInt(t)-2,$(".votes").html(t)}else{$(this).addClass("active");t=$(".votes").html();t=parseInt(t)-1,$(".votes").html(t)}$.ajaxSetup({headers:{"X-CSRF-TOKEN":$('meta[name="csrf-token"]').attr("content")}}),$.ajax({url:"<?php echo e(url('/'.str_replace('?','',$article->title).'/vote' )); ?>",type:"POST",data:{points:0}})});
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>