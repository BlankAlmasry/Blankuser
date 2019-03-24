<?php $__env->startSection('header'); ?>
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
    <!--post .. read more -->
        <?php $__currentLoopData = $post; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-12 col-md-9 col-lg-7 ">
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
                    <img  src="<?php echo e($article->user->avatar); ?>" class=" acc-icon d-inline my-0 mb-0 "  height="60px">
                    <br>                <div style="display: inline-block!important;" class="mt-0 ml-auto">
                        <p class="d-inline text-muted "><?php echo e($article->user->name); ?></p><br>
                        <p class="small d-inline text-muted" ><?php echo e($article->user->about); ?></p>
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
                <h2 class="text-muted text-center">Comments</h2>
                <?php $__currentLoopData = $article->comments->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="comments">
                    <div class="media mt-3">
                    <img class="align-self-start mr-3" src="<?php echo e($comment->user->avatar); ?>" width="64" alt="Generic placeholder image">
                    <div class="media-body">
                        <h5 class="mt-0"><?php echo e($comment->user->name); ?></h5>
                        <p><?php echo e($comment->comment); ?> &nbsp; <span class="text-primary" style="cursor:pointer;">  <i class="fa fa-reply"></i>Reply</span></p>
                        <?php if(auth()->user()): ?>
                        <form class="reply-from">
                            <?php echo csrf_field(); ?>
                            <input  type="hidden" value="<?php echo e($comment->id); ?>" name="cmd" id="cmd">
                            <input type="text" id="reply" name="reply"  class="mb-3 form-control">
                        </form>
                        <?php endif; ?>
                        <div class="replies"></div>
                        <?php $__currentLoopData = $comment->replies->reverse(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reply): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                              <div class="media reply-media">
                            <img class="align-self-start mr-3" src="<?php echo e($reply->user->avatar); ?>" width="32" alt="Generic placeholder image">
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo e($reply->user->name); ?></h5>
                                <p><?php echo e($reply->reply); ?></p>
                            </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <!--post .. read more -->
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
        $('.upvote').on('click',function(){
            if ($(this).hasClass('active')){
                $(this).removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) -1 ;
                $('.votes').html(votes);
            }else if($('.downvote').hasClass('active')) {
                $(this).addClass('active');
                $('.downvote').removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) +2 ;
                $('.votes').html(votes);
            }
            else{
                $(this).addClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) +1;
                $('.votes').html(votes);
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/'.str_replace('?','',$article->title).'/vote' )); ?>",
                type: 'POST',
                data: {
                    points :"positive"
                }

        })});
        $('.downvote').on('click',function(){
            if ($(this).hasClass('active')){
                $(this).removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) +1 ;
                $('.votes').html(votes);
            }else if($('.upvote').hasClass('active')) {
                $(this).addClass('active');
                $('.upvote').removeClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) -2 ;
                $('.votes').html(votes);
            }
            else{
                $(this).addClass('active');
                var votes = $('.votes').html();
                votes = parseInt(votes) -1 ;
                $('.votes').html(votes);
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/'.str_replace('?','',$article->title).'/vote' )); ?>",
                type: 'POST',
                data: {
                    points:"negative"
                 }

            })});
        $('.comment-form').submit(function (e) {
            e.preventDefault();
            $('.comment-form input').addClass('disabled');
            $('.comment-form textarea').attr('disabled','disabled');
            var comment = $('#comment').val();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/'.str_replace('?','',$article->title).'/comment' )); ?>",
                type: 'POST',
                data: {
                    comment :$('#comment').val()
                }
        }).done(function (data) {
                <?php if(auth()->user()): ?>

                $('.comment-form textarea').removeAttr('disabled');
                $('.comment-form input').removeClass('disabled');
                var str = $('.article-title').html().trim() ;
                if (str.substring(str.length - 1) == '?'){
                   str = $('.article-title').html(str.substring(0,str.length - 1)) ;
                }
                $('.comments').prepend('                    <div class="media mt-3">\n' +
                    '                    <img class="align-self-start mr-3" src="<?php echo e(auth()->user()->avatar); ?>" width="64" alt="Generic placeholder image">\n' +
                    '                    <div class="media-body">\n' +
                    '                        <h5 class="mt-0"><?php echo e(auth()->user()->name); ?></h5>\n' +
                    '                        <p>'+$('#comment').val()+ ' &nbsp; <span class="text-primary" style="cursor:pointer;">  <i class="fa fa-reply"></i>Reply</span></p>\n' +
                    '                        <form method="post" action="'+ str +'/reply" class="reply-from">\n' +
                    '                            <?php echo csrf_field(); ?>\n' +
                    '                            <input  type="hidden" value="'+ data +'" name="cmd" id="cmd">\n' +
                    '                            <input type="text" id="reply" name="reply"  class="mb-3 form-control">\n' +
                    '                        </form>\n' +
                    '                    </div>\n' +
                    '                </div>\n');
                $('.comment-form textarea').val('');
            <?php endif; ?>
        });
        });
        $('.reply-from').submit(function (e) {
            e.preventDefault();
            var targeted = $(e.target);
            targeted.children('#reply').attr('disabled','disabled');
            console.log();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "<?php echo e(url('/'.str_replace('?','',$article->title).'/reply' )); ?>",
                type: 'POST',
                data: {
                    reply :targeted.children('#reply').val(),
                    cmd :targeted.children('#cmd').val(),
                }
            }).done(function () {
                <?php if(auth()->user()): ?>

                targeted.children('#reply').removeAttr('disabled');

                $(targeted.parent().children('.replies').prepend('                              <div class="media reply-media">\n' +
                    '                            <img class="align-self-start mr-3" src="<?php echo e(auth()->user()->avatar); ?>" width="32" alt="Generic placeholder image">\n' +
                    '                            <div class="media-body">\n' +
                    '                                <h5 class="mt-0"><?php echo e(auth()->user()->name); ?></h5>\n' +
                    '                                <p>'+targeted.children('#reply').val() +'</p>\n' +
                    '                            </div>\n' +
                    '                        </div>\n'));
                targeted.children('#reply').val('');
            <?php endif; ?>
            });
        })
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>