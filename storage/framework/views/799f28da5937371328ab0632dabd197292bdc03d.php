<?php $__env->startSection('header'); ?>
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="PageBody">
    <form action="\edit-article\<?php echo e($article->id); ?>" method="post" enctype="multipart/form-data "  >
        <?php echo csrf_field(); ?>
        <div class="mt-5 title-form">
            <div class="container pt-3">
                <label for="title" class="mt-5 d-inline ">Blankuser . <span>Post</span></label>
                <div class="form-group">

                    <input type="text" class="form-control form-control d-inline-block w-75" name="title" id="title" value="<?php echo e($article->title); ?>" required maxlength="120" placeholder="Title" >
                    <button type="submit" class="btn btn-success" value="" id="formsubmit">Update</button>
                </div>
            </div>
            <?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="container">
                <div class="row no-gutters p-0 m-0">
                    <div class="col-12 col-md-9 ">

                        <div class="form-group">
                            <label for="body">Body</label>
                            <textarea name="body" class=" w-100 h-100" id="body" required ="300"></textarea>
                        </div>
                    </div>
                    <div class=" col-12 col-md-3 p-0 m-0 pl-2">
                        <div class="form-group pl-2 mt-md-4">
                            <input type="file" name="image" id="image" class="form-control-file">
                            <a href="/images/<?php echo e($article->img); ?>" class="form-text text-primary">Image :<?php echo e(substr($article->img,10)); ?></a>
                        </div>
                        <div class="card mb-2">
                            <div class="card-header">Tags</div>
                            <div class="card-body p-3">
                                <div class="form-group">
                                    <label class="small text-muted" for="tags">separate by Comma </label>
                                    <input type="text" id="tags" class="form-control form-control-sm" name="tags" value="<?php $__currentLoopData = $article->tags->pluck('name'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php echo e($tag.','); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>">
                                    <div id="span-carrier">
                                        <span class="small text-muted error-reporter float-right text-center">Max 30 character</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <label for="category" class="card-header">Category</label>
                            <div class="card-body">
                                <div class="form-group">
                                    <select name="category" class="form-control" id="category">
                                        <option value="Science" <?php if($article->category->name =='science'): ?><?php echo e('selected'); ?><?php endif; ?> class="form-control">Science</option>
                                        <option value="Technology" <?php if($article->category->name =='Technology'): ?><?php echo e('selected'); ?><?php endif; ?>  class="form-control">Technology</option>
                                        <option value="Engineer" <?php if($article->category->name =='Engineer'): ?><?php echo e('selected'); ?><?php endif; ?>  class="form-control">Engineer</option>
                                        <option value="Mathematics" <?php if($article->category->name =='Mathematics'): ?><?php echo e('selected'); ?><?php endif; ?>  class="form-control">Mathematics</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('footer'); ?>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/js/froala_editor.pkgd.min.js"></script>
    <script>

        $(function() {

            $('textarea').froalaEditor({
                imageUploadParam: 'floara',
                imageUploadMethod: 'post',
                // Set the image upload URL.
                imageUploadURL: "<?php echo e(url('/add-article/floara')); ?>",
                imageUploadParams: {
                    froala: 'true',
                    _token: "<?php echo e(csrf_token()); ?>" // This passes the laravel token with the ajax request.
                }
            });
        });
        $(document).ready(function () {
            $('.fr-element p').remove();
            $('.fr-element').html('<?php echo $article->body; ?>');

        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>