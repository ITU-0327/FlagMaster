<style>
    /* General Styling */
    .shop-container {
        display: flex;
    }

    .shop-sidebar {
        width: 20%;
        padding: 20px;
        background-color: #f9f9f9;
        border-right: 1px solid #e1e1e1;
    }

    .shop-main {
        width: 80%;
        padding: 20px;
    }

    .page-title {
        font-size: 24px;
        font-weight: bold;
        margin-bottom: 20px;
    }

    .search-input {
        padding: 10px;
        width: 100%;
        margin-bottom: 20px;
    }

    /* Product Grid */
    .product-grid {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
    }

    .product-card {
        width: 30%;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
        transition: transform 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
    }

    .product-image img {
        width: 100%;
        height: auto;
        display: block;
    }

    .product-info {
        padding: 15px;
    }

    .product-name {
        font-size: 18px;
        margin-bottom: 10px;
    }

    .product-price {
        font-size: 16px;
        color: #ff6a00;
    }

    .product-discount {
        color: #999;
        font-size: 14px;
    }

    .product-rating i {
        font-size: 14px;
        color: #ffc107;
    }

    .star-icon {
        font-family: FontAwesome;
        content: "\f005"; /* star icon */
    }

    .star-icon.active {
        color: #ffd700;
    }

    /* Filters Styling */
    .shop-filters {
        margin-bottom: 20px;
    }

    .shop-filters ul {
        list-style: none;
        padding: 0;
    }

    .shop-filters ul li {
        margin-bottom: 10px;
    }

    .shop-filters ul li a {
        color: #333;
        text-decoration: none;
        font-weight: bold;
    }

    .paginator ul {
        list-style: none;
        display: flex;
        gap: 10px;
    }
    .paginator ul li {
        display: inline;
    }
    .paginator p {
        margin-top: 10px;
        color: #666;
    }
</style>

<div class="shop-container">
    <div class="shop-sidebar">
        <!-- Sidebar Filters -->
        <div class="shop-filters">
            <h6>Filter by Category</h6>
            <ul>
                <?php foreach ($categories as $id => $category): ?>
                    <li>
                        <?= $this->Html->link(h($category), ['?' => array_merge($this->request->getQuery(), ['category' => $id])]) ?>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h6>Filter by Price</h6>
            <ul>
                <li><?= $this->Html->link('0-50', ['?' => array_merge($this->request->getQuery(), ['price_range' => '0-50'])]) ?></li>
                <li><?= $this->Html->link('50-100', ['?' => array_merge($this->request->getQuery(), ['price_range' => '50-100'])]) ?></li>
                <li><?= $this->Html->link('100-200', ['?' => array_merge($this->request->getQuery(), ['price_range' => '100-200'])]) ?></li>
                <li><?= $this->Html->link('Over 200', ['?' => array_merge($this->request->getQuery(), ['price_range' => 'over-200'])]) ?></li>
            </ul>
        </div>
        <div class="p-4">
            <a href="javascript:void(0)" class="btn btn-primary w-100">Reset Filters</a>
        </div>
    </div>

    <div class="shop-main">
        <!-- Page Header -->
        <div class="page-header">
            <h4 class="page-title">Shop</h4>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><?= $this->Html->link(__('Home'), '/') ?></li>
                    <li class="breadcrumb-item" aria-current="page">Shop</li>
                </ol>
            </nav>
            <div class="card-body p-4 pb-0">
                <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
            <div class="shop-banner">
                <?= $this->Html->image('breadcrumb/ChatBc.png', ['alt' => 'Shop Banner', 'class' => 'img-fluid mb-n4']) ?>
            </div>
        </div>

        <!-- Search Bar -->
        <div class="d-flex justify-content-between align-items-center gap-6 mb-4">
            <h5 class="fs-5 mb-0">Products</h5>
            <?= $this->Form->create(null, ['type' => 'get']) ?>
            <?= $this->Form->control('search', ['value' => $search, 'label' => false, 'class' => 'form-control search-input', 'placeholder' => 'Search Product']) ?>
            <?= $this->Form->end() ?>
        </div>

        <!-- Product Grid -->
        <div class="product-grid">
            <?php foreach ($products as $product): ?>
                <div class="product-card">
                    <div class="product-image">
                        <?= $this->Html->link(
                            $this->Html->image('/img/products/Brazil-Flag.png' . $product->thumbnail_url, ['alt' => $product->name]),
                            ['action' => 'view', $product->id],
                            ['escape' => false]
                        ) ?>
                    </div>
                    <div class="product-info">
                        <h6 class="product-name"><?= h($product->name) ?></h6>
                        <div class="product-price">
                            $<?= $this->Number->format($product->price) ?>
                            <?php if (!empty($product->discount_value)): ?>
                                <span class="product-discount">
                                    <del>$<?= $this->Number->format($product->price + $product->discount_value) ?></del>
                                </span>
                            <?php endif; ?>
                        </div>
                        <div class="product-rating">
                            <?php for ($i = 0; $i < 5; $i++): ?>
                                <i class="star-icon <?= $i < $product->rating ? 'active' : '' ?>"></i>
                            <?php endfor; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Pagination -->
        <div class="paginator">
            <ul class="pagination">
                <?= $this->Paginator->first('<< ' . __('first')) ?>
                <?= $this->Paginator->prev('< ' . __('previous')) ?>
                <?= $this->Paginator->numbers() ?>
                <?= $this->Paginator->next(__('next') . ' >') ?>
                <?= $this->Paginator->last(__('last') . ' >>') ?>
            </ul>
            <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
        </div>
    </div>
</div>
