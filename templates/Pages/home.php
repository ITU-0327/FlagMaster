<?php
/**
 * @var \App\View\AppView $this
 */
$this->disableAutoLayout();

$userInfo = $this->User->getUserInfo();
extract($userInfo);

// Check if the user is logged in
$isLoggedIn = !empty($user_id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->element('title-meta', ['title' => $this->fetch('title')]) ?>

    <!-- Owl Carousel  -->
    <?= $this->Html->css('/libs/owl.carousel/dist/assets/owl.carousel.min') ?>
    <?= $this->Html->css('/libs/aos/dist/aos') ?>
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') ?>

    <style>
        .profile-dropdown .dropdown-menu {
            min-width: 360px;
            transform: translateX(-85%);
            display: none;
            visibility: hidden;
            opacity: 0;
            transition: opacity 0.3s ease, visibility 0.3s ease;
        }
        .profile-dropdown .dropdown-menu.content-dd {
            padding: 8px 0;
            border-radius: 0.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .profile-dropdown:hover .dropdown-menu {
            display: block;
            visibility: visible;
            opacity: 1;
        }
    </style>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <?= $this->ContentBlock->image('preloader-logo', [
            'alt' => 'loader',
            'class' => 'lds-ripple img-fluid',
        ]) ?>
    </div>


    <div id="main-wrapper flex-column">
        <header class="header">
            <nav class="navbar navbar-expand-lg py-0">
                <div class="container">
                    <?= $this->Html->link(
                        $this->ContentBlock->image('logo-dark', [
                            'alt' => 'Logo-Dark',
                            'class' => 'dark-logo',
                            'width' => '180',
                        ]),
                        ['controller' => 'Pages', 'action' => 'display', 'home', 'prefix' => null, 'plugin' => null],
                        ['class' => 'navbar-brand me-0 py-0', 'escape' => false]
                    ) ?>
                    <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="ti ti-menu-2 fs-9"></i>
                    </button>
                    <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <i class="ti ti-menu-2 fs-9"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                            <li class="nav-item dropdown hover-dd mega-dropdown pages-dropdown">
                                <a class="nav-link dropdown-toggle" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']); ?>" role="button" aria-expanded="false">
                                    Shop
                                    <span class="d-flex align-items-center">
                                        <i class="ti ti-chevron-down"></i>
                                    </span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-animate-up py-0">
                                    <div class="row">
                                        <!-- Flag Categories Section -->
                                        <div class="col-md-8">
                                            <div class="p-4">
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="position-relative">
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 14]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">National Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Explore national flags</span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Custom Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Create custom flags</span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 16]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Cape Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Wearable cape flags</span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 17]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Car Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Flags for your car</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="position-relative">
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 18]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Garden Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Flags for gardens</span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 19]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Hand Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Perfect for parades</span>
                                                                </div>
                                                            </a>
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 20]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">Hanging Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Flags for decoration</span>
                                                                </div>
                                                            </a>
                                                            <!-- String Flags -->
                                                            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 21]]); ?>" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                                                        'alt' => 'flagmaster-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">String Flags</h6>
                                                                    <span class="fs-2 d-block text-muted">Perfect for events</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Recommended Products Section -->
                                        <div class="col-md-4">
                                            <div class="position-relative p-4 border-start h-100">
                                                <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                                                <ul class="list-unstyled">
                                                    <li class="mb-3">
                                                        <?= $this->Html->link(
                                                            'Australian Flag',
                                                            ['controller' => 'Products', 'action' => 'view', 65],
                                                            ['class' => 'fw-semibold text-dark text-hover-primary']
                                                        ); ?>
                                                    </li>
                                                    <li class="mb-3">
                                                        <?= $this->Html->link(
                                                            'Pirate Skull Flag',
                                                            ['controller' => 'Products', 'action' => 'view', 66],
                                                            ['class' => 'fw-semibold text-dark text-hover-primary']
                                                        ); ?>
                                                    </li>
                                                    <li class="mb-3">
                                                        <?= $this->Html->link(
                                                            'Sunflower Flag',
                                                            ['controller' => 'Products', 'action' => 'view', 67],
                                                            ['class' => 'fw-semibold text-dark text-hover-primary']
                                                        ); ?>
                                                    </li>
                                                    <li class="mb-3">
                                                        <?= $this->Html->link(
                                                            'Switzerland Hand Flag',
                                                            ['controller' => 'Products', 'action' => 'view', 68],
                                                            ['class' => 'fw-semibold text-dark text-hover-primary']
                                                        ); ?>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>

                            <li class="nav-item">
                                <?= $this->Html->link(
                                    'Custom Flags',
                                    ['controller' => 'CustomFlagEnquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                                    ['class' => 'nav-link active', 'aria-current' => 'page']
                                ); ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(
                                    'FAQs',
                                    ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                                    ['class' => 'nav-link active', 'aria-current' => 'page']
                                ); ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(
                                    'About Us',
                                    ['controller' => 'Pages', 'action' => 'aboutUs', 'prefix' => null, 'plugin' => null],
                                    ['class' => 'nav-link active', 'aria-current' => 'page']
                                ); ?>
                            </li>
                            <li class="nav-item">
                                <?= $this->Html->link(
                                    'Contact Us',
                                    ['controller' => 'Enquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                                    ['class' => 'nav-link active', 'aria-current' => 'page']
                                ); ?>
                            </li>
                            <?php if ($isLoggedIn) : ?>
                                <li class="nav-item dropdown hover-dd profile-dropdown ms-2">
                                    <a class="nav-link pe-0 dropdown-toggle" href="javascript:void(0)" id="drop1" aria-expanded="false">
                                        <div class="d-flex align-items-center">
                                            <div class="user-profile-img">
                                                <?= $this->Html->image($profilePicture, [
                                                    'alt' => 'Profile Picture',
                                                    'class' => 'rounded-circle',
                                                    'width' => '35',
                                                    'height' => '35',
                                                ]) ?>
                                            </div>
                                        </div>
                                    </a>
                                    <div class="dropdown-menu content-dd dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop1">
                                        <div class="profile-dropdown position-relative" data-simplebar>
                                            <div class="py-3 px-7 pb-0">
                                                <h5 class="mb-0 fs-5 fw-semibold">User Profile</h5>
                                            </div>
                                            <div class="d-flex align-items-center py-9 mx-7 border-bottom">
                                                <?= $this->Html->image($profilePicture, [
                                                    'alt' => 'Profile Picture',
                                                    'class' => 'rounded-circle',
                                                    'width' => '80',
                                                    'height' => '80',
                                                ]); ?>
                                                <div class="ms-3">
                                                    <h5 class="mb-1 fs-3"><?= $fullName ?></h5>
                                                    <span class="mb-1 d-block">@<?= $username ?></span>
                                                    <p class="mb-0 d-flex align-items-center gap-2">
                                                        <i class="ti ti-mail fs-4"></i> <?= $email ?>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="message-body">
                                                <?= $this->Html->link(
                                                    '<span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">' .
                                                    $this->Html->image('svgs/icon-account.svg', [
                                                        'alt' => 'flagmaster-img',
                                                        'width' => '24',
                                                        'height' => '24',
                                                    ]) .
                                                    '</span>' .
                                                    '<div class="w-100 ps-3">' .
                                                    '<h6 class="mb-1 fs-3 fw-semibold lh-base">My Profile</h6>' .
                                                    '<span class="fs-2 d-block text-body-secondary">Account Settings</span>' .
                                                    '</div>',
                                                    ['controller' => 'Users', 'action' => 'edit', $user_id, 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'py-8 px-7 mt-8 d-flex align-items-center', 'escape' => false]
                                                ); ?>
                                                <?= $this->Html->link(
                                                    '<span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">' .
                                                    $this->Html->image('svgs/icon-inbox.svg', [
                                                        'alt' => 'flagmaster-img',
                                                        'width' => '24',
                                                        'height' => '24',
                                                    ]) .
                                                    '</span>' .
                                                    '<div class="w-100 ps-3">' .
                                                    '<h6 class="mb-1 fs-3 fw-semibold lh-base">My Inbox</h6>' .
                                                    '<span class="fs-2 d-block text-body-secondary">Messages & Emails</span>' .
                                                    '</div>',
                                                    ['controller' => 'Enquiries', 'action' => 'index', 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'py-8 px-7 d-flex align-items-center', 'escape' => false]
                                                ); ?>
                                                <?= $this->Html->link(
                                                    '<span class="d-flex align-items-center justify-content-center text-bg-light rounded-1 p-6">' .
                                                    $this->Html->image('svgs/icon-dd-invoice.svg', [
                                                        'alt' => 'flagmaster-img',
                                                        'width' => '24',
                                                        'height' => '24',
                                                    ]) .
                                                    '</span>' .
                                                    '<div class="w-100 ps-3">' .
                                                    '<h6 class="mb-1 fs-3 fw-semibold lh-base">My Order</h6>' .
                                                    '<span class="fs-2 d-block text-body-secondary">Order History</span>' .
                                                    '</div>',
                                                    ['controller' => 'Orders', 'action' => 'index', 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'py-8 px-7 d-flex align-items-center', 'escape' => false]
                                                ); ?>
                                            </div>
                                            <div class="d-grid py-4 px-7 pt-8">
                                                <?= $this->Form->postLink(
                                                    'Log Out',
                                                    ['controller' => 'Auth', 'action' => 'logout', 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'btn btn-outline-primary']
                                                ); ?>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php else : ?>
                                <li class="nav-item ms-2">
                                    <?= $this->Html->link(
                                        'Login',
                                        ['controller' => 'Auth', 'action' => 'login'],
                                        ['class' => 'btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2']
                                    ); ?>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div class="body-wrapper overflow-hidden pt-0">
            <section class="hero-section position-relative overflow-hidden mb-0 mb-lg-5">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-xl-6">
                            <div class="hero-content my-5 my-xl-0">
                                <h6 class="d-flex align-items-center gap-2 fs-4 fw-semibold mb-3" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                                    <i class="ti ti-flag text-secondary fs-6"></i>
                                    <?= $this->ContentBlock->text('tagline'); ?>
                                </h6>
                                <h1 class="fw-bolder mb-7 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                                    <?= $this->ContentBlock->html('main-headline'); ?>
                                </h1>
                                <p class="fs-5 mb-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                                    <?= $this->ContentBlock->text('sub-headline'); ?>
                                </p>
                                <div class="d-sm-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                                    <?php if ($isLoggedIn) : ?>
                                        <?= $this->Html->link(
                                            'Shop Now',
                                            ['controller' => 'Products', 'action' => 'index'],
                                            ['class' => 'btn btn-primary px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0']
                                        ); ?>
                                        <?= $this->Html->link(
                                            'My Account',
                                            ['controller' => 'Users', 'action' => 'view', $user_id],
                                            ['class' => 'btn btn-outline-primary d-block scroll-link px-7 py-6']
                                        ); ?>
                                    <?php else : ?>
                                        <?= $this->Html->link(
                                            'Login',
                                            ['controller' => 'Auth', 'action' => 'login'],
                                            ['class' => 'btn btn-primary px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0']
                                        ); ?>
                                        <?= $this->Html->link(
                                            'Register',
                                            ['controller' => 'Auth', 'action' => 'register'],
                                            ['class' => 'btn btn-outline-primary d-block scroll-link px-7 py-6']
                                        ); ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 d-none d-xl-block">
                            <div class="hero-img-slide position-relative bg-primary-subtle p-4 rounded">
                                <div class="d-flex flex-row">
                                    <div class="">
                                        <div class="banner-img-1 slideup">
                                            <?= $this->ContentBlock->image('hero-image-1', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                            ]) ?>
                                        </div>
                                        <div class="banner-img-1 slideup">
                                            <?= $this->ContentBlock->image('hero-image-1', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                            ]) ?>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="banner-img-2 slideDown">
                                            <?= $this->ContentBlock->image('hero-image-2', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                            ]) ?>
                                        </div>
                                        <div class="banner-img-2 slideDown">
                                            <?= $this->ContentBlock->image('hero-image-2', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                            ]) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="features-section py-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                                <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder">
                                    <?= $this->ContentBlock->text('key-benefits-section-title') ?>
                                </h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-1') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-2') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-3') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-4') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-5') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-6') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-7') ?>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1400" data-aos-duration="1000">
                            <div class="text-center mb-5">
                                <?= $this->ContentBlock->html('key-benefits-8') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 text-center" data-aos="fade-up" data-aos-delay="1600" data-aos-duration="1000">
                            <?= $this->Html->link(
                                'Learn More',
                                ['controller' => 'Pages', 'action' => 'aboutUs', 'prefix' => null, 'plugin' => null],
                                ['class' => 'btn btn-primary btn-lg mt-4']
                            ); ?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="review-section mb-5">
                <div class="container pt-md-5">
                    <div class="row justify-content-center">
                        <div class="col-lg-8">
                            <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                                <?= $this->ContentBlock->text('review-section-title'); ?>
                            </h2>
                        </div>
                    </div>
                    <div class="review-slider" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                        <div class="owl-carousel owl-theme">
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-1.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Anna K.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">
                                            The flag I ordered exceeded my expectations! The colors are vibrant, and the fabric feels durable. It’s been waving proudly outside my house for weeks. I’ll definitely be purchasing from here again!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-2.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Sarah L.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            Great quality and fast shipping! I was able to find the perfect size for my event, and the custom design turned out beautifully. Thank you for the excellent service!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-3.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">
                                                        Samantha R.
                                                    </h6>
                                                    <p class="mb-0 fw-normal">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            I was impressed with the variety of flag types available. The customer support team helped me choose the right one for my business, and it looks fantastic outside our office. Highly recommend!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-1.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">James F.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">
                                            I purchased several flags for an international festival, and they were perfect! The quality is top-notch, and the selection of designs made it easy to find exactly what I needed. Great experience!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-2.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">John D</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            The flag is exactly what I was looking for! The material is durable, and the stitching is impeccable. It’s clear this company takes pride in their products. I’ll be coming back for more!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-3.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">
                                                        Tom H.
                                                    </h6>
                                                    <p class="mb-0 fw-normal">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            The flag I bought looks amazing! The design is sharp, and the colors are bold. It’s holding up well even in strong winds. Great product and fantastic customer service!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-1.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Rebecca T.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">
                                            I was pleasantly surprised by the variety of options available. The flag I ordered was delivered quickly, and the quality is excellent. It’s exactly what I needed for my event. Highly recommend this company!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-2.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Michael P.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            The attention to detail on the flag is impressive. I ordered a custom size, and it turned out perfectly. The material is high quality, and I couldn’t be happier with my purchase!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-3.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">
                                                        Emily G.
                                                    </h6>
                                                    <p class="mb-0 fw-normal">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            Amazing selection and excellent craftsmanship. The flag looks even better in person, and I appreciate the fast shipping. I’ve already recommended this company to my friends!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-1.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Peter M.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">
                                            I ordered a flag for my business, and it really adds a professional touch. The customer service team was incredibly helpful in choosing the right size and style. I’m thrilled with how it turned out!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-2.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Emily R.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            The flag exceeded my expectations! The fabric is durable, and the colors are vibrant. It’s been a great addition to my outdoor display. I’ll definitely be purchasing more in the future!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-3.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">
                                                        Emission Mendoza
                                                    </h6>
                                                    <p class="mb-0 fw-normal">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            I’m so impressed with the customization options. The flag I ordered fits perfectly with my decor, and the quality is top-notch. Great job!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-1.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">
                                            I bought a flag for our sports team, and it was a hit! The logo came out perfectly, and the material feels strong and long-lasting. Couldn’t ask for more!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-2.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">David G.</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            Absolutely love my new flag! It’s exactly what I was looking for, and the attention to detail is fantastic. The team was very responsive and helpful throughout the process.
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-3.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">
                                                        Laura S.
                                                    </h6>
                                                    <p class="mb-0 fw-normal">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            This company is now my go-to for flags. The quality is always reliable, and the service is fast and friendly. Highly recommend them for any flag needs!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-1.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 mb-0 text-dark">
                                            We ordered a flag for our office, and it looks incredible. The colors are bright, and the stitching is very well done. We’re very happy with our purchase!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-2.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">MinHash Cui</h6>
                                                    <p class="mb-0 text-dark">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            I purchased a flag as a gift, and it turned out to be the perfect choice. The recipient loved it, and the quality was better than expected. I’ll be back for more!
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="item">
                                <div class="card">
                                    <div class="card-body p-4">
                                        <div class="d-flex justify-content-between mb-4">
                                            <div class="d-flex align-items-center">
                                                <?= $this->Html->image('profile/user-3.jpg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'w-auto me-3 rounded-circle',
                                                    'width' => '40',
                                                    'height' => '40',
                                                ]) ?>
                                                <div>
                                                    <h6 class="fs-4 mb-1 fw-semibold">
                                                        John L.
                                                    </h6>
                                                    <p class="mb-0 fw-normal">Features availability</p>
                                                </div>
                                            </div>
                                            <div>
                                                <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="">
                                                            <?= $this->Html->image('svgs/icon-star.svg', [
                                                                'alt' => 'flagmaster-img',
                                                                'class' => 'img-fluid',
                                                            ]) ?>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p class="fs-4 text-dark mb-0">
                                            The flag is stunning, and the print quality is fantastic. It’s been up for a few months now, and it still looks brand new despite the weather. Couldn’t be happier!
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="text-bg-light production pt-5 pb-5 pb-md-5 mb-5" id="production-template">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            <div class="d-sm-flex align-items-center text-center gap-2 justify-content-center mb-7">
                                <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-sm-start mb-2 mb-sm-0">
                                    <li class="">
                                        <a class="d-block" href="javascript:void(0)">
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid border border-2 rounded-circle border-white',
                                                'width' => '32',
                                                'height' => '32',
                                            ]) ?>
                                        </a>
                                    </li>
                                    <li class="ms-n2">
                                        <a class="d-block" href="javascript:void(0)">
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid border border-2 rounded-circle border-white',
                                                'width' => '32',
                                                'height' => '32',
                                            ]) ?>
                                        </a>
                                    </li>
                                    <li class="ms-n2">
                                        <a class="d-block" href="javascript:void(0)">
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid border border-2 rounded-circle border-white',
                                                'width' => '32',
                                                'height' => '32',
                                            ]) ?>
                                        </a>
                                    </li>
                                </ul>
                                <p class="mb-0 fw-semibold fs-4 text-dark">
                                    <span>52,589+</span> users buying from us
                                </p>
                            </div>
                            <h2 class="text-center mb-0 fs-9 fw-bolder">
                                <?= $this->ContentBlock->text('styles-section-title'); ?>
                            </h2>
                        </div>
                    </div>
                    <div class="domo-contect position-relative">
                        <div class="demos-view mt-4">
                            <div class="badge text-bg-primary text-center mb-7 fs-4 py-6 px-4 d-table mx-auto rounded-pill">
                                Styles
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('national-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 14]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">National</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('custom-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">Custom</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('cape-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 16]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">Cape</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('car-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 17]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">Car</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('garden-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 18]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">Garden</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('hand-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 19]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">Hand-Flag</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('hanging-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 20]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">Hanging-Flag</h6>
                                </div>
                                <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                    <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                        <?= $this->ContentBlock->image('string-flag-image', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 21]]); ?>"
                                           class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">
                                            View Product
                                        </a>
                                    </div>
                                    <h6 class="mb-0 text-center fs-3">String</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-md-5 mb-5">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6">
                            <div class="card c2a-box" data-aos="fade-up" data-aos-delay="1600" data-aos-duration="1000">
                                <div class="card-body text-center p-4 pt-7">
                                    <h3 class="fs-7 fw-semibold pt-6">
                                        Haven't found an answer to your question?
                                    </h3>
                                    <p class="mb-7 pb-2 text-dark">
                                        Connect with us either by enquiry or email us
                                    </p>
                                    <div class="d-sm-flex align-items-center justify-content-center gap-3 mb-4">
                                        <?= $this->Html->link(
                                            'Ask Us',
                                            ['controller' => 'Enquiries', 'action' => 'add'],
                                            ['class' => 'btn btn-primary d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6', 'type' => 'button']
                                        ) ?>
                                        <?= $this->Html->link(
                                            'Email to Us',
                                            'mailto:' . $this->ContentBlock->text('email'),
                                            ['class' => 'btn btn-outline-secondary d-block px-7 py-6', 'type' => 'button']
                                        ) ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="bg-primary pt-5 pb-8">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-lg-7 col-xl-5 pt-lg-5 mb-5 mb-lg-0">
                            <h2 class="fs-9 text-white text-center text-lg-start fw-bolder mb-7">
                                Start your journey with Flag Master
                            </h2>
                            <div class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                                <?php if ($isLoggedIn) : ?>
                                    <?= $this->Html->link(
                                        'Shop Now',
                                        ['controller' => 'Products', 'action' => 'index'],
                                        ['class' => 'btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6']
                                    ); ?>
                                    <?= $this->Html->link(
                                        'My Account',
                                        ['controller' => 'Users', 'action' => 'view', $user_id],
                                        ['class' => 'btn border-white text-white fw-semibold btn-hover-white d-block px-7 py-6']
                                    ); ?>
                                <?php else : ?>
                                    <?= $this->Html->link(
                                        'Login',
                                        ['controller' => 'Auth', 'action' => 'login'],
                                        ['class' => 'btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6']
                                    ); ?>
                                    <?= $this->Html->link(
                                        'Register',
                                        ['controller' => 'Auth', 'action' => 'register'],
                                        ['class' => 'btn border-white text-white fw-semibold btn-hover-white d-block px-7 py-6']
                                    ); ?>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="col-lg-5 col-xl-5">
                            <div class="text-center text-lg-end">
                                <?= $this->Html->image('backgrounds/business-woman-checking-her-mail.png', [
                                    'alt' => 'flagmaster-img',
                                    'class' => 'img-fluid',
                                ]) ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <footer class="footer-part pt-7 pb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-4">
                        <div class="text-center">
                            <?= $this->Html->link(
                                $this->ContentBlock->image('favicon', [
                                    'alt' => 'flagmaster-img',
                                    'class' => 'img-fluid pb-3',
                                ]),
                                '/',
                                ['escape' => false]
                            ) ?>
                            <p class="mb-0 text-dark">
                                <?= $this->ContentBlock->text('footer-text') ?>
                                <a class="text-dark text-hover-primary border-bottom border-primary" href="<?= $this->ContentBlock->text('footer-website-link')?>">
                                    <?= $this->ContentBlock->text('company-name') ?>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header p-4">
                <?= $this->ContentBlock->image('logo-dark', [
                    'alt' => 'flagmaster-img',
                    'class' => 'img-fluid',
                    'width' => '150',
                ]) ?>
            </div>
            <div class="offcanvas-body p-4">
                <ul class="navbar-nav justify-content-end flex-grow-1">
                    <li class="nav-item mt-3 dropdown">
                        <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Shop <i class="ti ti-chevron-down fs-14"></i>
                        </a>
                        <div class="dropdown-menu mt-3 ps-1">
                            <!-- apps -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="position-relative">
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 14], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    National Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Explore national flags</span>
                                            </div>
                                        </a>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    Custom Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Create custom designs</span>
                                            </div>
                                        </a>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 16], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    Cape Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Wearable cape flags</span>
                                            </div>
                                        </a>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 17], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    Car Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Flags for your car</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="position-relative">
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 18], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    Garden Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Decorate your garden</span>
                                            </div>
                                        </a>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 19], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    Hand Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Perfect for parades</span>
                                            </div>
                                        </a>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 20], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    Hanging Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Flags for decoration</span>
                                            </div>
                                        </a>
                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 21], 'prefix' => null, 'plugin' => null]); ?>"
                                           class="d-flex align-items-center pb-9 position-relative lh-base">
                                            <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                                    'alt' => 'flagmaster-img',
                                                    'class' => 'img-fluid',
                                                    'width' => '24',
                                                    'height' => '24',
                                                ]) ?>
                                            </div>
                                            <div>
                                                <h6 class="mb-1 fw-semibold text-hover-primary">
                                                    String Flags
                                                </h6>
                                                <span class="fs-2 d-block text-muted">Perfect for events</span>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <!-- quick links -->
                                    <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                                    <ul class="list-unstyled px-1">
                                        <li class="mb-3">
                                            <?= $this->Html->link(
                                                'Australian Flag',
                                                ['controller' => 'Products', 'action' => 'view', 65, 'prefix' => null, 'plugin' => null],
                                                ['class' => 'fw-semibold text-dark text-hover-primary']
                                            ); ?>
                                        </li>
                                        <li class="mb-3">
                                            <?= $this->Html->link(
                                                'Pirate Skull Flag',
                                                ['controller' => 'Products', 'action' => 'view', 66, 'prefix' => null, 'plugin' => null],
                                                ['class' => 'fw-semibold text-dark text-hover-primary']
                                            ); ?>
                                        </li>
                                        <li class="mb-3">
                                            <?= $this->Html->link(
                                                'Sunflower Flag',
                                                ['controller' => 'Products', 'action' => 'view', 67, 'prefix' => null, 'plugin' => null],
                                                ['class' => 'fw-semibold text-dark text-hover-primary']
                                            ); ?>
                                        </li>
                                        <li class="mb-3">
                                            <?= $this->Html->link(
                                                'Switzerland Hand Flag',
                                                ['controller' => 'Products', 'action' => 'view', 68, 'prefix' => null, 'plugin' => null],
                                                ['class' => 'fw-semibold text-dark text-hover-primary']
                                            ); ?>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item mt-3">
                        <?= $this->Html->link(
                            'Custom Products',
                            ['controller' => 'Pages', 'action' => 'customProducts', 'prefix' => null, 'plugin' => null],
                            ['class' => 'nav-link fs-3 text-dark active', 'aria-current' => 'page']
                        ); ?>
                    </li>
                    <li class="nav-item mt-3">
                        <?= $this->Html->link(
                            'FAQs',
                            ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                            ['class' => 'nav-link fs-3 text-dark active', 'aria-current' => 'page']
                        ); ?>
                    </li>
                    <li class="nav-item mt-3">
                        <?= $this->Html->link(
                            'About Us',
                            ['controller' => 'Pages', 'action' => 'aboutUs', 'prefix' => null, 'plugin' => null],
                            ['class' => 'nav-link fs-3 text-dark active', 'aria-current' => 'page']
                        ); ?>
                    </li>
                    <li class="nav-item mt-3">
                        <?= $this->Html->link(
                            'Contact Us',
                            ['controller' => 'Enquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                            ['class' => 'nav-link fs-3 text-dark active', 'aria-current' => 'page']
                        ); ?>
                    </li>
                </ul>
                <form class="d-flex mt-3" role="search">
                    <?= $this->Html->link(
                        'Login',
                        ['controller' => 'Auth', 'action' => 'login'],
                        ['class' => 'btn btn-primary w-100 py-2']
                    ); ?>
                </form>
            </div>
        </div>
    </div>


    <div class="dark-transparent sidebartoggler"></div>

    <script>
        let userSettings = {
            Layout: "vertical",
            SidebarType: "full",
            BoxedLayout: true,
            Direction: "ltr",
            Theme: "light",
            ColorTheme: "Blue_Theme",
            cardBorder: false,
        };
    </script>

    <?= $this->Html->script('vendor.min') ?>
    <?= $this->element('vendor-script') ?>
    <?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
    <?= $this->Html->script('/libs/owl.carousel/dist/owl.carousel.min') ?>
    <?= $this->Html->script('/libs/aos/dist/aos') ?>
    <?= $this->Html->script('homepage/homepage') ?>
    <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
    </script>
</body>

</html>
