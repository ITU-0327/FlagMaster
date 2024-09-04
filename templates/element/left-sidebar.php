<aside class="left-sidebar with-vertical">
    <div>
        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
        <div class="brand-logo d-flex align-items-center justify-content-between">
            <a href="/" class="text-nowrap logo-img">
                <?= $this->Html->image('logos/dark-logo.svg', [
                    'alt' => 'Logo-Dark',
                    'class' => 'dark-logo',
                    'width' => '180',
                ]) ?>
                <?= $this->Html->image('logos/light-logo.svg', [
                    'alt' => 'Logo-light',
                    'class' => 'light-logo',
                    'width' => '180',
                ]) ?>
            </a>
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
                        ['controller' => 'Dashboards'],
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
                        ['controller' => 'Products'],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Orders -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-shopping-cart"></i></span><span class="hide-menu">Orders</span>',
                        ['controller' => 'Orders'],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Customers -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-user"></i></span><span class="hide-menu">Customers</span>',
                        ['controller' => 'Users'], // TODO: Change to Customers
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Enquiries -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-message-circle"></i></span><span class="hide-menu">Enquiries</span>',
                        ['controller' => 'Enquiries'],
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
                        ['controller' => 'Products'], // TODO: Change to Stock Management
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>

                <!-- Content Management -->
                <li class="sidebar-item">
                    <?= $this->Html->link(
                        '<span><i class="ti ti-notebook"></i></span><span class="hide-menu">Content Management</span>',
                        ['controller' => 'ContentManagement'],
                        ['class' => 'sidebar-link', 'escape' => false, 'aria-expanded' => 'false']
                    ); ?>
                </li>
            </ul>
        </nav>

        <div class="fixed-profile p-3 mx-4 mb-2 bg-secondary-subtle rounded mt-3">
            <div class="hstack gap-3">
                <div class="john-img">
                    <?= $this->Html->image('profile/user-1.jpg', [
                        'alt' => 'modernize-img',
                        'class' => 'rounded-circle',
                        'width' => 40,
                        'height' => 40,
                    ]) ?>
                </div>
                <div class="john-title">
                    <h6 class="mb-0 fs-4 fw-semibold">Lucas</h6>
                    <span class="fs-2">Owner</span>
                </div>
                <button class="border-0 bg-transparent text-primary ms-auto" tabindex="0" type="button" aria-label="logout" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="logout">
                    <i class="ti ti-power fs-6"></i>
                </button>
            </div>
        </div>

        <!-- ---------------------------------- -->
        <!-- Start Vertical Layout Sidebar -->
        <!-- ---------------------------------- -->
    </div>
</aside>
