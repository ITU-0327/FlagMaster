<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $categories
 * @var iterable<\App\Model\Entity\Product> $products
 */
$sort = $this->request->getQuery('sort', 'newest');
$categoryId = $this->request->getQuery('category', 'all');
$priceFilter = $this->request->getQuery('price_filter', 'all');
?>

<?php $this->start('css'); ?>

<?= $this->Html->css(['sorting-filters']) ?>

<?php $this->end(); ?>


<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Shop</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Shop</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image(
                        'breadcrumb/ChatBc.png',
                        ['alt' => 'flagmaster-img', 'class' => 'img-fluid mb-n4']
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card position-relative overflow-hidden">
    <div class="shop-part d-flex w-100">
        <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block">
            <div class="mb-3">
                <h6 class="my-3 mx-4">Filter by Category</h6>
                <select class="form-select list-group-item-action text-dark mx-4 mb-2" style="width: 200px;" onchange="location.href=this.value;">
                    <option value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => array_diff_key($this->request->getQueryParams(), ['category' => ''])]) ?>">
                        <?= __('All') ?>
                    </option>
                    <?php foreach ($categories as $category) : ?>
                        <option value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => array_merge($this->request->getQueryParams(), ['category' => $category->id])]) ?>" <?= $categoryId == $category->id ? 'selected' : '' ?>>
                            <?= h($category->name) ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="mb-3">
                <h6 class="my-3 mx-4">Sort By</h6>
                <select class="form-select list-group-item-action text-dark mx-4 mb-2" style="width: 200px;" onchange="location.href=this.value;">
                    <option value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => array_merge($this->request->getQueryParams(), ['sort' => 'newest'])]) ?>" <?= $sort === 'newest' ? 'selected' : '' ?>>
                        <?= __('Newest') ?>
                    </option>
                    <option value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => array_merge($this->request->getQueryParams(), ['sort' => 'price_low_high'])]) ?>" <?= $sort === 'price_low_high' ? 'selected' : '' ?>>
                        <?= __('Price: Low-High') ?>
                    </option>
                    <option value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => array_merge($this->request->getQueryParams(), ['sort' => 'price_high_low'])]) ?>" <?= $sort === 'price_high_low' ? 'selected' : '' ?>>
                        <?= __('Price: High-Low') ?>
                    </option>
                    <option value="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', '?' => array_merge($this->request->getQueryParams(), ['sort' => 'discounted'])]) ?>" <?= $sort === 'discounted' ? 'selected' : '' ?>>
                        <?= __('Discounted') ?>
                    </option>
                </select>
            </div>

            <div class="by-pricing border-bottom rounded-0">
                <h6 class="mt-4 mb-3 mx-4 fw-semibold">By Pricing</h6>
                <form id="pricingFilterForm" method="get" action="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>">
                    <?php foreach ($this->request->getQueryParams() as $param => $value) : ?>
                        <?php if ($param !== 'price_filter') : ?>
                            <input type="hidden" name="<?= h($param) ?>" value="<?= h($value) ?>">
                        <?php endif; ?>
                    <?php endforeach; ?>
                    <select class="form-select mx-4 mb-2" style="width: 200px;" name="price_filter" onchange="document.getElementById('pricingFilterForm').submit();">
                        <option value="all" <?= $priceFilter === 'all' ? 'selected' : '' ?>>All</option>
                        <option value="0-50" <?= $priceFilter === '0-50' ? 'selected' : '' ?>>0-50</option>
                        <option value="50-100" <?= $priceFilter === '50-100' ? 'selected' : '' ?>>50-100</option>
                        <option value="100-200" <?= $priceFilter === '100-200' ? 'selected' : '' ?>>100-200</option>
                        <option value="over_200" <?= $priceFilter === 'over_200' ? 'selected' : '' ?>>Over 200</option>
                    </select>
                </form>
            </div>

            <div class="p-4">
                <?= $this->Html->link(
                    'Reset Filters',
                    ['controller' => 'Products', 'action' => 'index'],
                    ['class' => 'btn btn-primary w-100']
                ) ?>
            </div>
        </div>
        <div class="card-body p-4 pb-0">
            <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
                <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" role="button" aria-controls="filtercategory">
                    <i class="ti ti-menu-2 fs-6"></i>
                </a>
                <h5 class="fs-5 mb-0 d-none d-lg-block">Products</h5>

                <form class="position-relative" method="get" action="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" name="q" value="<?= h($this->request->getQuery('q')) ?>" placeholder="Search Product">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="row">
                <?php if ($products->isEmpty()) : ?>
                    <div class="col-12">
                        <p class="text-center">No products available for this category.</p>
                    </div>
                <?php else : ?>
                    <?php foreach ($products as $product) : ?>
                        <div class="col-sm-6 col-xxl-4">
                            <div class="card hover-img overflow-hidden">
                                <div class="position-relative">
                                    <?php if ($product->thumbnail_url) : ?>
                                        <?= $this->Html->link(
                                            $this->Html->image($product->thumbnail_url, ['alt' => h($product->name), 'class' => 'card-img-top']),
                                            ['controller' => 'Products', 'action' => 'view', $product->id],
                                            ['escape' => false]
                                        ) ?>
                                    <?php else : ?>
                                        <?= $this->Html->link(
                                            $this->Html->image('products/Brazil-Flag.png', ['alt' => h($product->name), 'class' => 'card-img-top']),
                                            ['controller' => 'Products', 'action' => 'view', $product->id],
                                            ['escape' => false]
                                        ) ?>
                                    <?php endif; ?>
                                    <a href="javascript:void(0)" class="add-to-cart-button text-bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart" data-product-id="<?= $product->id ?>">
                                        <i class="ti ti-basket fs-4"></i>
                                    </a>
                                </div>
                                <div class="card-body pt-3 p-4">
                                    <h6 class="fs-4"><?= h($product->name) ?></h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <?php if ($product->discount_value) : ?>
                                            <h6 class="fs-4 mb-0">$<?= h($this->Number->format($product->discount_value, ['thousands' => ','])) ?>
                                                <span class="ms-2 fw-normal text-muted fs-3">
                                                    <del>$<?= h($this->Number->format($product->price, ['thousands' => ','])) ?></del>
                                                </span>
                                            </h6>
                                        <?php else : ?>
                                            <h6 class="fs-4 mb-0">$<?= h($this->Number->format($product->price, ['thousands' => ','])) ?></h6>
                                        <?php endif; ?>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                                            <li><a class="me-1" href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                                            <li><a href="javascript:void(0)"><i class="ti ti-star text-warning"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.add-to-cart-button').forEach(function(button) {
            button.addEventListener('click', function(event) {
                event.preventDefault();
                const productId = this.getAttribute('data-product-id');

                // Send AJAX request to add product to cart
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= $this->Url->build(['controller' => 'Products', 'action' => 'addToCart']); ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-Token', '<?= $this->request->getAttribute('csrfToken') ?>');

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status === 200) {
                            const response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                // Update cart item count in navbar
                                const cartItemCountElements = document.querySelectorAll('.popup-badge');
                                if (cartItemCountElements.length > 0) {
                                    // Update each badge's text content
                                    cartItemCountElements.forEach(function(badge) {
                                        badge.textContent = response.cartItemCount;
                                    });
                                } else {
                                    // Create badge if it doesn't exist
                                    const navLinks = document.querySelectorAll('.nav-link[data-bs-target="#offcanvasRight"]');
                                    if (navLinks.length > 0) {
                                        navLinks.forEach(navLink => {
                                            let existingBadge = navLink.querySelector('.popup-badge');
                                            if (!existingBadge) {
                                                // Only create and append the badge if it doesn't exist
                                                const badge = document.createElement('span');
                                                badge.className = 'popup-badge rounded-pill bg-danger text-white fs-2';
                                                badge.textContent = response.cartItemCount;
                                                navLink.appendChild(badge);
                                            }
                                        });
                                    }
                                }

                                // Fetch updated cart sidebar content
                                const xhr2 = new XMLHttpRequest();
                                xhr2.open('GET', '<?= $this->Url->build(['controller' => 'Orders', 'action' => 'getCartSidebar']); ?>', true);
                                xhr2.setRequestHeader('X-CSRF-Token', '<?= $this->request->getAttribute('csrfToken') ?>');

                                xhr2.onreadystatechange = function() {
                                    if (xhr2.readyState === XMLHttpRequest.DONE) {
                                        if (xhr2.status === 200) {
                                            // Update the cart sidebar content
                                            const cartSidebar = document.getElementById('offcanvasRight');
                                            if (cartSidebar) {
                                                cartSidebar.innerHTML = xhr2.responseText;
                                            }
                                        } else {
                                            console.error('Failed to fetch cart sidebar content');
                                        }
                                    }
                                };

                                xhr2.send();
                            } else {
                                alert(response.message || 'Failed to add product to cart.');
                            }
                        } else {
                            alert('An error occurred while adding the product to the cart.');
                        }
                    }
                };

                xhr.send('product_id=' + encodeURIComponent(productId) + '&quantity=1');
            });
        });
    });
</script>

<?php $this->end(); ?>
