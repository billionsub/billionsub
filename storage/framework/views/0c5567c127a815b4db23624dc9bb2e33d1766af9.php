<?php $__env->startSection('page_title', __('Contact us')); ?>
<?php $__env->startSection('share_url', route('home')); ?>
<?php $__env->startSection('share_title', getSetting('site.name') . ' - ' . getSetting('site.slogan')); ?>
<?php $__env->startSection('share_description', getSetting('site.description')); ?>
<?php $__env->startSection('share_type', 'article'); ?>
<?php $__env->startSection('share_img', GenericHelper::getOGMetaImage()); ?>

<?php if(getSetting('security.recaptcha_enabled')): ?>
<?php $__env->startSection('meta'); ?>
    <?php echo NoCaptcha::renderJs(); ?>

<?php $__env->stopSection(); ?>
<?php endif; ?>

<?php $__env->startSection('content'); ?>
    <div class="container py-5 my-5">

        <div class="col-12 col-md-8 offset-md-2 mt-5">

            <div class="d-flex justify-content-center">
                <div class="col-12 col-md-7 content-md pr-5">
                    <form class="well" role="form" method="post" action="<?php echo e(route('contact.send')); ?>">
                        <div class="col">
                            <h2 class="h1s text-bold mb-3"><?php echo e(__("Contact us")); ?></h2>
                            <p class="mb-4"><?php echo e(__("Don't hesitate to contact us for any matter. We will get back to you asap.")); ?></p>

                            <?php echo csrf_field(); ?>
                            <?php if(session('success')): ?>
                                <div class="alert alert-success text-white font-weight-bold mt-2" role="alert">
                                    <?php echo e(session('success')); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <input type="email" class="form-control title-form <?php echo e($errors->has('email') ? 'is-invalid' : ''); ?>"  value="<?php echo e(old('email')); ?>" name="email" placeholder="<?php echo e(__("Email address")); ?>" autocomplete="email">
                                <?php if($errors->has('email')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <input type="text" class="form-control title-form <?php echo e($errors->has('subject') ? 'is-invalid' : ''); ?>"  value="<?php echo e(old('subject')); ?>" name="subject" placeholder="<?php echo e(__("Subject")); ?>">
                                <?php if($errors->has('subject')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('subject')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <textarea class="form-control <?php echo e($errors->has('message') ? 'is-invalid' : ''); ?>" name="message" placeholder="<?php echo e(__("Message")); ?>" rows="4"><?php echo e(old('message')); ?></textarea>
                                <?php if($errors->has('message')): ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($errors->first('message')); ?></strong>
                                    </span>
                                <?php endif; ?>
                            </div>

                            <?php if(getSetting('security.recaptcha_enabled')): ?>
                                <div class="form-group captcha-field">
                                    <?php echo NoCaptcha::display(['data-theme' => (Cookie::get('app_theme') == null ? (getSetting('site.default_user_theme')) : Cookie::get('app_theme') )]); ?>

                                    <?php $__errorArgs = ['g-recaptcha-response'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                                    <span class="text-danger" role="alert">
                                        <strong><?php echo e(__("Please check the captcha field.")); ?></strong>
                                    </span>
                                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                                </div>
                            <?php endif; ?>

                            <div class="form-group">
                                <button class="btn btn-primary " type="submit"><?php echo e(__("Submit")); ?></button>
                            </div>

                        </div>
                        <div class="clearfix"></div>
                    </form>
                </div>

                <div class="col-12 col-md-6 d-none d-md-flex justify-content-center align-items-center">
                    <img src="<?php echo e(asset("/img/contact-page.svg")); ?>" class="img-fluid ">
                </div>


            </div>
        </div>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.generic', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/u828667958/domains/vitrinsx.com/public_html/resources/views/pages/contact.blade.php ENDPATH**/ ?>