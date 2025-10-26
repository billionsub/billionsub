<!-- Web Application Manifest -->
<link rel="manifest" href="<?php echo e(route('laravelpwa.manifest')); ?>">
<!-- Chrome for Android theme color -->
<meta name="theme-color" content="<?php echo e($config['theme_color']); ?>">

<!-- Add to homescreen for Chrome on Android -->
<meta name="mobile-web-app-capable" content="<?php echo e($config['display'] == 'standalone' ? 'yes' : 'no'); ?>">
<meta name="application-name" content="<?php echo e($config['short_name']); ?>">
<meta name="apple-touch-fullscreen" content="yes" />

<!-- Add to homescreen for Safari on iOS -->
<meta name="apple-mobile-web-app-capable" content="<?php echo e($config['display'] == 'standalone' ? 'yes' : 'no'); ?>">
<meta name="apple-mobile-web-app-status-bar-style" content="<?php echo e($config['status_bar']); ?>">
<meta name="apple-mobile-web-app-title" content="<?php echo e($config['short_name']); ?>">
<link rel="apple-touch-icon" href="<?php echo e(data_get(end($config['icons']), 'src')); ?>">



<link href="<?php echo e($config['splash']['640x1136']); ?>" media="(device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['750x1334']); ?>" media="(device-width: 375px) and (device-height: 667px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1242x2208']); ?>" media="(device-width: 621px) and (device-height: 1104px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1125x2436']); ?>" media="(device-width: 375px) and (device-height: 812px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['828x1792']); ?>" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1242x2688']); ?>" media="(device-width: 414px) and (device-height: 896px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />

<link href="<?php echo e($config['splash']['1170x2532']); ?>" media="(device-width: 390px) and (device-height: 844px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1284x2778']); ?>" media="(device-width: 428px) and (device-height: 926px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />

<link href="<?php echo e($config['splash']['1179x2556']); ?>" media="(device-width: 393px) and (device-height: 852px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1290x2796']); ?>" media="(device-width: 430px) and (device-height: 932px) and (-webkit-device-pixel-ratio: 3)" rel="apple-touch-startup-image" />

<link href="<?php echo e($config['splash']['1536x2048']); ?>" media="(device-width: 768px) and (device-height: 1024px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1668x2224']); ?>" media="(device-width: 834px) and (device-height: 1112px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['1668x2388']); ?>" media="(device-width: 834px) and (device-height: 1194px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />
<link href="<?php echo e($config['splash']['2048x2732']); ?>" media="(device-width: 1024px) and (device-height: 1366px) and (-webkit-device-pixel-ratio: 2)" rel="apple-touch-startup-image" />


<!-- Tile for Win8 -->
<meta name="msapplication-TileColor" content="<?php echo e($config['background_color']); ?>">
<meta name="msapplication-TileImage" content="<?php echo e(data_get(end($config['icons']), 'src')); ?>">
<?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/vendor/laravelpwa/meta.blade.php ENDPATH**/ ?>