﻿<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>

<?php $this->start('css'); ?>

<?= $this->Html->css('styles') ?>
<?= $this->Html->css('styles-rtl') ?>
<?= $this->Html->css('plugins/some-plugin/some-plugin') ?>
<?php $this->end(); ?>


<div id="main-wrapper flex-column">
    <header class="header">
        <nav class="navbar navbar-expand-lg py-0">
            <div class="container">
                <a class="navbar-brand me-0 py-0" href="/">
                    <?= $this->Html->image('logos/dark-logo.svg', [
                        'alt' => 'flagmaster-img',
                        'class' => 'img-fluid',
                        'width' => '180',
                    ]) ?>
                </a>
                <button class="navbar-toggler d-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="ti ti-menu-2 fs-9"></i>
                </button>
                <button class="navbar-toggler border-0 p-0 shadow-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                    <i class="ti ti-menu-2 fs-9"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav align-items-center mb-2 mb-lg-0 ms-auto">
                        <li class="nav-item dropdown hover-dd mega-dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" aria-expanded="false">
                                Demos
                                <span class="d-flex align-items-center">
                                    <i class="ti ti-chevron-down"></i>
                                </span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-animate-up p-4">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <h5 class="fs-5 fw-semibold">Different Demos</h5>
                                        <p class="mb-0">Included with the Package</p>
                                    </div>
                                </div>
                                <div class="row justify-content-center my-4">
                                    <div class="col-lg-12">
                                        <div class="row">
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('demos/demo-main.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="/" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Main
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('demos/demo-dark.jpg', [
                                                        'alt' => 'img-fluid',
                                                        'alt' => "modernize-img",
                                                        'class' => "img-fluid"
                                                    ]) ?>
                                                    <a target="_blank" href="/" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Dark
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('demos/demo-horizontal.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="/" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Horizontal
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('demos/demo-minisidebar.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="/" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Minisidebar
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('demos/demo-rtl.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="/" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">RTL</h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row justify-content-center mb-4">
                                    <div class="col-md-12">
                                        <h5 class="fs-5 fw-semibold mt-8">Different Apps</h5>
                                    </div>
                                </div>
                                <div class="row justify-content-center">
                                    <div class="col-lg-12">
                                        <div class="row justify-content-between">
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('apps/app-calendar.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="calendar" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Calendar
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <?= $this->Html->image('apps/app-chat.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="chat" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Chat
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <!--<img src="../assets/images/apps/app-email.jpg" alt="modernize-img" class="img-fluid" />-->
                                                    <?= $this->Html->image('apps/app-email.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="email" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Email
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <!--<img src="../assets/images/apps/app-contact.jpg" alt="modernize-img" class="img-fluid" />-->
                                                    <?= $this->Html->image('apps/app-contact.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="contact-list" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Contact
                                                </h6>
                                            </div>
                                            <div class="col">
                                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                                    <!--<img src="../assets/images/apps/app-invoice.jpg" alt="modernize-img" class="img-fluid" />-->
                                                    <?= $this->Html->image('apps/app-invoice.jpg', [
                                                        'alt' => 'modernize-img',
                                                        'class' => 'img-fluid',
                                                    ]) ?>
                                                    <a target="_blank" href="invoice" class="btn btn-primary lp-demos-btn fs-2 p-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                                        Preview</a>
                                                </div>
                                                <h6 class="mb-0 text-center fw-bolder fs-3">
                                                    Invoice
                                                </h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </ul>
                        </li>
                        <li class="nav-item dropdown hover-dd mega-dropdown pages-dropdown">
                            <a class="nav-link dropdown-toggle" href="javascript:void(0)" role="button" aria-expanded="false">
                                Pages
                                <span class="d-flex align-items-center">
                                    <i class="ti ti-chevron-down"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-animate-up py-0">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="p-4">
                                            <div>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <div class="position-relative">
                                                            <a target="_blank" href="chat" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Chat Application
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">New messages arrived</span>
                                                                </div>
                                                            </a>
                                                            <a target="_blank" href="invoice" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Invoice App
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">Get latest invoice</span>
                                                                </div>
                                                            </a>
                                                            <a target="_blank" href="contact-list" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Contact Application
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                                                                </div>
                                                            </a>
                                                            <a target="_blank" href="email" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Email App
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">Get new emails</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-6">
                                                        <div class="position-relative">
                                                            <a target="_blank" href="page-user-profile" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        User Profile
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">learn more information</span>
                                                                </div>
                                                            </a>
                                                            <a target="_blank" href="calendar" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Calendar App
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">Get dates</span>
                                                                </div>
                                                            </a>
                                                            <a target="_blank" href="contact_table" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Contact List Table
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">Add new contact</span>
                                                                </div>
                                                            </a>
                                                            <a target="_blank" href="notes" class="d-flex align-items-center pb-9 position-relative lh-base">
                                                                <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                                                    <!--<img src="../assets/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                                                    <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                                                        'alt' => 'modernize-img',
                                                                        'class' => 'img-fluid',
                                                                        'width' => '24',
                                                                        'height' => '24',
                                                                    ]) ?>
                                                                </div>
                                                                <div>
                                                                    <h6 class="mb-1 fw-semibold text-hover-primary">
                                                                        Notes Application
                                                                    </h6>
                                                                    <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="position-relative p-4 border-start h-100">
                                            <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                                            <ul class="list-unstyled">
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="page-pricing">Pricing Page</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="authentication-login">Authentication Design</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="authentication-register">Register Now</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="authentication-error">404 Error Page</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="notes">Notes App</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="page-user-profile">User Application</a>
                                                </li>
                                                <li class="mb-3">
                                                    <a class="fw-semibold text-dark text-hover-primary" target="_blank" href="page-account-settings">Account Settings</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#" target="_blank">Documentation</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="https://adminmart.com/support/" target="_blank">Support</a>
                        </li>
                        <li class="nav-item ms-2">
                            <a class="btn btn-primary fs-3 rounded btn-hover-shadow px-3 py-2" href="authentication-login">Login</a>
                        </li>
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
                                <i class="ti ti-rocket text-secondary fs-6"></i>Start your flag shopping journey.
                            </h6>
                            <h1 class="fw-bolder mb-7 fs-13" data-aos="fade-up" data-aos-delay="400" data-aos-duration="1000">
                                Most type &
                                <span class="text-primary"> Best Quality</span>
                                Sale

                            </h1>
                            <p class="fs-5 mb-5 text-dark fw-normal" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                                Flagmaster is the Largest flag supplier in Australia
                            </p>
                            <div class="d-sm-flex align-items-center gap-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                                <a class="btn btn-primary px-5 py-6 btn-hover-shadow d-block mb-3 mb-sm-0" href="authentication-login">Login</a>
                                <a class="btn btn-outline-primary d-block scroll-link px-7 py-6" href="#production-template">Live
                                    Preview</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 d-none d-xl-block">
                        <div class="hero-img-slide position-relative bg-primary-subtle p-4 rounded">
                            <div class="d-flex flex-row">
                                <div class="">
                                    <div class="banner-img-1 slideup">
                                        <!--<img src="../assets/images/hero-img/bannerimg1.svg" alt="modernize-img" class="img-fluid" />-->
                                        <?= $this->Html->image('hero-img/bannerimg1.svg', [
                                            'alt' => 'modernize-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                    </div>
                                    <div class="banner-img-1 slideup">
                                        <!--<img src="../assets/images/hero-img/bannerimg1.svg" alt="modernize-img" class="img-fluid" />-->
                                        <?= $this->Html->image('hero-img/bannerimg1.svg', [
                                            'alt' => 'modernize-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="banner-img-2 slideDown">
                                        <!--<img src="../assets/images/hero-img/bannerimg2.svg" alt="modernize-img" class="img-fluid" />-->
                                        <?= $this->Html->image('hero-img/bannerimg2.svg', [
                                            'alt' => 'modernize-img',
                                            'class' => 'img-fluid',
                                        ]) ?>
                                    </div>
                                    <div class="banner-img-2 slideDown">
                                        <!--<img src="../assets/images/hero-img/bannerimg2.svg" alt="modernize-img" class="img-fluid" />-->
                                        <?= $this->Html->image('hero-img/bannerimg2.svg', [
                                            'alt' => 'modernize-img',
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
        <section class="production pb-5 pb-md-5 mb-5" id="production-template">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                        <div class="d-sm-flex align-items-center text-center gap-2 justify-content-center mb-7">
                            <ul class="list-unstyled d-flex align-items-center justify-content-center justify-content-sm-start mb-2 mb-sm-0">
                                <li class="">
                                    <a class="d-block" href="javascript:void(0)">
                                        <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="img-fluid border border-2 rounded-circle border-white" width="32" height="32" -->
                                        <?= $this->Html->image('profile/user-1.jpg', [
                                            'alt' => 'modernize-img',
                                            'class' => 'img-fluid border border-2 rounded-circle border-white',
                                            'width' => '32',
                                            'height' => '32',
                                        ]) ?>
                                    </a>
                                </li>
                                <li class="ms-n2">
                                    <a class="d-block" href="javascript:void(0)">
                                        <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="img-fluid border border-2 rounded-circle border-white" width="32" height="32" />-->
                                        <?= $this->Html->image('profile/user-2.jpg', [
                                            'alt' => 'modernize-img',
                                            'class' => 'img-fluid border border-2 rounded-circle border-white',
                                            'width' => '32',
                                            'height' => '32',
                                        ]) ?>
                                    </a>
                                </li>
                                <li class="ms-n2">
                                    <a class="d-block" href="javascript:void(0)">
                                        <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="img-fluid border border-2 rounded-circle border-white" width="32" height="32" />-->
                                        <?= $this->Html->image('profile/user-3.jpg', [
                                            'alt' => 'modernize-img',
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
                            A variety of flag designs available for selection
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
                                    <!--<img src="../assets/images/apps/app-calendar.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/National-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="calendar" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">National</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/app-chat.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/Custom-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="chat" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">Custom</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/app-email.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/Cape-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="email" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">Cape</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/app-contact.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/Car-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="contact-list" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">Car</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/app-invoice.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/Garden-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="invoice" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">Garden</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/modernize-bt-app-contact-list.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/Hand-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="contact_table" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">Hand-Flag</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/app-user-profile.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/Hanging-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="page-user-profile" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">Hanging-Flag</h6>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-3 mb-7">
                                <div class="border d-block rounded-1 mb-2 position-relative lp-demos-box overflow-hidden">
                                    <!--<img src="../assets/images/apps/modernize-vue-app-blog.jpg" alt="modernize-img" class="img-fluid" />-->
                                    <?= $this->Html->image('apps/String-Flag.png', [
                                        'alt' => 'modernize-img',
                                        'class' => 'img-fluid',
                                    ]) ?>
                                    <a target="_blank" href="blog-posts" class="btn btn-primary lp-demos-btn fs-3 px-7 py-1 rounded position-absolute top-50 start-50 translate-middle">Live
                                        Preview</a>
                                </div>
                                <h6 class="mb-0 text-center fs-3">String</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="text-bg-light py-5">
            <div class="py-md-5">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-lg-8 col-xxl-8">
                            <h2 class="fs-9 text-center mb-5 fw-bolder">
                                Our sales performance
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="sliding-wrapper position-relative overflow-hidden">
                    <div class="slide-background d-flex flex-row w-100">
                        <div class="slide">
                            <!--<img src="../assets/images/slider/slider-group.png" alt="slide" height="100%" />-->
                            <?= $this->Html->image('slider/slider-group.png', [
                                'alt' => 'slide',
                                'class' => '100%',
                            ]) ?>
                        </div>
                        <div class="slide">
                            <!--<img src="../assets/images/slider/slider-group.png" alt="slide" height="100%" />-->
                            <?= $this->Html->image('slider/slider-group.png', [
                                'alt' => 'slide',
                                'class' => '100%',
                            ]) ?>
                        </div>
                        <div class="slide">
                            <!--<img src="../assets/images/slider/slider-group.png" alt="slide" height="100%" />-->
                            <?= $this->Html->image('slider/slider-group.png', [
                                'alt' => 'slide',
                                'class' => '100%',
                            ]) ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="review-section pt-5">
            <div class="container pt-md-5">
                <div class="row justify-content-center">
                    <div class="col-lg-8">
                        <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder" data-aos="fade-up" data-aos-delay="200" data-aos-duration="1000">
                            Don’t just take our words for it, See what customers like you
                            are saying
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
                                            <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Anna K.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Sarah L.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">
                                                    Samantha R.
                                                </h6>
                                                <p class="mb-0 fw-normal">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">James F.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">John D</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">
                                                    Tom H.
                                                </h6>
                                                <p class="mb-0 fw-normal">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" /-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Rebecca T.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Michael P.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                    <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">
                                                    Emily G.
                                                </h6>
                                                <p class="mb-0 fw-normal">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Peter M.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Emily R.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">
                                                    Eminson Mendoza
                                                </h6>
                                                <p class="mb-0 fw-normal">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">David G.</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />--->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">
                                                    Laura S.
                                                </h6>
                                                <p class="mb-0 fw-normal">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-1.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Jenny Wilson</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-2.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-2.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">Minshan Cui</h6>
                                                <p class="mb-0 text-dark">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
                                            <!--<img src="../assets/images/profile/user-3.jpg" alt="modernize-img" class="w-auto me-3 rounded-circle" width="40" height="40" />-->
                                            <?= $this->Html->image('profile/user-3.jpg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'w-auto me-3 rounded-circle',
                                                'width' => '40',
                                                'height' => '40',
                                            ]) ?>
                                            <div>
                                                <h6 class="fs-4 mb-1 fw-semibold">
                                                    John L.
                                                </h6>
                                                <p class="mb-0 fw-normal">Features avaibility</p>
                                            </div>
                                        </div>
                                        <div>
                                            <ul class="list-unstyled d-flex align-items-center justify-content-end gap-1 mb-0">
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
                                                            'class' => 'img-fluid',
                                                        ]) ?>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <!--<img src="../assets/images/svgs/icon-star.svg" alt="modernize-img" class="img-fluid" />-->
                                                        <?= $this->Html->image('svgs/icon-star.svg', [
                                                            'alt' => 'modernize-img',
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
        <section class="features-section py-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-6">
                        <div class="text-center" data-aos="fade-up" data-aos-delay="600" data-aos-duration="1000">
                            <small class="text-primary fw-bold mb-2 d-block fs-3">ALMOST COVERED EVERYTHING</small>
                            <h2 class="fs-9 text-center mb-4 mb-lg-5 fw-bolder">
                                Other Amazing Options Provided
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-wand text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">6 Theme Colors</h5>
                            <p class="mb-0 text-dark">
                                We have included 6 pre-defined Theme Colors
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="800" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-adjustments text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">150+ Styles</h5>
                            <p class="mb-0 text-dark">
                                Almost 150+ Styles can be found
                                Pack.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-diamond text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">200+ Colors Available</h5>
                            <p class="mb-0 text-dark">
                                Lots of Icon Fonts are included here in the package
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-device-desktop text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Fully Sizes</h5>
                            <p class="mb-0 text-dark">
                                Available in all sizes and types to suit customer needs.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1000" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-database text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Saving Favourites</h5>
                            <p class="mb-0 text-dark">
                                Keep customers favourite styles for next shopping
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-arrows-shuffle text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Easy to Customize</h5>
                            <p class="mb-0 text-dark">
                                Customization will be easy to customize.
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1200" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-chart-pie text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Lots of Options</h5>
                            <p class="mb-0 text-dark">
                                You name it and we have it, Yes lots of variations
                            </p>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-4 col-lg-3" data-aos="fade-up" data-aos-delay="1400" data-aos-duration="1000">
                        <div class="text-center mb-5">
                            <i class="d-block ti ti-calendar text-primary fs-10"></i>
                            <h5 class="fs-5 fw-semibold mt-8">Always Cheapest</h5>
                            <p class="mb-0 text-dark">
                                In any times all will be the cheapest in the marketplace
                            </p>
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
                                    Connect with us
                                </p>
                                <div class="d-sm-flex align-items-center justify-content-center gap-3 mb-4">
                                    <a href="https://www.youtube.com/watch?v=YASXk7Pu8HA" target="_blank" class="btn btn-primary d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6" type="button">Ask Us</a>
                                    <a href="https://www.youtube.com/" target="_blank" class="btn btn-outline-secondary d-block px-7 py-6" type="button">Email to Us</a>
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
                            Start your shopping
                        </h2>
                        <div class="d-sm-flex align-items-center justify-content-center justify-content-lg-start gap-3">
                            <a href="authentication-login" class="btn bg-white text-primary fw-semibold d-block mb-3 mb-sm-0 btn-hover-shadow px-7 py-6">Login</a>
                            <a href="authentication-register" class="btn border-white text-white fw-semibold btn-hover-white d-block px-7 py-6">Register</a>
                        </div>
                    </div>
                    <div class="col-lg-5 col-xl-5">
                        <div class="text-center text-lg-end">
                            <!--<img src="../assets/images/backgrounds/business-woman-checking-her-mail.png" alt="modernize-img" class="img-fluid" />-->
                            <?= $this->Html->image('backgrounds/business-woman-checking-her-mail.png', [
                                'alt' => 'modernize-img',
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
                        <a href="index-new">
                            <!--<img src="../assets/images/logos/favicon.ico" alt="modernize-img" class="img-fluid pb-3" />-->
                            <?= $this->Html->image('logos/favicon.ico', [
                                'alt' => 'modernize-img',
                                'class' => 'img-fluid pb-3',
                            ]) ?>
                        </a>
                        <p class="mb-0 text-dark">
                            All rights reserved by FlagMaster. Designed & Developed by
                            <a class="text-dark text-hover-primary border-bottom border-primary" href="https://adminmart.com/">FlagMaster</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <div class="offcanvas offcanvas-start modernize-lp-offcanvas" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header p-4">
            <!--<img src="../assets/images/logos/dark-logo.svg" alt="modernize-img" class="img-fluid" width="150" />-->
            <?= $this->Html->image('logos/dark-logo.svg', [
                'alt' => 'modernize-img',
                'class' => 'img-fluid',
                'width' => '150',
            ]) ?>
        </div>
        <div class="offcanvas-body p-4">
            <ul class="navbar-nav justify-content-end flex-grow-1">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Demos <i class="ti ti-chevron-down fs-14"></i>
                    </a>
                    <ul class="dropdown-menu ps-2">
                        <li>
                            <a class="dropdown-item text-dark" href="./index">Dark</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-dark" href="./index">Horizontal</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-dark" href="./index">LTR</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-dark" href="./index">Minisidebar</a>
                        </li>
                        <li>
                            <a class="dropdown-item text-dark" href="./index">RTL</a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item mt-3 dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center justify-content-between fs-3 text-dark" href="javascript:void(0)" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Pages <i class="ti ti-chevron-down fs-14"></i>
                    </a>
                    <div class="dropdown-menu mt-3 ps-1">
                        <!-- apps -->
                        <div class="row">
                            <div class="col-12">
                                <div class="position-relative">
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-chat.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Chat Application
                                            </h6>
                                            <span class="fs-2 d-block text-muted">New messages arrived</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-invoice.svg" alt="modernize-img" class="img-fluid" width="24" height="24" /-->
                                            <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Invoice App
                                            </h6>
                                            <span class="fs-2 d-block text-muted">Get latest invoice</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-mobile.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Contact Application
                                            </h6>
                                            <span class="fs-2 d-block text-muted">2 Unsaved Contacts</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-message-box.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Email App
                                            </h6>
                                            <span class="fs-2 d-block text-muted">Get new emails</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="position-relative">
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-cart.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                User Profile
                                            </h6>
                                            <span class="fs-2 d-block text-muted">learn more information</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-date.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Calendar App
                                            </h6>
                                            <span class="fs-2 d-block text-muted">Get dates</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-lifebuoy.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Contact List Table
                                            </h6>
                                            <span class="fs-2 d-block text-muted">Add new contact</span>
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="d-flex align-items-center pb-9 position-relative lh-base">
                                        <div class="text-bg-light rounded me-3 p-6 d-flex align-items-center justify-content-center">
                                            <!--<img src="../assets/images/svgs/icon-dd-application.svg" alt="modernize-img" class="img-fluid" width="24" height="24" />-->
                                            <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                                'alt' => 'modernize-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold text-hover-primary">
                                                Notes Application
                                            </h6>
                                            <span class="fs-2 d-block text-muted">To-do and Daily tasks</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- quick links -->
                                <h5 class="fs-5 mb-7 fw-semibold">Quick Links</h5>
                                <ul class="list-unstyled px-1">
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Pricing Page</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Authentication
                                            Design</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Register Now</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">404 Error Page</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Notes App</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">User Application</a>
                                    </li>
                                    <li class="mb-3">
                                        <a class="fw-semibold text-dark text-hover-primary" href="javascript:void(0)">Account Settings</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link fs-3 text-dark active" aria-current="page" href="#">Documentation</a>
                </li>
                <li class="nav-item mt-3">
                    <a class="nav-link fs-3 text-dark" href="javascript:void(0)">Pages</a>
                </li>
            </ul>
            <form class="d-flex mt-3" role="search">
                <a href="authentication-login" class="btn btn-primary w-100 py-2">Login</a>
            </form>
        </div>
    </div>
</div>


<?php
$this->start('customScript'); ?>
<?= $this->Html->script('/libs/iconify-icon/iconify-icon.min') ?>
<?= $this->Html->script('/libs/owl.carousel/dist/owl.carousel.min') ?>
<?= $this->Html->script('/libs/aos/dist/aos') ?>
<?= $this->Html->script('homepage/homepage') ?>
<?php $this->end(); ?>
