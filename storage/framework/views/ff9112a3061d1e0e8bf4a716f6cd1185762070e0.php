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

    <!-- Demo styles -->
    <style>
        html,
        body {
            position: relative;
            height: 100%;
        }

        body {
            background: #000;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            font-size: 14px;
            color: #fff;
            margin: 0;
            padding: 0;
        }

        .swiper {
            width: 100%;
            height: 100%;
            max-height: 100%; /* or whatever height you want */
        }

        .swiper-slide {
            text-align: center;
            font-size: 18px;
            background: #444;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .swiper-slide img {
            display: block;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
    </style>
    <div class="home-header min-vh-100 position-relative  overflow-hidden">
        <div class="container h-100">
            <div class="row d-flex align-items-center h-100 ">
                <!-- Left column (text) -->
                <div class="col-12 col-md-5 mt-6 mt-md-0 ">
                    <h2 class="font-weight-bold text-gradient text-center"><?php echo e(__('Create. Earn. Connect. All with Crypto')); ?>,</h2>
                    <p class="text-gradient bg-white text-center"><?php echo e(__('Billionsub empowers creators to earn globally and instantly in crypto – and gives fans a secure, borderless way to support the content they love.')); ?>.</p>
                    <div class="mt-4 text-center">
                        <a href="<?php echo e(route('login')); ?>" class="btn btn-grow bg-gradient-primary btn-round mb-0 me-1 mt-2 mt-md-0">
                            <?php echo e(__('Join as a Creator')); ?>

                        </a>
                        <a href="<?php echo e(route('search.get')); ?>" class="btn btn-grow btn-link btn-round mb-0 me-1 mt-2 mt-md-0">
                            <?php echo $__env->make('elements.icon',['icon'=>'search-outline','centered'=>false], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo e(__('Discover Creators')); ?>

                        </a>
                    </div>




                </div>

                <!-- Right column (image fills column entirely) -->
                <div class="col-5 col-md-6 d-none d-md-flex justify-content-center align-items-end h-100 p-0 mt-5">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide ">
                                <video autoplay loop muted playsinline class="h-100 w-100" style="object-fit: cover" src="<?php echo e(asset('/videos/slider1.mp4')); ?>"></video>
                            </div>
                            <div class="swiper-slide">
                                <video autoplay loop muted playsinline class="h-100 w-100" style="object-fit: cover" src="<?php echo e(asset('/videos/slider22.mp4')); ?>"></video>
                            </div>
                            <div class="swiper-slide">
                                <video autoplay loop muted playsinline class="h-100 w-100" style="object-fit: cover" src="<?php echo e(asset('/videos/slider3.mp4')); ?>"></video>
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="my-5 py-5 home-bg-section">
        <div class="row justify-content-md-center">
            <div class="col-xl-5 col-lg-6 col-md-8">
                <div class="section-title text-center title-ex1 ">
                    <h2 class="text-gradient">Why Billionsub?</h2>
                    <p>Why Thousands Are Switching to Billionsub:</p>
                </div>
            </div>
        </div>
        <div class="container my-5">
            <div class="row">
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                        <!--   <img src="<?php echo e(asset('/img/home-scene-1.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Premium & Private content')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient text-lg"><?php echo e(__('Global, Instant Payments')); ?></h5>
                            <span class="text-md"><?php echo e(__('Zero borders, 24/7 access')); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                     <!--   <img src="<?php echo e(asset('/img/home-scene-1.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Premium & Private content')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient text-lg"><?php echo e(__('Global, Instant Payments')); ?></h5>
                            <span class="text-md"><?php echo e(__('Zero borders, 24/7 access')); ?> </span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                    <!--    <img src="<?php echo e(asset('/img/home-scene-2.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Private chat & Tips')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient text-lg"><?php echo e(__('Total Privacy')); ?></h5>
                            <span class="text-md"><?php echo e(__('No credit card leaks. No ID needed')); ?></span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-3 mb-5 mb-md-0">
                    <div class="d-flex justify-content-center">
                    <!--    <img src="<?php echo e(asset('/img/home-scene-3.svg')); ?>" class="img-fluid home-box-img" alt="<?php echo e(__('Secured assets & Privacy focus')); ?>"> -->
                    </div>
                    <div class="d-flex justify-content-center mt-4">
                        <div class="col-12 col-md-10 text-center">
                            <h5 class="text-bold text-gradient"><?php echo e(__('Invite & Earn')); ?></h5>
                            <span class="text-md"><?php echo e(__("Our viral referral system pays you forever")); ?></span>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <section class="pricing-section">
        <div class="container">
            <!-- cards starts -->
            <div class="row">
                <div class="col-md-4">
                    <div class="card ">
                        <h2>Step 1</h2>
                        <p>Set Up Instantly</p>
                        <ul class="pricing-offers">
                            <li>Create your page in minutes. No ID. No bank. Just freedom.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card featured">
                        <h2>Step 2</h2>
                        <p>Accept Any Major Crypto</p>
                        <ul class="pricing-offers">
                            <li>From Bitcoin to stablecoins, get paid in what matters to you.</li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card ">
                        <h2>Step 3</h2>
                        <p>Get Paid Directly</p>
                        <ul class="pricing-offers">
                            <li>Your fans subscribe, tip, unlock content — and you earn without delay.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


   <div class="my-5 py-5 home-bg-section">
        <div class="container">
            <div class="text-center mb-4">
                <h2 class="font-weight-bold"><?php echo e(__("Featured creators")); ?></h2>
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
    </div>










    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            spaceBetween: 30,
            centeredSlides: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
            },
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/public_html/resources/views/pages/home.blade.php ENDPATH**/ ?>