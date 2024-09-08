<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->element('title-meta', ['title' => $this->fetch('title')]) ?>
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <?= $this->Html->image('logos/favicon.png', [
        'alt' => 'loader',
        'class' => 'lds-ripple img-fluid',
    ]) ?>
</div>
<div id="main-wrapper">
    <?= $this->element('left-sidebar') ?>

    <!-- Sidebar End -->
    <div class="page-wrapper">
        <?= $this->element('navbar') ?>

        <div class="body-wrapper">
            <div class="container-fluid">
                <?= $this->fetch('content') ?>
            </div>
        </div>

        <?= $this->element('right-sidebar') ?>
    </div>

    <div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content rounded-1">
                <div class="modal-header border-bottom">
                    <input type="search" class="form-control fs-3" placeholder="Search here" id="search" />
                    <a href="javascript:void(0)" data-bs-dismiss="modal" class="lh-1">
                        <i class="ti ti-x fs-5 ms-3"></i>
                    </a>
                </div>
                <div class="modal-body message-body" data-simplebar="">
                    <h5 class="mb-0 fs-5 p-1">Quick Page Links</h5>
                    <ul class="list mb-0 py-2">
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="d-block">Modern</span>
                                <span class="text-muted d-block">/dashboards/dashboard1</span>
                            </a>
                        </li>
                        <li class="p-1 mb-1 bg-hover-light-black">
                            <a href="javascript:void(0)">
                                <span class="d-block">Dashboard</span>
                                <span class="text-muted d-block">/dashboards/dashboard2</span>
                            </a>
                        </li>
                        <!-- Add more links as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header justify-content-between py-4">
            <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
            <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm">5 new</span>
        </div>
        <div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
            <ul class="mb-0">
                <li class="pb-7">
                    <div class="d-flex align-items-center">
                        <?= $this->Html->image('products/product-1.jpg', [
                            'alt' => 'modernize-img',
                            'class' => 'rounded-1 me-9 flex-shrink-0',
                            'width' => '95',
                            'height' => '75',
                        ]) ?>
                        <div>
                            <h6 class="mb-1">Supreme toys cooker</h6>
                            <p class="mb-0 text-muted fs-2">Kitchenware Item</p>
                            <div class="d-flex align-items-center justify-content-between mt-2">
                                <h6 class="fs-2 fw-semibold mb-0 text-muted">$250</h6>
                                <div class="input-group input-group-sm w-50">
                                    <button class="btn border-0 round-20 minus p-0 bg-success-subtle text-success" type="button" id="add1">-</button>
                                    <input type="text" class="form-control round-20 bg-transparent text-muted fs-2 border-0 text-center qty" value="1" />
                                    <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" id="addo2">+</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
                <!-- Add more products as needed -->
            </ul>
            <div class="align-bottom">
                <div class="d-flex align-items-center pb-7">
                    <span class="text-dark fs-3">Sub Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$2530</span>
                    </div>
                </div>
                <div class="d-flex align-items-center pb-7">
                    <span class="text-dark fs-3">Total</span>
                    <div class="ms-auto">
                        <span class="text-dark fw-semibold fs-3">$6830</span>
                    </div>
                </div>
                <a href="ecommerce-checkout" class="btn btn-outline-primary w-100">Go to shopping cart</a>
            </div>
        </div>
    </div>

    <div class="dark-transparent sidebartoggler"></div>

    <?= $this->element('vendor-script') ?>
    <?= $this->fetch('customScript') ?>
    <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
    </script>
</body>
</html>
