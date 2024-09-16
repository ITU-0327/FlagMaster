<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Product> $products
 */
?>

<?php
$this->start('css'); ?>
<?= $this->Html->css(['/libs/datatables.net-bs5/css/dataTables.bootstrap5.min']) ?>
<?php $this->end(); ?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Product List</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Products</li>
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

<div class="datatables">
    <div class="card">
        <div class="card-body p-3">
            <div class="d-flex justify-content-between align-items-center gap-6 mb-9">
                <?= $this->Form->button(__('Add New Product'), [
                    'type' => 'button',
                    'onclick' => "location.href='" . $this->Url->build(['action' => 'add']) . "'",
                    'class' => 'btn btn-primary mb-3',
                ]) ?>
            </div>
            <div class="table-responsive">
                <table id="product-list" class="table table-striped table-bordered display text-nowrap">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Original Price</th>
                            <th>Discount Type</th>
                            <th>Discounted Price</th>
                            <th>Stock Quantity</th>
                            <th>Status</th>
                            <th class="actions">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $product) : ?>
                        <tr>
                            <td><?= $this->Number->format($product->id) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= $this->Number->format($product->price) ?></td>
                            <td><?= h($product->discount_type) ?></td>
                            <td><?= $product->discount_value === null ? '' : $this->Number->format($product->discount_value) ?></td>
                            <td><?= $this->Number->format($product->stock_quantity) ?></td>
                            <td><?= h($product->status) ?></td>
                            <td>
                                <div class="dropdown dropstart">
                                    <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton<?= $product->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="ti ti-dots fs-5"></i>
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $product->id ?>">
                                        <li>
                                            <?= $this->Html->link(
                                                '<i class="fs-4 ti ti-eye"></i> View',
                                                ['action' => 'view', $product->id],
                                                ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]
                                            ) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(
                                                '<i class="fs-4 ti ti-edit"></i> Edit',
                                                ['action' => 'edit', $product->id],
                                                ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]
                                            ) ?>
                                        </li>
                                        <li>
                                            <?= $this->Form->postLink(
                                                '<i class="fs-4 ti ti-trash"></i> Delete',
                                                ['action' => 'delete', $product->id],
                                                [
                                                    'confirm' => __('Are you sure you want to delete {0}?', $product->name),
                                                    'class' => 'dropdown-item d-flex align-items-center gap-3',
                                                    'escape' => false,
                                                ]
                                            ) ?>
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$this->start('customScript'); ?>
<?= $this->Html->script(['/libs/datatables.net/js/jquery.dataTables.min']) ?>
<?= $this->Html->script('datatable/datatable.init') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?php $this->end(); ?>
