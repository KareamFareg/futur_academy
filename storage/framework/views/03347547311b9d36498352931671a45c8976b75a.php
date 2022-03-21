
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="author" content="Website Design Templates">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="keywords" content="Multipurpose Business HTML Template">
    <meta name="description" content="Sperty - Multipurpose Business HTML Template">
<?php $settings=Mrabe3Helper::Getsettings();?>

    <!-- favicon -->

    <link rel="shortcut icon" href="<?php echo e(asset('assets/images/settings')); ?>/<?php echo e($settings[0]->logo); ?>">
    <!-- title  -->
    <title>أكاديمية المستقبل التعليمية</title>


    <link src="<?php echo e(asset('assets/images/settings')); ?>/<?php echo e($settings[0]->logo); ?>" rel="icon">

    <title><?php echo $__env->yieldContent('title'); ?> </title>
    <!-- plugins -->
    <link rel="stylesheet" href="/home_assets/css/plugins.css">
    <!-- theme core css -->
    <link href="/home_assets/css/styles.css" rel="stylesheet">
    <link rel="stylesheet" href="/home_assets/css/style_ar.css">


    <?php echo $__env->yieldContent('extracss'); ?>

</head>
<?php //$settings=Mrabe3Helper::Getsettings();?>

<body>
<!-- PAGE LOADING
    ================================================== -->
<div id="preloader"></div>

<div class="main-wrapper">

    <!-- =========================
        Header
    =========================== -->

    <header class="header-style1 menu_area-light">

        <div class="navbar-default border-color-light-white">

            <div class="container-fluid px-sm-2-9">
                <div class="row">
                    <div class="col-md-12">
                        <div class="menu_area alt-font">
                            <nav class="navbar navbar-expand-lg navbar-light p-0">
                                <div class="navbar-header navbar-header-custom">
                                    <a href="/" class="navbar-brand"><img id="logo" src="<?php echo e(asset('assets/images/settings')); ?>/<?php echo e($settings[0]->logo); ?>"
                                                                                   alt="logo"></a>
                                </div>

                                <div class="navbar-toggler"></div>
                                <!-- menu area -->
                                <ul class="navbar-nav align-items-lg-center ms-auto" id="nav"
                                    style="display: none;">

                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = $__env->getContainer()->make(Illuminate\View\AnonymousComponent::class, ['view' => 'components.category-item','data' => ['category' => $category]]); ?>
