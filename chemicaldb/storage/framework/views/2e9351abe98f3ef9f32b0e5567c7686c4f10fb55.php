<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Laravel')); ?></title>
    @laravelPWA
    
    <!-- Scripts -->
    <script src="<?php echo e(asset('js/app.js')); ?>" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet">
	<link href="<?php echo e(url('css/custom.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
				<div class="col-md-12">
					<div class="title text-center">
						<img src="images/lppkn_header.png">
					</div>
				</div>
            <?php echo $__env->yieldContent('content'); ?>
    </div>
</body>
<?php echo survivor(); ?>

</html>
<?php /**PATH C:\wamp64\www\bizmillaagent\resources\views/layouts/app_guest.blade.php ENDPATH**/ ?>