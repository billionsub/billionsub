<meta charset="utf-8">


<?php if (! empty(trim($__env->yieldContent('page_title')))): ?>
    <title><?php echo $__env->yieldContent('page_title'); ?> - <?php echo e(getSetting('site.name')); ?> </title>
<?php else: ?>
    <title><?php echo e(getSetting('site.name')); ?> -  <?php echo e(getSetting('site.slogan')); ?></title>
<?php endif; ?>


<?php if (! empty(trim($__env->yieldContent('page_description')))): ?>
    <meta name="description" content="<?php echo $__env->yieldContent('page_description'); ?>">
<?php endif; ?>


<meta name="theme-color" content="#505050">
<meta name="color-scheme" content="dark light">


<meta property="og:url"           content="<?php echo $__env->yieldContent('share_url'); ?>" />
<meta property="og:type"          content="<?php echo $__env->yieldContent('share_type'); ?>" />
<meta property="og:title"         content="<?php echo $__env->yieldContent('share_title'); ?>" />
<meta property="og:description"   content="<?php echo $__env->yieldContent('share_description'); ?>" />
<meta property="og:image"         content="<?php echo $__env->yieldContent('share_img'); ?>" />


<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="<?php echo $__env->yieldContent('share_url'); ?>">
<meta name="twitter:creator" content="<?php echo $__env->yieldContent('author'); ?>">
<meta name="twitter:title" content="<?php echo $__env->yieldContent('share_title'); ?>">
<meta name="twitter:description" content="<?php echo $__env->yieldContent('share_description'); ?>">
<meta name="twitter:image" content="<?php echo $__env->yieldContent('share_img'); ?>">


<meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php echo $__env->yieldContent('meta'); ?>

<?php if(getSetting('site.allow_pwa_installs')): ?>
    <?php $config = (new \LaravelPWA\Services\ManifestService)->generate(); echo $__env->make( 'laravelpwa::meta' , ['config' => $config])->render(); ?>
    <script type="text/javascript">
        (function() {
            // Initialize the service worker
            if ('serviceWorker' in navigator) {
                navigator.serviceWorker.register('<?php echo e(rtrim(getSetting('site.app_url'),'/')); ?>'+'/serviceworker.js', {
                    scope: '.'
                }).then(function (registration) {
                    // Registration was successful
                    // eslint-disable-next-line no-console
                    console.log('Laravel PWA: ServiceWorker registration successful with scope: ', registration.scope);
                }, function (err) {
                    // registration failed :(
                    // eslint-disable-next-line no-console
                    console.log('Laravel PWA: ServiceWorker registration failed: ', err);
                });
            }
        })();
    </script>
<?php endif; ?>
<script src="<?php echo e(asset('libs/pusher-js/dist/web/pusher.min.js')); ?>"></script>


<link rel="shortcut icon" href="<?php echo e(getSetting('site.favicon')); ?>" type="image/x-icon">


<link href="https://fonts.googleapis.com/css?family=Roboto:400,300" rel="preload" as="style">
<link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,700italic,400,300,500,600,700" rel="preload" as="style">

<?php echo Minify::stylesheet(
        array_merge([
            '/libs/cookieconsent/build/cookieconsent.min.css',
            '/css/theme/bootstrap'.
            (Cookie::get('app_rtl') == null ? (getSetting('site.default_site_direction') == 'rtl' ? '.rtl' : '') : (Cookie::get('app_rtl') == 'rtl' ? '.rtl' : '')).
            (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme') == 'dark' ? '.dark' : '') : (Cookie::get('app_theme') == 'dark' ? '.dark' : '')).
            '.css',
            '/css/app.css',
         ],
         (isset($additionalCss) ? $additionalCss : [])
         ))->withFullUrl(); ?>



<?php echo $__env->yieldContent('styles'); ?>

<?php if(getSetting('custom-code-ads.custom_css')): ?>
    <style>
        <?php echo getSetting('custom-code-ads.custom_css'); ?>

    </style>
<?php endif; ?>
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/template/head.blade.php ENDPATH**/ ?>