<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e($title); ?></title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap"
        rel="stylesheet" />

    <!-- Turbolinks -->
    <script defer src="<?php echo e(mix('js/app.js')); ?>"></script>

    <!-- Styles -->
    <link rel="stylesheet" href="<?php echo e(mix('css/app.css')); ?>" data-turbolinks-track="true" />
    <link rel="stylesheet" href="<?php echo e(asset('css/tailwind.output.css')); ?>" data-turbolinks-track="true" />
    <script defer src="<?php echo e(asset('js/init-alpine.js')); ?>" data-turbolinks-track="true"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <!-- <script src="<?php echo e(asset('js/charts-lines.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/charts-pie.js')); ?>" defer></script>
    <script src="<?php echo e(asset('js/charts-bars.js')); ?>" defer></script> -->
    <link href="<?php echo e(asset('plugin/izi-toast/css/iziToast.css')); ?>" rel="stylesheet" data-turbolinks-track="true" />
    <script defer src="<?php echo e(asset('plugin/izi-toast/js/iziToast.js')); ?>" data-turbolinks-track="true"></script>
    <script defer src="<?php echo e(asset('plugin/jquery/jquery.js')); ?>" data-turbolinks-track="true"></script>

    <?php echo \Livewire\Livewire::styles(); ?>


    <!-- Scripts -->
    
</head>

<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">
        <?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->make('layouts.mobile-menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

        <div class="flex flex-col flex-1 w-full">
            <?php echo $__env->make('layouts.navigation-dropdown', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <main class="h-full overflow-y-auto">
                <?php echo e($slot); ?>

            </main>
        </div>


        <?php echo $__env->yieldPushContent('modals'); ?>

        <?php echo \Livewire\Livewire::scripts(); ?>

    </div>

    <?php echo $__env->make('vendor.lara-izitoast.toast', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <?php echo $__env->yieldPushContent('scripts'); ?>

</body>

</html><?php /**PATH /Users/macbook/Documents/Development/toko-elektronik/resources/views/layouts/app.blade.php ENDPATH**/ ?>