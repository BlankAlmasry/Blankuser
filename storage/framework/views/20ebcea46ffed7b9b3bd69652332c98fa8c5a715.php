<!DOCTYPE html><html lang="en"><head> <?php echo $__env->yieldContent('header'); ?><meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0"><meta http-equiv="X-UA-Compatible" content="ie=edge"><link rel="stylesheet" href="/css/style.css"><!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-136812573-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-136812573-1');
    </script>
    <!-- Fathom - simple website analytics - https://github.com/usefathom/fathom -->
    <script>
        (function(f, a, t, h, o, m){
            a[h]=a[h]||function(){
                (a[h].q=a[h].q||[]).push(arguments)
            };
            o=f.createElement('script'),
                m=f.getElementsByTagName('script')[0];
            o.async=1; o.src=t; o.id='fathom-script';
            m.parentNode.insertBefore(o,m)
        })(document, window, '//blankuser.com/tracker.js', 'fathom');
        fathom('set', 'siteId', 'SPOWL');
        fathom('trackPageview');
    </script>
    <meta property="image" content="\img\webthumbnail.jpg" />
    <meta name="robots" content="index,follow" />
    <!-- / Fathom -->
    <script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
    <script>
        (adsbygoogle = window.adsbygoogle || []).push({
            google_ad_client: "ca-pub-1307243046207061",
            enable_page_level_ads: true
        });
    </script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"><link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous"><link rel="icon" href="\img\blanksquareoutline.jpg"> <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script></body> <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script> </head><body> <?php echo $__env->yieldContent('grid-header'); ?> <?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?> <?php echo $__env->yieldContent('sidebar'); ?> <?php echo $__env->yieldContent('body'); ?> <?php echo $__env->yieldContent('sections'); ?> <?php echo $__env->yieldContent('grid-footer'); ?> <footer class=" text-white text-center h5 m-0 p-0 mt-5 bg-dark" style="background-color: black; height: 3rem;"><p class=" pt-2 pb-0 mb-0" style="color: #692f37 "> <a href="about">About</a> | <a href="\">Home</a> | <a href="contact">Contact</a></p> </footer><footer class="" style="background-color: black;"><div class="footer-copyright text-center py-3 " style="color: #692f37 ">?? 2019 Copyright: <a href="home"> BlankUser.com</a></div></footer> <script src="\js/index.js"></script> <?php echo $__env->yieldContent('footer'); ?></body></html>