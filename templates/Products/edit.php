<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var string[]|\Cake\Collection\CollectionInterface $categories
 * @var string[]|\Cake\Collection\CollectionInterface $orders
 */
?>
<div class="card">
    <div class="card-body">
        <?= $this->Form->create($product, ['class' => 'form-horizontal']) ?>
        <fieldset>
            <legend><?= __('Edit Product Details') ?></legend>
            <div class="row">
                <div class="col-lg-6">
                    <div class="mb-3">
                        <?= $this->Form->control('name', ['class' => 'form-control', 'label' => 'Product Name', 'placeholder' => 'Enter product name']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('price', ['class' => 'form-control', 'label' => 'Price', 'placeholder' => 'Enter product price']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('discount_type', ['class' => 'form-select', 'label' => 'Discount Type']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('stock_quantity', ['class' => 'form-control', 'label' => 'Stock Quantity', 'placeholder' => 'Enter stock quantity']) ?>
                    </div>
                    <div class="mb-3">
                        <!-- Moving Categories here right after Stock Quantity -->
                        <?= $this->Form->control('categories._ids', ['options' => $categories, 'class' => 'form-select', 'label' => 'Categories']) ?>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="mb-3">
                        <?= $this->Form->control('description', ['type' => 'textarea', 'class' => 'form-control', 'label' => 'Description', 'placeholder' => 'Enter product description']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('discount_value', ['class' => 'form-control', 'label' => 'Discount Value']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('thumbnail_url', ['class' => 'form-control', 'label' => 'Thumbnail URL', 'placeholder' => 'Enter image URL']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('status', ['class' => 'form-select', 'label' => 'Product Status']) ?>
                    </div>
                    <div class="mb-3">
                        <?= $this->Form->control('orders._ids', [
                            'options' => $orders,
                            'class' => 'form-select',
                            'label' => 'Orders',
                            'multiple' => false,
                            'empty' => 'Select an Order',
                        ]) ?>
                    </div>
                </div>
            </div>
        </fieldset>

        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
            <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel'), ['action' => 'index'], ['class' => 'btn bg-danger-subtle text-danger']) ?>
        </div>

        <?= $this->Form->end() ?>
    </div>
</div>
