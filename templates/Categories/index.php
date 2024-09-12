<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Category> $categories
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
                    <h4 class="fw-semibold mb-8">Category List</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted text-decoration-none" href="/">Home</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">Categories</li>
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
                    <?= $this->Form->button(__('Add New Category'), [
                        'type' => 'button',
                        'onclick' => "location.href='" . $this->Url->build(['action' => 'add']) . "'",
                        'class' => 'btn btn-primary mb-3',
                    ]) ?>
                </div>
                <div class="table-responsive">
                    <table id="category-list" class="table table-striped table-bordered display text-nowrap">
                        <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th class="actions">Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($categories as $category): ?>
                            <tr>
                                <td><?= $this->Number->format($category->id) ?></td>
                                <td><?= h($category->name) ?></td>
                                <td><?= h($category->created_at) ?></td>
                                <td><?= h($category->updated_at) ?></td>
                                <td>
                                    <div class="dropdown dropstart">
                                        <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton<?= $category->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                            <i class="ti ti-dots fs-5"></i>
                                        </a>
                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $category->id ?>">
                                            <li>
                                                <?= $this->Html->link(
                                                    '<i class="fs-4 ti ti-eye"></i> View',
                                                    ['action' => 'view', $category->id],
                                                    ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]
                                                ) ?>
                                            </li>
                                            <li>
                                                <?= $this->Html->link(
                                                    '<i class="fs-4 ti ti-edit"></i> Edit',
                                                    ['action' => 'edit', $category->id],
                                                    ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]
                                                ) ?>
                                            </li>
                                            <li>
                                                <?= $this->Form->postLink(
                                                    '<i class="fs-4 ti ti-trash"></i> Delete',
                                                    ['action' => 'delete', $category->id],
                                                    [
                                                        'confirm' => __('Are you sure you want to delete {0}?', $category->name),
                                                        'class' => 'dropdown-item d-flex align-items-center gap-3',
                                                        'escape' => false
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
