<?php if($flash = session('message')): ?>
    <div aria-live="polite" aria-atomic="true" style=" min-height: 110px; position: absolute; right:80px;bottom: 20px ;z-index: 10;" >
        <div class="toast" role="alert" aria-live="polite" aria-atomic="true" data-delay="5000" style="min-width: 300px;min-height: 90px" >
            <div class="toast-header">
                <img src="/img/blanksquare.jpg"  width="24" height="24" class="rounded mr-2" alt="">
                <strong class="mr-auto">BlankUser</strong>
                <button type="button" class="ml-2 mb-1 close" data-dismiss="toast" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="toast-body">
                <?php echo e($flash); ?>

            </div>
        </div>
    </div>
    <script>
        $('.toast').toast('show')
    </script>
<?php endif; ?>
