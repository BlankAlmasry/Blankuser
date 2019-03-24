<?php $__env->startSection('grid-header'); ?>
<div class="Web-body mt-4 pt-3">
    <div class="container">
        <div class="row">
            <?php $__env->stopSection(); ?>
             <?php $__env->startSection('sidebar'); ?>

            <?php echo $__env->make('layouts.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>

             <?php $__env->stopSection(); ?>
            <?php $__env->startSection('body'); ?>

                <!--Content-->
                  <div class="col-12 col-md-9 col-lg-7  articles-section p-0 " style="overflow: hidden">
                    <div class="container">
                        <div class="row">
                            <div class="w-60">
                                <div class="filter d-inline-block pb-0 px-3">
                                    <div class="mt-3 ml-3" style="width:15px;display:inline-block;color: #11111199;"><svg viewBox="0 0 24 24" style="color: #11111199;"><g>
                                                <path d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M3 17v2h6v-2H3zM3 5v2h10V5H3zm10 16v-2h8v-2h-8v-2h-2v6h2zM7 9v2H3v2h4v2h2V9H7zm14 4v-2H11v2h10zm-6-4h2V7h4V5h-4V3h-2v6z" fill="#11111199"></path>
                                            </g></svg>
                                    </div>
                                    <span style="font-size: 15px;color: #11111199">FILTER</span>
                                </div>
                            </div>


                        <?php if(auth()->user()): ?>

                            <button class="btn btn-secondary mt-4 mr-3 ml-auto float-right" onclick = "window.location.href='add-article'">Add post</button>
                            <?php endif; ?>
                            <?php echo $__env->make('layouts.filter', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            <div class="articles">
                             <?php $__currentLoopData = $articles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $article): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="post bg-white mt-3 ml-3">
                                <div class="col-12 p-0 bg-white">
                                    <div class="col-12 col-md-12 col-lg-12 col-xl-7 float-left p-0 text-lg-center text-xl-left " style="background-image:url('http://127.0.0.1:8000/images/<?php echo e($article->img); ?>');height: 250px;background-size: auto 100% ,contain;background-repeat: no-repeat;background-position: center; ">
                                    </div>
                                    <div class="col-12 col-md-12 col-lg-12 col-xl-5 float-left  pl-lg-2 m-0  text-lg-center text-xl-left ">

                                        <h1 class="h2 text-dark "><?php echo e($article->title); ?></h1>
                                        <i class="fa fa-user" style="opacity: 0.8"></i><p class="author d-inline-block text-dark muted"><?php echo e($article->User->name); ?></p>
                                        <p class=" subtitle"><?php echo e(str_limit(trim(preg_replace('/ +/', ' ', preg_replace('/[^A-Za-z0-9]/', ' ',urldecode(html_entity_decode(strip_tags($article->body)))))),120)); ?> </p>
                                        <a class="  btn btn-primary float-right mt-xl-2" href="<?php echo e(str_replace(' ','-',$article->title)); ?>">Read more</a>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </div>
                            <?php if($articles->count() >10): ?>
                            <?php echo e($articles->links()); ?>

                            <?php endif; ?>

                        </div>
                        <?php if($articles->count() ==0): ?>
                            <h3 class="text-center  h-100 font-weight-bold mt-3">no articles found</h3>
                        <?php endif; ?>
                    </div>
                </div>

                <!--Content-->


            <?php $__env->stopSection(); ?>
                 <?php $__env->startSection('sections'); ?>
            <?php echo $__env->make('layouts.sections', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                 <?php $__env->stopSection(); ?>
            <?php $__env->startSection('grid-footer'); ?>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>