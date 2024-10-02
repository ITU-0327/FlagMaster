<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 */
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8"><?= h($category->name) ?></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link(__('Home'), '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item">
                            <?= $this->Html->link(__('Categories'), ['action' => 'index'], ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= h($category->name) ?></li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'category-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="d-flex justify-content-between align-items-center gap-6 mb-4">
    <div>
        <?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id], ['class' => 'btn btn-primary']) ?>
        <?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], [
            'confirm' => __('Are you sure you want to delete {0}?', $category->name),
            'class' => 'btn bg-danger-subtle text-danger',
        ]) ?>
    </div>
    <div>
        <?= $this->Html->link(__('List Categories'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
        <?= $this->Html->link(__('New Category'), ['action' => 'add'], ['class' => 'btn btn-success']) ?>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h5 class="card-title"><?= __('Category Details') ?></h5>
        <table class="table table-bordered">
            <tr>
                <th><?= __('Name') ?></th>
                <td><?= h($category->name) ?></td>
            </tr>
            <tr>
                <th><?= __('Description') ?></th>
                <td><?= h($category->description) ?></td>
            </tr>
            <tr>
                <th><?= __('Created At') ?></th>
                <td><?= h($category->created_at) ?></td>
            </tr>
            <tr>
                <th><?= __('Updated At') ?></th>
                <td><?= h($category->updated_at) ?></td>
            </tr>
        </table>
    </div>
</div>

<?php if (!empty($category->products)) : ?>
    <div class="card mt-4">
        <div class="card-body">
            <h5 class="card-title"><?= __('Related Products') ?></h5>
            <div class="table-responsive">
                <table id="related-products" class="table table-striped table-bordered display text-nowrap">
                    <thead>
                    <tr>
                        <th><?= __('Id') ?></th>
                        <th><?= __('Name') ?></th>
                        <th><?= __('Price') ?></th>
                        <th><?= __('Stock Quantity') ?></th>
                        <th><?= __('Status') ?></th>
                        <th class="actions"><?= __('Actions') ?></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($category->products as $product) : ?>
                        <tr>
                            <td><?= h($product->id) ?></td>
                            <td><?= h($product->name) ?></td>
                            <td><?= $this->Number->format($product->price) ?></td>
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
                                                '<i class="fs-4 ti ti-eye"></i> ' . __('View'),
                                                ['controller' => 'Products', 'action' => 'view', $product->id],
                                                ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]
                                            ) ?>
                                        </li>
                                        <li>
                                            <?= $this->Html->link(
                                                '<i class="fs-4 ti ti-edit"></i> ' . __('Edit'),
                                                ['controller' => 'Products', 'action' => 'edit', $product->id],
                                                ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]
                                            ) ?>
                                        </li>
                                        <li>
                                            <?= $this->Form->postLink(
                                                '<i class="fs-4 ti ti-trash"></i> ' . __('Delete'),
                                                ['controller' => 'Products', 'action' => 'delete', $product->id],
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
<?php endif; ?>

<?php
$this->start('customScript'); ?>
<?= $this->Html->script(['/libs/datatables.net/js/jquery.dataTables.min']) ?>
<?= $this->Html->script('datatable/datatable.init') ?>
<?php $this->end(); ?>
