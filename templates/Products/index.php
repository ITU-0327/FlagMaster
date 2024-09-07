<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $categories
 * @var iterable<\App\Model\Entity\Product> $products
 */
$sort = $this->request->getQuery('sort', 'newest');
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
                            <a class="text-muted text-decoration-none" href="/">Home</a>
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
                    )?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="card position-relative overflow-hidden">
    <div class="shop-part d-flex w-100">
        <div class="shop-filters flex-shrink-0 border-end d-none d-lg-block">
            <ul class="list-group pt-2 border-bottom rounded-0">
                <h6 class="my-3 mx-4">Filter by Category</h6>
                <li class="list-group-item border-0 p-0 mx-4 mb-2">
                    <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1 <?= empty($this->request->getParam('pass')) ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>">
                        <i class="ti ti-circles fs-5"></i> All
                    </a>
                </li>
                <?php foreach ($categories as $category): ?>
                    <li class="list-group-item border-0 p-0 mx-4 mb-2">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1 <?= ($this->request->getParam('pass.0') == $category->id) ? 'active' : '' ?>" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', $category->id]) ?>">
                            <i class="ti ti-category fs-5"></i> <?= h($category->name) ?>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <ul class="list-group pt-2 border-bottom rounded-0">
                <h6 class="my-3 mx-4">Sort By</h6>
                <li class="list-group-item border-0 p-0 mx-4 mb-2">
                    <?= $this->Html->link(
                        '<i class="ti ti-ad-2 fs-5"></i>Newest',
                        ['controller' => 'Products', 'action' => 'index', '?' => ['sort' => 'newest']],
                        ['escape' => false, 'class' => ($sort === 'newest' ? 'active ' : '') . 'd-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1']
                    ) ?>
                </li>
                <li class="list-group-item border-0 p-0 mx-4 mb-2">
                    <?= $this->Html->link(
                        '<i class="ti ti-sort-descending-2 fs-5"></i> Price: Low-High',
                        ['controller' => 'Products', 'action' => 'index', '?' => ['sort' => 'price_low_high']],
                        ['escape' => false, 'class' => ($sort === 'price_low_high' ? 'active ' : '') . 'd-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1']
                    ) ?>
                </li>
                <li class="list-group-item border-0 p-0 mx-4 mb-2">
                    <?= $this->Html->link(
                        '<i class="ti ti-sort-ascending-2 fs-5"></i>Price: High-Low',
                        ['controller' => 'Products', 'action' => 'index', '?' => ['sort' => 'price_high_low']],
                        ['escape' => false, 'class' => ($sort === 'price_high_low' ? 'active ' : '') . 'd-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1']
                    ) ?>
                </li>
                <li class="list-group-item border-0 p-0 mx-4 mb-2">
                    <?= $this->Html->link(
                        '<i class="ti ti-ad-2 fs-5"></i> Discounted',
                        ['controller' => 'Products', 'action' => 'index', '?' => ['sort' => 'discounted']],
                        ['escape' => false, 'class' => ($sort === 'discounted' ? 'active ' : '') . 'd-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1']
                    ) ?>
                </li>
            </ul>

            <div class="by-pricing border-bottom rounded-0">
                <h6 class="mt-4 mb-3 mx-4 fw-semibold">By Pricing</h6>
                <div class="pb-4 px-4">
                    <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios5" value="option1" checked>
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios5">
                            All
                        </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios6" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios6">
                            0-50
                        </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios7" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios7">
                            50-100
                        </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios8" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios8">
                            100-200
                        </label>
                    </div>
                    <div class="form-check py-2 mb-0">
                        <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios9" value="option1">
                        <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios9">
                            Over 200
                        </label>
                    </div>
                </div>
            </div>
            <div class="p-4">
                <a href="javascript:void(0)" class="btn btn-primary w-100">Reset Filters</a>
            </div>
        </div>
        <div class="card-body p-4 pb-0">
            <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
                <a class="btn btn-primary d-lg-none d-flex" data-bs-toggle="offcanvas" href="#filtercategory" role="button" aria-controls="filtercategory">
                    <i class="ti ti-menu-2 fs-6"></i>
                </a>
                <h5 class="fs-5 mb-0 d-none d-lg-block">Products</h5>
