<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Category $category
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8"><?= __('Edit Category') ?></h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link(__('Home'), '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item">
                            <?= $this->Html->link(__('Categories'), ['action' => 'index'], ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page"><?= __('Edit') ?></li>
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

<div class="card">
    <div class="card-body">
        <?= $this->Form->create($category, ['class' => 'form-horizontal']) ?>
        <fieldset>
            <legend><?= __('Edit Category Details') ?></legend>
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-6">
                    <div class="mb-3">
                        <?= $this->Form->control('name', [
                            'class' => 'form-control',
                            'label' => __('Category Name'),
                            'placeholder' => __('Enter category name'),
                        ]) ?>
                    </div>
                </div>
                <!-- Right Column -->
                <div class="col-lg-12">
                    <div class="mb-3">
                        <?= $this->Form->control('description', [
                            'type' => 'textarea',
                            'class' => 'form-control',
                            'label' => __('Description'),
                            'placeholder' => __('Enter category description'),
                        ]) ?>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="d-flex align-items-center justify-content-between mt-4 gap-6">
            <!-- Save and Cancel Buttons -->
            <div class="d-flex align-items-center gap-2">
                <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn btn-secondary']) ?>
            </div>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
