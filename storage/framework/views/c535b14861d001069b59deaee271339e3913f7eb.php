<?php $__env->startSection('header'); ?>
    <title>Write article - BlankUser</title>
    <meta name="description" content="Online magazine who every one can read ! , Start writing your article now ">
    <meta name="keywords" content="article,magazine,scientific,blog,author,writer">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_editor.pkgd.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.jsdelivr.net/npm/froala-editor@2.9.0/css/froala_style.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <div class="PageBody">
    <form action="add-article" method="post" enctype="multipart/form-data">
        <?php echo csrf_field(); ?>
        <div class="mt-5 title-form">
        <div class="container pt-3">
            <label for="title" class="mt-5 d-inline ">Blankuser . <span>Post</span></label>
            <div class="form-group">
                <div class="row no-gutters ">
                    <div class="col-9">
            <input type="text" class="form-control form-control d-inline-block " name="title" id="title" required maxlength="120" placeholder="Title" >
                    </div>
                <div class="col-3 "><button type="submit" class="btn btn-success ml-1 " value="" disabled id="formsubmit">Publish</button></div>
                </div>
        </div>
    </div>
        <?php echo $__env->make('layouts.error', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="container">
        <div class="row no-gutters p-0 m-0">
            <div class="col-12 col-md-9 ">

                    <div class="form-group">
                        <label for="body">Body</label>
                        <textarea name="body" class=" w-100 h-100" id="body" minlength="300"></textarea>
                    </div>
            </div>
            <div class=" col-12 col-md-3 p-0 m-0 pl-2">
                <div class="form-group pl-2 mt-md-4">
                    <input type="file" name="image" id="image" class="form-control-file" required>
                    <label for="image" class="form-text text-muted">Image Upload</label>
                </div>
                <div class="card mb-2">
                    <div class="card-header">Tags</div>
                    <div class="card-body p-3">
                        <div class="form-group">
                            <input  id="tags" name="tags"  class="form-control mb-2" required maxlength="30">
                            <label class="small text-muted" for="tags">separate by Comma </label>
                        <div id="span-carrier">
                        <span class="small text-muted error-reporter float-right text-center">Max 30 character (including spaces)</span>
                        </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <label for="category" class="card-header">Category</label>
                    <div class="card-body">
                        <div class="form-group">
                            <select name="category" class="form-control" id="category">
                                <option value="Science">Science</option>
                                <option value="Technology" selected>Technology</option>
                                <option value="Engineer">Engineer</option>
                                <option value="Mathematics">Mathematics</option>
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



            
                
                    
                
            
            
                
                
                
                    
                    
                    
                    
                    
                
                
                
                
                    
                    
                    
                    
                        
                    
                    

                    
                
            














    </script>
    <script>
$('.fr-counter').html(-140);
setInterval(function () {
    $('#formsubmit').attr('disabled','disabled');

    if(($('#title').val().length > 1)&&($('#tags').val().length >0)&&($('.fr-counter').html() >299&&($('#image').val()!==""))){
    if($('#formsubmit').attr('disabled')==="disabled"){
        $('#formsubmit').removeAttr('disabled')
    }
    else{
            $('#formsubmit').attr('disabled','disabled')

    }
}
    },3000);
        window.onload = function(){
            $('a[style^="padding: 5px 10px;color: #FFF;text-decoration: none;background: #EF5350;display: block;font-size: 15px;"]').hide();
        }
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>