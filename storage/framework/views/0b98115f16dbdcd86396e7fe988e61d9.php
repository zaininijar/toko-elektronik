<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <title><?php echo e($title); ?></title>
    <meta name="description" content="<?php echo e($title); ?>">
    <meta name="keywords" content="Best site to find electronics product.">

    <!-- tailwind css -->
    <script defer src="<?php echo e(mix('js/app.js')); ?>"></script>
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/tailwind.output.css')); ?>" />
    <!-- alpinejs -->
    <script defer src="<?php echo e(asset('js/init-alpine.js')); ?>" data-turbolinks-track="true"></script>
    <!-- izi toast -->
    <link href="<?php echo e(asset('plugin/izi-toast/css/iziToast.css')); ?>" rel="stylesheet" data-turbolinks-track="true" />
    <script defer src="<?php echo e(asset('plugin/izi-toast/js/iziToast.js')); ?>" data-turbolinks-track="true"></script>
    <!-- jQuery -->
    <script defer src="<?php echo e(asset('plugin/jquery/jquery.js')); ?>" data-turbolinks-track="true"></script>
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:200,400&display=swap" rel="stylesheet">

    <style>
    .work-sans {
        font-family: 'Work Sans', sans-serif;
    }

    #menu-toggle:checked+#menu {
        display: block;
    }

    .hover\:grow {
        transition: all 0.3s;
        transform: scale(1);
        filter: grayscale(2)
    }

    .hover\:grow:hover {
        transform: scale(1.02);
        filter: grayscale(0)
    }

    .carousel-open:checked+.carousel-item {
        position: static;
        opacity: 100;
    }

    .carousel-item {
        -webkit-transition: opacity 0.6s ease-out;
        transition: opacity 0.6s ease-out;
    }

    #carousel-1:checked~.control-1,
    #carousel-2:checked~.control-2,
    #carousel-3:checked~.control-3,
    #carousel-4:checked~.control-4,
    #carousel-5:checked~.control-5,
    #carousel-6:checked~.control-6 {
        display: block;
    }

    .carousel-indicators {
        list-style: none;
        margin: 0;
        padding: 0;
        position: absolute;
        bottom: 2%;
        left: 0;
        right: 0;
        text-align: center;
        z-index: 10;
    }

    #carousel-1:checked~.control-1~.carousel-indicators li:nth-child(1) .carousel-bullet,
    #carousel-2:checked~.control-2~.carousel-indicators li:nth-child(2) .carousel-bullet,
    #carousel-3:checked~.control-3~.carousel-indicators li:nth-child(3) .carousel-bullet,
    #carousel-4:checked~.control-4~.carousel-indicators li:nth-child(4) .carousel-bullet,
    #carousel-5:checked~.control-5~.carousel-indicators li:nth-child(5) .carousel-bullet,
    #carousel-6:checked~.control-6~.carousel-indicators li:nth-child(6) .carousel-bullet {
        color: #000;
        /*Set to match the Tailwind colour you want the active one to be */
    }
    </style>

</head>

<body class="bg-white text-gray-600 work-sans leading-normal text-base tracking-normal">
    <?php echo $__env->make('layouts._customer-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <main class="pt-24">
        <?php echo e($slot); ?>

    </main>

    <?php echo $__env->make('layouts._customer-footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('vendor.lara-izitoast.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>
</body>

</html>
<?php /**PATH /Users/macbook/Documents/Development/toko-elektronik/resources/views/layouts/customer.blade.php ENDPATH**/ ?>