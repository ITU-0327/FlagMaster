<?php
/**
 * @var \App\View\AppView $this
 */

$userInfo = $this->User->getUserInfo();
extract($userInfo);
?>

<aside class="left-sidebar with-vertical">
    <div>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <?= $this->Html->link(
                $this->Html->image('logos/dark-logo.svg', [
                    'alt' => 'Logo-Dark',
                    'class' => 'dark-logo',
                    'width' => '180',
                ]) .
                $this->Html->image('logos/light-logo.svg', [
                    'alt' => 'Logo-light',
                    'class' => 'light-logo',
                    'width' => '180',
                ]),
                ['controller' => 'Pages', 'action' => 'display', 'home', 'prefix' => null, 'plugin' => null],
                ['class' => 'text-nowrap logo-img', 'escape' => false]
            ) ?>
            <a href="javascript:void(0)" class="sidebartoggler ms-auto text-decoration-none fs-5 d-block d-xl-none">
                <i class="ti ti-x"></i>
            </a>
        </div>

        <nav class="sidebar-nav scroll-sidebar" data-simplebar>
            <ul id="sidebarnav">
                <!-- ---------------------------------- -->
                <!-- Home -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>

                <!-- Dashboard -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-aperture"></i></span><span class="hide-menu">Dashboard</span>',
                        ['controller' => 'Dashboards', 'action' => 'index', 'prefix' => null, 'plugin' => null],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- ---------------------------------- -->
                <!-- Management Section (Admin Pages) -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Management</span>
                </li>

                <!-- Products -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-box"></i></span><span class="hide-menu">Products</span>',
                        ['controller' => 'Products', 'action' => 'list', 'prefix' => null, 'plugin' => null],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Orders -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-shopping-cart"></i></span><span class="hide-menu">Orders</span>',
                        ['controller' => 'Orders', 'action' => 'index', 'prefix' => null, 'plugin' => null],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Customers -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-user"></i></span><span class="hide-menu">Customers</span>',
                        ['controller' => 'Users', 'action' => 'index', 'prefix' => null, 'plugin' => null], // TODO: Change to Customers
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Enquiries -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-message-circle"></i></span><span class="hide-menu">Enquiries</span>',
                        ['controller' => 'Enquiries', 'action' => 'index', 'prefix' => null, 'plugin' => null],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- ---------------------------------- -->
                <!-- Apps Section -->
                <!-- ---------------------------------- -->
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Apps</span>
                </li>

                <!-- Stock Management -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-box-seam"></i></span><span class="hide-menu">Stock Management</span>',
                        ['controller' => 'Products', 'action' => 'list', 'prefix' => null, 'plugin' => null], // TODO: Change to Stock Management
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Content Management -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-notebook"></i></span><span class="hide-menu">Content Management</span>',
                        ['plugin' => 'ContentBlocks', 'controller' => 'ContentBlocks', 'action' => 'index'],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>
            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <?= $this->Html->image($profilePicture, [
                        'alt' => 'Profile Picture',
                        'class' => 'rounded-circle',
                        'width' => 40,
                        'height' => 40,
                    ]) ?>
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold"><?= $fullName ?></h6>
                    <span class="fs-2">@<?= $username ?></span>
                </div>
                <?= $this->Form->postLink(
                    '<i class="ti ti-power fs-6"></i>',
                    ['controller' => 'Auth', 'action' => 'logout'],
                    [
                        'escape' => false,
                        'class' => 'border-0 bg-transparent text-primary ms-auto',
                        'tabindex' => '0',
                        'aria-label' => 'Logout',
                        'data-bs-toggle' => 'tooltip',
                        'data-bs-placement' => 'top',
                        'title' => 'Logout',
                    ]
                ); ?>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>
