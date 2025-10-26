<?php $__env->startSection('page_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_url', route('home')); ?>
<?php $__env->startSection('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan')); ?>
<?php $__env->startSection('share_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_type', 'article'); ?>
<?php $__env->startSection('share_img', GenericHelper::getOGMetaImage()); ?>

<?php $__env->startSection('scripts'); ?>
    <script type="application/ld+json">
  {
    "@context": "http://schema.org",
    "@type": "Organization",
    "name": "<?php echo e(getSetting('site.name')); ?>",
    "url": "<?php echo e(getSetting('site.app_url')); ?>",
    "address": ""
  }
</script>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('styles'); ?>
    <?php echo Minify::stylesheet([
            '/css/pages/home.css',
            '/css/pages/search.css',
         ])->withFullUrl(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="home-header min-vh-75 relative pt-2" >
        <div class="container h-100">
            <div class="row d-flex flex-row align-items-center h-100">
                <div class="col-12 col-md-6 mt-4 mt-md-0">
                    <h1 class="font-weight-bold text-gradient bg-gradient-primary"><?php echo e(__('Make more money')); ?>,</h1>
                    <h1 class="font-weight-bold text-gradient bg-gradient-primary"><?php echo e(__('with your content')); ?>.</h1>
                    <p class="font-weight-bold mt-3">🚀 <?php echo e(__("Start your own premium creators platform with our ready to go solution.")); ?></p>
                    <div class="mt-4">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-grow bg-gradient-primary  btn-round mb-0 me-1 mt-2 mt-md-0 "><?php echo e(__('Try for free')); ?></a>
                        <a href="<?php echo e(route('search.get')); ?>" class="btn btn-grow btn-link  btn-round mb-0 me-1 mt-2 mt-md-0 ">
                            <?php echo $__env->make('elements.icon',['icon'=>'search-outline','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo e(__('Explore')); ?></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 d-none d-md-block p-5">
                    <img src="<?php echo e(asset('/img/home-header.svg')); ?>" alt="<?php echo e(__('Make more money')); ?>"/>
                </div>
            </div>
        </div>
    </div>

    <div class="my-5 py-5 home-bg-section">
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                     <!--   <img src="<?php echo e(asset('/img/home-scene-1.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Premium & Private content')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold"><?php echo e(__('Premium & Private content')); ?></h5>
                            <span><?php echo e(__('Enjoy high quality content, made for you and the ones like you.')); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                    <!--    <img src="<?php echo e(asset('/img/home-scene-2.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Private chat & Tips')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold"><?php echo e(__('Private chat & Tips')); ?></h5>
                            <span><?php echo e(__('Enjoy private conversations and get tipped for your content.')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-4 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                    <!--    <img src="<?php echo e(asset('/img/home-scene-3.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Secured assets & Privacy focus')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold"><?php echo e(__('Secured assets & Privacy focus')); ?></h5>
                            <span><?php echo e(__("Your content get's safely upload in the cloud and full controll to your account.")); ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="mt-5 pb-3 pt-5">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 d-none d-md-flex justify-content-center">
                    <img src="<?php echo e(asset('/img/home-creators.svg')); ?>" class="home-mid-img" alt="<?php echo e(__('Make more money')); ?>"> 
                </div>
                <div class="col-12 col-md-6">
                    <div class="w-100 h-100 d-flex justify-content-center align-items-center">
                        <div class="pl-4 pl-md-5">
                            <h2 class="font-weight-bold m-0"><?php echo e(__('Make more money')); ?>,</h2>
                            <h2 class="font-weight-bold m-0"><?php echo e(__('with your content')); ?>.</h2>
                            <div class="my-4 col-9 px-0">
                                <p><?php echo e(__("become a creator long")); ?></p>
                            </div>
                            <div>
                                <a href="<?php echo e(Auth::check() ? route('my.settings',['type'=>'verify']) : route('login')); ?>" class="btn bg-gradient-primary btn-grow btn-round mb-0 me-1 mt-2 mt-md-0 p-3"><?php echo e(__('Become a creator')); ?></a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


  <!--  <div class="mt-5 pb-3 pt-5 home-bg-section">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold"><?php echo e(__('Main features')); ?></h2>
                <p><?php echo e(__("Here's a glimpse at the main features our script offers")); ?></p>
            </div>
            <div class="row">
                <div class="col-12 col-md-4 mb-5 btn-grow px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row-reverse">
                        <?php echo $__env->make('elements.icon',['icon'=>'phone-portrait-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("Mobile Ready")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Cross compatible & mobile first design.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row-reverse">
                        <?php echo $__env->make('elements.icon',['icon'=>'cog-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("Advanced Admin panel")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Easy to use, fully featured admin panel.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row-reverse">
                        <?php echo $__env->make('elements.icon',['icon'=>'people-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("User subscriptions")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Easy to use and reliable subscriptions system.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row-reverse">
                        <?php echo $__env->make('elements.icon',['icon'=>'list-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("User feed & Locked posts")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Advanced feed system, pay to unlock posts.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow text-left px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row">
                        <?php echo $__env->make('elements.icon',['icon'=>'moon-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("Light & Dark themes")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Eazy to customize themes, dark & light mode.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow text-left px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row">
                        <?php echo $__env->make('elements.icon',['icon'=>'language-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("RTL & Locales")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Fully localize your site with languages & RTL.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow text-left px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row">
                        <?php echo $__env->make('elements.icon',['icon'=>'chatbubbles-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("Live chat & Notifications")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Live user messenger & User notifications.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow text-left px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row">
                        <?php echo $__env->make('elements.icon',['icon'=>'bookmarks-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("Post Bookmarks & User lists")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Stay updated with list users and bookmarks.")); ?></p>
                </div>

                <div class="col-12 col-md-4 mb-5 btn-grow text-left px-4 py-3 rounded my-2 w-100">
                    <div class="flex-row">
                        <?php echo $__env->make('elements.icon',['icon'=>'flag-outline','variant'=>'large','centered'=>false,'classes'=>''], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    </div>
                    <h5 class="text-bold"><?php echo e(__("Content flagging and User reports")); ?></h5>
                    <p class="mb-0"><?php echo e(__("Stay safe with user and content reporting.")); ?></p>
                </div>

            </div>
        </div>
    </div> -->

  <!--  <div class="my-5 py-2">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="font-weight-bold"><?php echo e(__("Technologies used")); ?></h2>
                <p><?php echo e(__("Built on secure, scalable and reliable techs")); ?></p>
            </div>
            <div class="d-flex align-items-center justify-content-center">
                <div class="d-flex justify-content-center align-items-center row col">
                    <img src="<?php echo e(asset('/img/logos/laravel.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("laravel"))); ?>" alt="<?php echo e(__("laravel")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/bootstrap.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("bootstrap"))); ?>" alt="<?php echo e(__("bootstrap")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/jquery.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("jquery"))); ?>" alt="<?php echo e(__("jquery")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/aws.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("aws"))); ?>" alt="<?php echo e(__("aws")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/pusher.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("pusher"))); ?>" alt="<?php echo e(__("pusher")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/stripe.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("stripe"))); ?>" alt="<?php echo e(__("stripe")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/paypal.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("paypal"))); ?>" alt="<?php echo e(__("paypal")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/coinbase.svg')); ?>" class="mx-3 mb-2 grayscale coinbasae-logo" title="<?php echo e(ucfirst(__("coinbase"))); ?>" alt="<?php echo e(__("coinbase")); ?>"/>
                    <img src="<?php echo e(asset('/img/logos/wasabi.svg')); ?>" class="mx-3 mb-2 grayscale" title="<?php echo e(ucfirst(__("wasabi"))); ?>" alt="<?php echo e(__("wasabi")); ?>"/>
                </div>
            </div>
        </div>
    </div> -->

  <!--  <div class="my-5 py-5 home-bg-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold"><?php echo e(__("Featured creators")); ?></h2>
                <p><?php echo e(__("Here's list of currated content creators to start exploring now!")); ?></p>
            </div>

            <div class="creators-wrapper">
                <div class="row px-3">
                    <?php if(count($featuredMembers)): ?>
                        <?php $__currentLoopData = $featuredMembers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="col-12 col-md-4 p-1">
                                <div class="p-2">
                                    <?php echo $__env->make('elements.vertical-member-card',['profile' => $member], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div> -->

    <div class="py-4 my-4 white-section ">
        <div class="container">
            <div class="text-center">
                <h3 class="font-weight-bold"><?php echo e(__("Got questions?")); ?></h3>
                <p><?php echo e(__("Don't hesitate to send us a message at")); ?> - <a href="<?php echo e(route('contact')); ?>"><?php echo e(__("Contact")); ?></a> </p>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/home.blade.php ENDPATH**/ ?>