<!--                TODO: Search Bar not working-->
                <form class="position-relative">
                    <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Product">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="row">
                <?php if ($products->isEmpty()): ?>
                    <div class="col-12">
                        <p class="text-center">No products available for this category.</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($products as $product): ?>
                        <div class="col-sm-6 col-xxl-4">
                            <div class="card hover-img overflow-hidden">
                                <div class="position-relative">
                                    <?= $this->Html->link(
                                        $this->Html->image('products/Brazil-Flag.png', ['alt' => h($product->name), 'class' => 'card-img-top']),
                                        ['controller' => 'Products', 'action' => 'view', $product->id],
                                        ['escape' => false]
                                    ) ?>
                                    <a href="javascript:void(0)" class="text-bg-primary rounded-circle p-2 text-white d-inline-flex position-absolute bottom-0 end-0 mb-n3 me-3" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add To Cart">
                                        <i class="ti ti-basket fs-4"></i>
                                    </a>
                                </div>
                                <div class="card-body pt-3 p-4">
                                    <h6 class="fs-4"><?= h($product->name) ?></h6>
                                    <div class="d-flex align-items-center justify-content-between">
                                        <?php if ($product->discount_value): ?>
                                            <h6 class="fs-4 mb-0">$<?= h($this->Number->format($product->discount_value, ['thousands' => ','])) ?>
                                                <span class="ms-2 fw-normal text-muted fs-3">
                                                    <del>$<?= h($this->Number->format($product->price, ['thousands' => ','])) ?></del>
                                                </span>
                                            </h6>
                                        <?php else: ?>
                                            <h6 class="fs-4 mb-0">$<?= h($this->Number->format($product->price, ['thousands' => ','])) ?></h6>
                                        <?php endif; ?>
                                        <ul class="list-unstyled d-flex align-items-center mb-0">
                                            <!-- Assuming a static 5-star rating for now -->
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
        <div class="offcanvas offcanvas-start" tabindex="-1" id="filtercategory" aria-labelledby="filtercategoryLabel">
            <div class="offcanvas-body shop-filters w-100 p-0">
                <ul class="list-group pt-2 border-bottom rounded-0">
                    <h6 class="my-3 mx-4">Filter by Category</h6>
                    <li class="list-group-item border-0 p-0 mx-4 mb-2">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']) ?>">
                            <i class="ti ti-circles fs-5"></i>All
                        </a>
                    </li>
                    <?php foreach ($categories as $category): ?>
                        <li class="list-group-item border-0 p-0 mx-4 mb-2">
                            <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index', $category->id]) ?>">
                                <i class="ti ti-category-icon fs-5"></i><?= h($category->name) ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
                <ul class="list-group pt-2 border-bottom rounded-0">
                    <h6 class="my-3 mx-4">Sort By</h6>
                    <li class="list-group-item border-0 p-0 mx-4 mb-2">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                            <i class="ti ti-ad-2 fs-5"></i>Newest
                        </a>
                    </li>
                    <li class="list-group-item border-0 p-0 mx-4 mb-2">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                            <i class="ti ti-sort-ascending-2 fs-5"></i>Price: High-Low
                        </a>
                    </li>
                    <li class="list-group-item border-0 p-0 mx-4 mb-2">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                            <i class="ti ti-sort-descending-2 fs-5"></i>Price: Low-High
                        </a>
                    </li>
                    <li class="list-group-item border-0 p-0 mx-4 mb-2">
                        <a class="d-flex align-items-center gap-6 list-group-item-action text-dark px-3 py-6 rounded-1" href="javascript:void(0)">
                            <i class="ti ti-ad-2 fs-5"></i>Discounted
                        </a>
                    </li>
                </ul>

                <div class="by-pricing border-bottom rounded-0">
                    <h6 class="mt-4 mb-3 mx-4 fw-semibold">By Pricing</h6>
                    <div class="pb-4 px-4">
                        <div class="form-check py-2 mb-0">
                            <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios14" value="option1" checked>
                            <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios14">
                                All
                            </label>
                        </div>
                        <div class="form-check py-2 mb-0">
                            <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios15" value="option1">
                            <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios15">
                                0-50
                            </label>
                        </div>
                        <div class="form-check py-2 mb-0">
                            <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios16" value="option1">
                            <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios16">
                                50-100
                            </label>
                        </div>
                        <div class="form-check py-2 mb-0">
                            <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios17" value="option1">
                            <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios17">
                                100-200
                            </label>
                        </div>
                        <div class="form-check py-2 mb-0">
                            <input class="form-check-input p-2" type="radio" name="exampleRadios" id="exampleRadios18" value="option1">
                            <label class="form-check-label d-flex align-items-center ps-2" for="exampleRadios18">
                                Over 200
                            </label>
                        </div>
                    </div>
                </div>

                <div class="p-4">
                    <a href="javascript:void(0)" class="btn btn-primary w-100">Reset Filters</a>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->start('customScript'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?php $this->end(); ?>