<?php $component->withName('category-item'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php $component->withAttributes(['category' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($category)]); ?> <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                                <!-- end menu area -->
                                <!-- start attribute navigation -->
                                <div class="attr-nav align-items-lg-center ms-lg-auto">
                                    <ul>
                                        <?php if(auth()->guard()->check()): ?>
                                            <li class="d-none d-xl-inline-block"><a href="/dashboard"
                                                                                    class="butn secondary medium text-white shadow-none"> لوحه التحكم</a>
                                            </li>
                                        <?php else: ?>
                                            <li class="d-none d-xl-inline-block"><a href="/login"
                                                                                    class="butn secondary medium text-white shadow-none"> تسجيل الدخول</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </header>

    <!--end header-->
<?php echo $__env->yieldContent('content'); ?>
<!--footer-->
    <footer class="footer-style1 bg-dark">

        <div class="container">
            <div class="row">

                <div class="col-lg-4 mb-1-9 mb-lg-0 wow fadeIn" data-wow-delay="200ms">
                    <div class="logo-footer">
                        <img src="<?php echo e(asset('assets/images/settings')); ?>/<?php echo e($settings[0]->logo); ?>" class="" alt="..." />
                    </div>
                    <p class="mb-1-9 text-white w-xxl-85 des-footer">
                        <?php echo e($settings[0]->content); ?>

                    </p>
                    <div class="social-icons2">
                        <ul class="ps-0 mb-0">
                            <li><a href="#!"><i class="fab fa-facebook-f"><?php echo e($settings[0]->fb); ?></i></a></li>
                            <li><a href="#!"><i class="fab fa-twitter"><?php echo e($settings[0]->tw); ?></i></a></li>
                            <li><a href="#!"><i class="fab fa-instagram"><?php echo e($settings[0]->insta); ?></i></a></li>
                            <li><a href="#!"><i class="fab fa-linkedin-in"></i><?php echo e($settings[0]->linkedin); ?></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-12 mb-1-9 border-bottom border-color-light-white wow fadeIn info_contact_footer"
                             data-wow-delay="300ms">
                            <div class="row">
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ti-mobile display-20 text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h5 text-white mb-1">رقم الهاتف</h4>
                                            <p class="mb-0 text-white opacity8 small"><?php echo e($settings[0]->phone); ?>

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ti-email display-20 text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h5 text-white mb-1">البريد الالكتروني</h4>
                                            <p class="mb-0 text-white opacity8 small"><?php echo e($settings[0]->email); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="d-flex">
                                        <div class="flex-shrink-0">
                                            <i class="ti-map-alt display-20 text-secondary"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h4 class="h5 text-white mb-1">العنوان</h4>
                                            <p class="mb-0 text-white opacity8 small"> <?php echo e($settings[0]->address); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-1-9 mb-lg-0 wow fadeIn" data-wow-delay="400ms">
                            <h3>عن الأكاديمية</h3>
                            <ul class="ps-0 mb-0">
                                <li><a href="#">من نحن</a></li>
                                <li><a href="#">فريق العمل</a></li>
                                <li><a href="#">اتصل بنا</a></li>
                            </ul>
                        </div>
                        <div class="col-sm-6 col-lg-4 mb-1-9 mb-lg-0 wow fadeIn" data-wow-delay="500ms">
                            <h3>روابط مفيدة</h3>
                            <ul class="ps-0 mb-0">
                                <li><a href="#">مشاريعنا</a></li>
                                <li><a href="#">المركز الأعلامي</a></li>
                                <li><a href="#">المقالات</a></li>
                            </ul>
                        </div>
                        <div class="col-md-6 col-lg-4 wow fadeIn" data-wow-delay="600ms">
                            <h3>اشترك في النشرة الأخبارية</h3>
                            <form class="quform" action="#" method="post" enctype="multipart/form-data" onclick="">

                                <div class="quform-elements">

                                    <div class="row">
                                        <!-- Begin Text input element -->
                                        <div class="col-md-12">
                                            <div class="quform-element mb-0">
                                                <div class="quform-input">
                                                    <input class="form-control" id="email" type="text"
                                                           name="email" placeholder="البريد الالكتروني" />
                                                </div>
                                            </div>
                                        </div>
                                        <!-- End Text input element -->

                                        <!-- Begin Submit button -->
                                        <div class="col-md-12 mt-2">
                                            <div class="quform-submit-inner">
                                                <button class="butn-style1 secondary m-0 w-100"
                                                        type="submit">اشترك</button>
                                            </div>
                                            <div class="quform-loading-wrap text-start mt-3"><span
                                                        class="quform-loading"></span></div>
                                        </div>
                                        <!-- End Submit button -->
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="footer-bar wow fadeIn" data-wow-delay="200ms">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>&copy; <span class="current-year"></span> جميع الحقوق محفوظة</p>
                    </div>
                </div>
            </div>
        </div>

    </footer>


</div><!-- /.wrapper -->

    <!-- SCROLL TO TOP
        ================================================== -->
    <a href="#!" class="scroll-to-top"><i class="fas fa-angle-up" aria-hidden="true"></i></a>

<style>
    .swal2-select{
        display: none !important;
    }
</style>
<script src="/sweetalert.all.js"></script>
<?php echo $__env->make('sweetalert::alert', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- all js include start -->

<!-- jQuery -->
<script src="/home_assets/js/jquery.min.js"></script>

<!-- popper js -->
<script src="/home_assets/js/popper.min.js"></script>

<!-- bootstrap -->
<script src="/home_assets/js/bootstrap.min.js"></script>

<!-- jquery -->
<script src="/home_assets/js/core.min.js"></script>


<!-- custom scripts -->
<script src="/home_assets/js/main.js"></script>

<?php echo $__env->yieldContent('extrajs'); ?>



</body>

</html><?php /**PATH C:\xampp\htdocs\academic\resources\views/layouts/sitelayouts.blade.php ENDPATH**/ ?>