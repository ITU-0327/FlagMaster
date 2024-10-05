<?php
/**
 * @var \App\View\AppView $this
 */

$userInfo = $this->User->getUserInfo();
extract($userInfo);
?>

<header class="topbar">
        <div class="with-vertical">
          <!-- ---------------------------------- -->
          <!-- Start Vertical Layout Header -->
          <!-- ---------------------------------- -->
          <nav class="navbar navbar-expand-lg p-0">
            <ul class="navbar-nav">
              <li class="nav-item nav-icon-hover-bg rounded-circle ms-n2">
                <a class="nav-link sidebartoggler" id="headerCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
            </ul>

            <ul class="navbar-nav quick-links d-none d-lg-flex align-items-center">
              <!-- ------------------------------- -->
              <!-- start shop Dropdown -->
              <!-- ------------------------------- -->
                <li class="nav-item nav-icon-hover-bg rounded w-auto dropdown d-none d-lg-block mx-0">
                    <div class="hover-dd">
                        <?= $this->Html->link(
                            'Shop By Category
                                <span class="mt-1">
                                    <i class="ti ti-chevron-down fs-3"></i>
                                </span>',
                            ['controller' => 'Products', 'action' => 'index', 'prefix' => null, 'plugin' => null],
                            ['class' => 'nav-link', 'escape' => false]
                        ); ?>
                        <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                            <div class="row">
                                <div class="col-8">
                                    <div class="ps-7 pt-7">
                                        <div class="border-bottom">
                                            <div class="row">
                                                <div class="col-6">
                                                    <div class="position-relative">
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 14], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    National Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Explore national flags</span>
                                                            </div>
                                                        </a>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">Custom Flags</h6>
                                                                <span class="fs-2 d-block text-body-secondary">Create custom designs</span>
                                                            </div>
                                                        </a>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 16], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    Cape Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Wearable cape flags</span>
                                                            </div>
                                                        </a>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 17], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    Car Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Flags for your car</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>

                                                <div class="col-6">
                                                    <div class="position-relative">
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 18], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    Garden Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Decorate your garden</span>
                                                            </div>
                                                        </a>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 19], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    Hand Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Perfect for parades</span>
                                                            </div>
                                                        </a>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 20], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    Hanging Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Flags for decoration</span>
                                                            </div>
                                                        </a>
                                                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 21], 'prefix' => null, 'plugin' => null]); ?>"
                                                           class="d-flex align-items-center pb-9 position-relative">
                                                            <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                                                <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                                                    'alt' => 'flagmaster-img',
                                                                    'class' => 'img-fluid',
                                                                    'width' => '24',
                                                                    'height' => '24',
                                                                ]) ?>
                                                            </div>
                                                            <div>
                                                                <h6 class="mb-1 fw-semibold fs-3">
                                                                    String Flags
                                                                </h6>
                                                                <span class="fs-2 d-block text-body-secondary">Perfect for events</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row align-items-center py-3">
                                            <div class="col-8">
                                                <?= $this->Html->link(
                                                    '<i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions',
                                                    ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'fw-semibold d-flex align-items-center lh-1', 'escape' => false]
                                                ); ?>
                                            </div>
                                            <div class="col-4">
                                                <div class="d-flex justify-content-end pe-4">
                                                    <button class="btn btn-primary">Check</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-4 ms-n4">
                                    <div class="position-relative p-7 border-start h-100">
                                        <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                                        <ul class="">
                                            <li class="mb-3">
                                                <?= $this->Html->link(
                                                    'Australian Flag',
                                                    ['controller' => 'Products', 'action' => 'view', 65, 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'fw-semibold bg-hover-primary']
                                                ); ?>
                                            </li>
                                            <li class="mb-3">
                                                <?= $this->Html->link(
                                                    'Pirate Skull Flag',
                                                    ['controller' => 'Products', 'action' => 'view', 66, 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'fw-semibold bg-hover-primary']
                                                ); ?>
                                            </li>
                                            <li class="mb-3">
                                                <?= $this->Html->link(
                                                    'Sunflower Flag',
                                                    ['controller' => 'Products', 'action' => 'view', 67, 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'fw-semibold bg-hover-primary']
                                                ); ?>
                                            </li>
                                            <li class="mb-3">
                                                <?= $this->Html->link(
                                                    'Switzerland Hand Flag',
                                                    ['controller' => 'Products', 'action' => 'view', 68, 'prefix' => null, 'plugin' => null],
                                                    ['class' => 'fw-semibold bg-hover-primary']
                                                ); ?>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
              <!-- ------------------------------- -->
              <!-- end shop Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'Custom Products',
                      ['controller' => 'CustomFlagEnquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'FAQs',
                      ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'About Us',
                      ['controller' => 'Pages', 'action' => 'aboutUs', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'Contact Us',
                      ['controller' => 'Enquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
            </ul>

            <div class="d-block d-lg-none py-4"
                <?= $this->Html->link(
                    $this->ContentBlock->image('logo-dark', [
                        'alt' => 'Logo-Dark',
                        'class' => 'dark-logo',
                    ]) .
                    $this->ContentBlock->image('logo-light', [
                        'alt' => 'Logo-light',
                        'class' => 'light-logo',
                    ]),
                    ['controller' => 'Pages', 'action' => 'display', 'home', 'prefix' => null, 'plugin' => null],
                    ['class' => 'text-nowrap logo-img', 'escape' => false]
                ) ?>
            </div>
            <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <i class="ti ti-dots fs-7"></i>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between">
                <a href="javascript:void(0)" class="nav-link nav-icon-hover-bg rounded-circle mx-0 ms-n1 d-flex d-lg-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                  <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                  <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a class="nav-link moon dark-layout" href="javascript:void(0)">
                      <i class="ti ti-moon moon"></i>
                    </a>
                    <a class="nav-link sun light-layout" href="javascript:void(0)">
                      <i class="ti ti-sun sun"></i>
                    </a>
                  </li>

                  <!-- ------------------------------- -->
                  <!-- start shopping cart Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                      <i class="ti ti-basket"></i>
                        <?php if ($cartItemCount > 0) : ?>
                            <span class="popup-badge rounded-pill bg-danger text-white fs-2"><?= $cartItemCount ?></span>
                        <?php endif; ?>
                    </a>
                  </li>
                  <!-- ------------------------------- -->
                  <!-- end shopping cart Dropdown -->
                  <!-- ------------------------------- -->

                  <!-- ------------------------------- -->
                  <!-- start profile Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
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
                                ['class' => 'py-8 px-7 d-flex align-items-center', 'escape' => false]
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
                  <!-- ------------------------------- -->
                  <!-- end profile Dropdown -->
                  <!-- ------------------------------- -->
                </ul>
              </div>
            </div>
          </nav>
          <!-- ---------------------------------- -->
          <!-- End Vertical Layout Header -->
          <!-- ---------------------------------- -->

          <!-- ------------------------------- -->
          <!-- shop Dropdown in Small screen -->
          <!-- ------------------------------- -->
          <!--  Mobilenavbar -->
          <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="mobilenavbar" aria-labelledby="offcanvasWithBothOptionsLabel">
            <nav class="sidebar-nav scroll-sidebar">
              <div class="offcanvas-header justify-content-between">
                  <?= $this->Html->image('logos/favicon.ico', [
                      'alt' => 'flagmaster-img',
                      'class' => 'img-fluid',
                  ]) ?>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body h-n80" data-simplebar="" data-simplebar>
                <ul id="sidebarnav">
                  <li class="sidebar-item">
                    <a class="sidebar-link has-arrow" href="javascript:void(0)" aria-expanded="false">
                      <span>
                        <i class="ti ti-apps"></i>
                      </span>
                      <span class="hide-menu">Shop By Category</span>
                    </a>
                    <ul aria-expanded="false" class="collapse first-level my-3">
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 14], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">National Flags</h6>
                            <span class="fs-2 d-block text-muted">Explore national flags</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">Custom Flags</h6>
                            <span class="fs-2 d-block text-muted">Create custom designs</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 16], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">Cape Flags</h6>
                            <span class="fs-2 d-block text-muted">Wearable cape flags</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                      <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 17], 'prefix' => null, 'plugin' => null]); ?>"
                         class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">Car Flags</h6>
                            <span class="fs-2 d-block text-muted">Flags for your car</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 18], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">Garden Flags</h6>
                            <span class="fs-2 d-block text-muted">Decorate your garden</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 19], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">Hand Flags</h6>
                            <span class="fs-2 d-block text-muted">Perfect for parades</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 20], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">Hanging Flags</h6>
                            <span class="fs-2 d-block text-muted">Flags for decoration</span>
                          </div>
                        </a>
                      </li>
                      <li class="sidebar-item py-2">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 21], 'prefix' => null, 'plugin' => null]); ?>"
                           class="d-flex align-items-center">
                          <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                              <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                  'alt' => 'flagmaster-img',
                                  'class' => 'img-fluid',
                                  'width' => '24',
                                  'height' => '24',
                              ]) ?>
                          </div>
                          <div>
                            <h6 class="mb-1 bg-hover-primary">String Flags</h6>
                            <span class="fs-2 d-block text-muted">Perfect for events</span>
                          </div>
                        </a>
                      </li>
                      <ul class="px-8 mt-7 mb-4">
                        <li class="sidebar-item mb-3">
                          <h5 class="fs-5 fw-semibold">Quick Links</h5>
                        </li>
                        <li class="sidebar-item py-2">
                            <?= $this->Html->link(
                                'Australian Flag',
                                ['controller' => 'Products', 'action' => 'view', 65, 'prefix' => null, 'plugin' => null],
                                ['class' => 'fw-semibold text-dark']
                            ); ?>
                        </li>
                        <li class="sidebar-item py-2">
                            <?= $this->Html->link(
                                'Pirate Skull Flag',
                                ['controller' => 'Products', 'action' => 'view', 66, 'prefix' => null, 'plugin' => null],
                                ['class' => 'fw-semibold text-dark']
                            ); ?>
                        </li>
                        <li class="sidebar-item py-2">
                            <?= $this->Html->link(
                                'Sunflower Flag',
                                ['controller' => 'Products', 'action' => 'view', 67, 'prefix' => null, 'plugin' => null],
                                ['class' => 'fw-semibold text-dark']
                            ); ?>
                        </li>
                        <li class="sidebar-item py-2">
                            <?= $this->Html->link(
                                'Switzerland Hand Flag',
                                ['controller' => 'Products', 'action' => 'view', 68, 'prefix' => null, 'plugin' => null],
                                ['class' => 'fw-semibold text-dark']
                            ); ?>
                        </li>
                      </ul>
                    </ul>
                  </li>
                  <li class="sidebar-item">
                      <?= $this->Html->link(
                          '<span>
                                    <i class="ti ti-message-dots"></i>
                                </span>
                                <span class="hide-menu">Custom Products</span>',
                          ['controller' => 'CustomFlagEnquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                          ['class' => 'sidebar-link', 'aria-expanded' => 'false', 'escape' => false]
                      ); ?>
                  </li>
                  <li class="sidebar-item">
                      <?= $this->Html->link(
                          '<span>
                            <i class="ti ti-calendar"></i>
                          </span>
                          <span class="hide-menu">FAQs</span>',
                          ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                          ['class' => 'sidebar-link', 'aria-expanded' => 'false', 'escape' => false]
                      ); ?>
                  </li>
                  <li class="sidebar-item">
                      <?= $this->Html->link(
                          '<span>
                            <i class="ti ti-mail"></i>
                          </span>
                          <span class="hide-menu">About Us</span>',
                          ['controller' => 'Pages', 'action' => 'aboutUs', 'prefix' => null, 'plugin' => null],
                          ['class' => 'sidebar-link', 'aria-expanded' => 'false', 'escape' => false]
                      ); ?>
                  </li>
                    <li class="sidebar-item">
                        <?= $this->Html->link(
                            '<span>
                                <i class="ti ti-calendar"></i>
                            </span>
                            <span class="hide-menu">Contact Us</span>',
                            ['controller' => 'Enquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                            ['class' => 'sidebar-link', 'aria-expanded' => 'false', 'escape' => false]
                        ); ?>
                    </li>
                </ul>
              </div>
            </nav>
          </div>
        </div>
        <div class="app-header with-horizontal">
          <nav class="navbar navbar-expand-xl container-fluid p-0">
            <ul class="navbar-nav align-items-center">
              <li class="nav-item nav-icon-hover-bg rounded-circle d-flex d-xl-none ms-n2">
                <a class="nav-link sidebartoggler" id="sidebarCollapse" href="javascript:void(0)">
                  <i class="ti ti-menu-2"></i>
                </a>
              </li>
              <li class="nav-item d-none d-xl-block">
                <a href="/" class="text-nowrap nav-link">
                    <?= $this->Html->image('logos/dark-logo.svg', [
                        'alt' => 'flagmaster-img',
                        'class' => 'dark-logo',
                        'width' => '120',
                    ]) ?>
                    <?= $this->Html->image('logos/light-logo.svg', [
                        'alt' => 'flagmaster-img',
                        'class' => 'light-logo',
                        'width' => '120',
                    ]) ?>
                </a>
              </li>
            </ul>
            <ul class="navbar-nav quick-links d-none d-xl-flex align-items-center">
              <!-- ------------------------------- -->
              <!-- start shop Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item nav-icon-hover-bg rounded w-auto dropdown d-none d-lg-flex">
                <div class="hover-dd">
                  <a class="nav-link" href="javascript:void(0)">
                      Shop By Category<span class="mt-1">
                      <i class="ti ti-chevron-down fs-3"></i>
                    </span>
                  </a>
                  <div class="dropdown-menu dropdown-menu-nav dropdown-menu-animate-up py-0">
                    <div class="row">
                      <div class="col-8">
                        <div class="ps-7 pt-7">
                          <div class="border-bottom">
                            <div class="row">
                              <div class="col-6">
                                <div class="position-relative">
                                  <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 14], 'prefix' => null, 'plugin' => null]); ?>"
                                     class="d-flex align-items-center pb-9 position-relative">
                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <?= $this->Html->image('svgs/icon-dd-chat.svg', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                            'width' => '24',
                                            'height' => '24',
                                        ]) ?>
                                    </div>
                                    <div>
                                      <h6 class="mb-1 fw-semibold fs-3">
                                          National Flags
                                      </h6>
                                      <span class="fs-2 d-block text-body-secondary">Explore national flags</span>
                                    </div>
                                  </a>
                                  <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15], 'prefix' => null, 'plugin' => null]); ?>"
                                     class="d-flex align-items-center pb-9 position-relative">
                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <?= $this->Html->image('svgs/icon-dd-invoice.svg', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                            'width' => '24',
                                            'height' => '24',
                                        ]) ?>
                                    </div>
                                    <div>
                                      <h6 class="mb-1 fw-semibold fs-3">Custom Flags</h6>
                                      <span class="fs-2 d-block text-body-secondary">Create custom designs</span>
                                    </div>
                                  </a>
                                  <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 15], 'prefix' => null, 'plugin' => null]); ?>"
                                     class="d-flex align-items-center pb-9 position-relative">
                                    <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                        <?= $this->Html->image('svgs/icon-dd-mobile.svg', [
                                            'alt' => 'flagmaster-img',
                                            'class' => 'img-fluid',
                                            'width' => '24',
                                            'height' => '24',
                                        ]) ?>
                                    </div>
                                    <div>
                                      <h6 class="mb-1 fw-semibold fs-3">
                                          Cape Flags
                                      </h6>
                                      <span class="fs-2 d-block text-body-secondary">Wearable cape flags</span>
                                    </div>
                                  </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 17], 'prefix' => null, 'plugin' => null]); ?>"
                                       class="d-flex align-items-center pb-9 position-relative">
                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <?= $this->Html->image('svgs/icon-dd-message-box.svg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold fs-3">
                                                Car Flags
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Flags for your car</span>
                                        </div>
                                    </a>
                                </div>
                              </div>
                              <div class="col-6">
                                <div class="position-relative">
                                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 18], 'prefix' => null, 'plugin' => null]); ?>"
                                       class="d-flex align-items-center pb-9 position-relative">
                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <?= $this->Html->image('svgs/icon-dd-cart.svg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold fs-3">
                                                Garden Flags
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Decorate your garden</span>
                                        </div>
                                    </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 19], 'prefix' => null, 'plugin' => null]); ?>"
                                       class="d-flex align-items-center pb-9 position-relative">
                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <?= $this->Html->image('svgs/icon-dd-date.svg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold fs-3">
                                                Hand Flags
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Perfect for parades</span>
                                        </div>
                                    </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 20], 'prefix' => null, 'plugin' => null]); ?>"
                                       class="d-flex align-items-center pb-9 position-relative">
                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <?= $this->Html->image('svgs/icon-dd-lifebuoy.svg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold fs-3">
                                                Hanging Flags
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Flags for decoration</span>
                                        </div>
                                    </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => ['category' => 21], 'prefix' => null, 'plugin' => null]); ?>"
                                       class="d-flex align-items-center pb-9 position-relative">
                                        <div class="text-bg-light rounded-1 me-3 p-6 d-flex align-items-center justify-content-center">
                                            <?= $this->Html->image('svgs/icon-dd-application.svg', [
                                                'alt' => 'flagmaster-img',
                                                'class' => 'img-fluid',
                                                'width' => '24',
                                                'height' => '24',
                                            ]) ?>
                                        </div>
                                        <div>
                                            <h6 class="mb-1 fw-semibold fs-3">
                                                String Flags
                                            </h6>
                                            <span class="fs-2 d-block text-body-secondary">Perfect for events</span>
                                        </div>
                                    </a>
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="row align-items-center py-3">
                            <div class="col-8">
                                <?= $this->Html->link(
                                    '<i class="ti ti-help fs-6 me-2"></i>Frequently Asked Questions',
                                    ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                                    ['class' => 'fw-semibold d-flex align-items-center lh-1', 'escape' => false]
                                ); ?>
                            </div>
                            <div class="col-4">
                              <div class="d-flex justify-content-end pe-4">
                                <button class="btn btn-primary">Check</button>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-4 ms-n4">
                        <div class="position-relative p-7 border-start h-100">
                          <h5 class="fs-5 mb-9 fw-semibold">Quick Links</h5>
                            <ul class="">
                                <li class="mb-3">
                                    <?= $this->Html->link(
                                        'Australian Flag',
                                        ['controller' => 'Products', 'action' => 'view', 65, 'prefix' => null, 'plugin' => null],
                                        ['class' => 'fw-semibold bg-hover-primary']
                                    ); ?>
                                </li>
                                <li class="mb-3">
                                    <?= $this->Html->link(
                                        'Pirate Skull Flag',
                                        ['controller' => 'Products', 'action' => 'view', 66, 'prefix' => null, 'plugin' => null],
                                        ['class' => 'fw-semibold bg-hover-primary']
                                    ); ?>
                                </li>
                                <li class="mb-3">
                                    <?= $this->Html->link(
                                        'Sunflower Flag',
                                        ['controller' => 'Products', 'action' => 'view', 67, 'prefix' => null, 'plugin' => null],
                                        ['class' => 'fw-semibold bg-hover-primary']
                                    ); ?>
                                </li>
                                <li class="mb-3">
                                    <?= $this->Html->link(
                                        'Switzerland Hand Flag',
                                        ['controller' => 'Products', 'action' => 'view', 68, 'prefix' => null, 'plugin' => null],
                                        ['class' => 'fw-semibold bg-hover-primary']
                                    ); ?>
                                </li>
                            </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!-- ------------------------------- -->
              <!-- end shop Dropdown -->
              <!-- ------------------------------- -->
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'Custom Products',
                      ['controller' => 'CustomFlagEnquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'FAQs',
                      ['controller' => 'Pages', 'action' => 'faq', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
              <li class="nav-item dropdown-hover d-none d-lg-block">
                  <?= $this->Html->link(
                      'About Us',
                      ['controller' => 'Pages', 'action' => 'aboutUs', 'prefix' => null, 'plugin' => null],
                      ['class' => 'nav-link']
                  ); ?>
              </li>
                <li class="nav-item dropdown-hover d-none d-lg-block">
                    <?= $this->Html->link(
                        'Contact Us',
                        ['controller' => 'Enquiries', 'action' => 'add', 'prefix' => null, 'plugin' => null],
                        ['class' => 'nav-link']
                    ); ?>
                </li>
            </ul>
            <div class="d-block d-xl-none">
              <a href="/" class="text-nowrap nav-link">
                  <?= $this->Html->image('logos/dark-logo.svg', [
                      'alt' => 'flagmaster-img',
                      'class' => 'img-fluid',
                      'width' => '180',
                  ]) ?>
              </a>
            </div>
            <a class="navbar-toggler nav-icon-hover-bg rounded-circle p-0 mx-0 border-0" href="javascript:void(0)" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="p-2">
                <i class="ti ti-dots fs-7"></i>
              </span>
            </a>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
              <div class="d-flex align-items-center justify-content-between px-0 px-xl-8">
                <a href="javascript:void(0)" class="nav-link round-40 p-1 ps-0 d-flex d-xl-none align-items-center justify-content-center" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobilenavbar" aria-controls="offcanvasWithBothOptions">
                  <i class="ti ti-align-justified fs-7"></i>
                </a>
                <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-center">
                  <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a class="nav-link moon dark-layout" href="javascript:void(0)">
                      <i class="ti ti-moon moon"></i>
                    </a>
                    <a class="nav-link sun light-layout" href="javascript:void(0)">
                      <i class="ti ti-sun sun"></i>
                    </a>
                  </li>

                  <!-- ------------------------------- -->
                  <!-- start shopping cart Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item nav-icon-hover-bg rounded-circle">
                    <a class="nav-link position-relative" href="javascript:void(0)" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                      <i class="ti ti-basket"></i>
                        <?php if ($cartItemCount > 0) : ?>
                            <span class="popup-badge rounded-pill bg-danger text-white fs-2"><?= $cartItemCount ?></span>
                        <?php endif; ?>
                    </a>
                  </li>
                  <!-- ------------------------------- -->
                  <!-- end shopping cart Dropdown -->
                  <!-- ------------------------------- -->

                  <!-- ------------------------------- -->
                  <!-- start profile Dropdown -->
                  <!-- ------------------------------- -->
                  <li class="nav-item dropdown">
                    <a class="nav-link pe-0" href="javascript:void(0)" id="drop1" aria-expanded="false">
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
                  <!-- ------------------------------- -->
                  <!-- end profile Dropdown -->
                  <!-- ------------------------------- -->
                </ul>
              </div>
            </div>
          </nav>
        </div>
      </header>
