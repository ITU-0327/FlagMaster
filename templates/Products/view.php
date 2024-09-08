<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Product Detail</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Product Detail</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'flagmaster-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="shop-detail">
    <div class="card shadow-none border">
        <div class="card-body p-4">
            <div class="row">
                <div class="col-lg-6">
                    <div id="sync1" class="owl-carousel owl-theme" style="width: 100%; height: 400px; overflow: hidden;">
                        <?= $this->Html->link(
                            $this->Html->image('/img/products/Brazil-Flag.png' . $product->thumbnail_url, ['alt' => $product->name]),
                            ['action' => 'view', $product->id],
                            ['escape' => false]
                        ) ?>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="shop-content">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <span class="badge text-bg-success fs-2 fw-semibold">In Stock</span>
                            <span class="fs-2"><?= h($product->name) ?></span>
                        </div>
                        <h4><?= h($product->name) ?></h4>
                        <p class="mb-3"><?= h($product->description) ?></p>
                        <h4 class="mb-3">
                            <del class="fs-5 text-muted">$<?= $this->Number->format($product->price * 1.1) ?></del>
                            $<?= $this->Number->format($product->price) ?>
                        </h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-none border">
    <div class="card-body p-4">
        <h4 class="fs-5 mb-7"><?= __('Product Details') ?></h4>
        <table class="table table-bordered">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($product->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Price') ?></th>
                <td><?= $this->Number->format($product->price) ?></td>
            </tr>
            <tr>
                <th><?= __('Discount Type') ?></th>
                <td><?= h($product->discount_type) ?></td>
            </tr>
            <tr>
                <th><?= __('Discount Value') ?></th>
                <td><?= $product->discount_value ?></td>
            </tr>
            <tr>
                <th><?= __('Stock Quantity') ?></th>
                <td><?= $this->Number->format($product->stock_quantity) ?></td>
            </tr>
            <tr>
                <th><?= __('Thumbnail URL') ?></th>
                <td><?= h($product->thumbnail_url) ?></td>
            </tr>
            <tr>
                <th><?= __('Status') ?></th>
                <td><?= h($product->status) ?></td>
            </tr>
            <tr>
                <th><?= __('Created At') ?></th>
                <td><?= h($product->created_at) ?></td>
            </tr>
            <tr>
                <th><?= __('Updated At') ?></th>
                <td><?= h($product->updated_at) ?></td>
            </tr>
        </table>
    </div>
</div>
