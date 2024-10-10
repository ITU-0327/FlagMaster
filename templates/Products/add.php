<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|array<string> $categories
 * @var array<string> $variationTypes
 * @var array<string> $enumValues
 */
?>

<?php $this->start('css'); ?>

<?= $this->Html->css(['/libs/quill/dist/quill.snow']) ?>
<?= $this->Html->css(['/libs/select2/dist/css/select2.min']) ?>
<?= $this->Html->css('dropzone') ?>

<?php $this->end(); ?>


<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Add Product</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Add Product</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'modernize-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?= $this->Form->create($product, ['class' => 'form-horizontal', 'type' => 'file']) ?>
<div class="row">
    <div class="col-lg-8 ">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-7">
                    <h4 class="card-title">General</h4>

                    <button class="navbar-toggler border-0 shadow-none d-md-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                        <i class="ti ti-menu fs-5 d-flex"></i>
                    </button>
                </div>

                <div class="mb-4">
                    <?= $this->Form->label('name', 'Product Name <span class="text-danger">*</span>', ['escape' => false, 'class' => 'form-label']) ?>
                    <?= $this->Form->text('name', ['class' => 'form-control', 'placeholder' => 'Product Name']) ?>
                    <p class="fs-2">A product name is required and recommended to be unique.</p>
                </div>
                <div>
                    <?= $this->Form->label('description', 'Description <span class="text-danger">*</span>', [
                        'escape' => false,
                        'class' => 'form-label',
                    ]) ?>
                    <div id="quill-editor"></div>
                    <?= $this->Form->textarea('description', [
                        'id' => 'descriptionTextarea',
                        'style' => 'display:none;',
                    ]) ?>
                    <p class="fs-2 mb-0">Set a description to the product for better visibility.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Product Images</h4>
                <div class="custom-dropzone" id="product-images-dropzone">
                    <?= $this->Form->file('product_images[]', [
                        'accept' => 'image/*',
                        'multiple' => true,
                        'label' => false,
                        'class' => 'custom-file-input',
                        'id' => 'productImages',
                    ]) ?>
                    <label for="productImages" class="dropzone">
                        <div class="dz-preview" id="product-images-preview">
                            <div class="dz-message">
                                <span>Drag and drop product images here or click to upload.</span>
                            </div>
                        </div>
                    </label>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-7">Pricing</h4>

                <div class="mb-7">
                    <?= $this->Form->label('price', 'Base Price <span class="text-danger">*</span>', ['escape' => false, 'class' => 'form-label']) ?>
                    <?= $this->Form->text('price', ['class' => 'form-control', 'placeholder' => 'Product Price', 'id' => 'basePrice']) ?>
                    <p class="fs-2">Set the product price.</p>
                </div>
                <div class="mb-7">
                    <?= $this->Form->label('discount_type', 'Discount Type', ['class' => 'form-label']) ?>
                    <nav>
                        <div class="nav nav-tabs justify-content-between align-items-center gap-9" id="nav-tab" role="tablist">
                            <label for="radio1" class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer" id="nav-none-tab" data-bs-toggle="tab" data-bs-target="#nav-none" aria-controls="nav-none">
                                <input type="radio" class="form-check-input" name="discount_type" id="radio1" value="none" checked>
                                <span class="fs-4 text-dark">No Discount</span>
                            </label>
                            <label for="radio2" class="form-check-label p-3 form-check border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer" id="nav-percentage-tab"  data-bs-toggle="tab" data-bs-target="#nav-percentage" aria-controls="nav-percentage">
                                <input type="radio" class="form-check-input" name="discount_type" id="radio2" value="percentage">
                                <span class="fs-4 text-dark">Percentage %</span>
                            </label>
                            <label for="radio3" class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer" id="nav-fixed-tab"  data-bs-toggle="tab" data-bs-target="#nav-fixed" aria-controls="nav-fixed">
                                <input type="radio" class="form-check-input" name="discount_type" id="radio3" value="fixed">
                                <span class="fs-4 text-dark">Fixed Price</span>
                            </label>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade mt-7" id="nav-percentage" role="tabpanel" aria-labelledby="nav-percentage-tab" tabindex="0">
                            <div class="form-group">
                                <?= $this->Form->label('discount_value_percentage', 'Set Discount Percentage <span class="text-danger">*</span>', ['escape' => false, 'class' => 'form-label']) ?>
                                <?= $this->Form->input('discount_value_percentage', [
                                    'type' => 'range',
                                    'class' => 'form-range',
                                    'id' => 'discountPercentage',
                                    'min' => 0,
                                    'max' => 100,
                                    'step' => 10,
                                ]) ?>
                                <p class="fs-2">Set a percentage discount to be applied on this product.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade mt-7" id="nav-fixed" role="tabpanel" aria-labelledby="nav-fixed-tab" tabindex="0">
                            <div class="mb-7">
                                <?= $this->Form->label('discount_value', 'Fixed Discounted Price <span class="text-danger">*</span>', ['escape' => false, 'class' => 'form-label']) ?>
                                <?= $this->Form->text('discount_value', [
                                    'class' => 'form-control',
                                    'placeholder' => 'Discounted Price',
                                    'id' => 'discountValue',
                                ]) ?>
                                <p class="fs-2">Set the discounted product price. The product will be reduced at the determined fixed price.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="form-actions mb-5">
            <?= $this->Form->button(__(' Save changes '), ['type' => 'submit', 'class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__(' Cancel '), ['action' => 'index'], ['class' => 'btn bg-danger-subtle text-danger ms-6']) ?>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="offcanvas-md offcanvas-end overflow-auto" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-7">Thumbnail</h4>
                    <div class="custom-dropzone mb-2" id="thumbnail-dropzone">
                        <?= $this->Form->file('thumbnail_url', [
                            'accept' => 'image/*',
                            'label' => false,
                            'class' => 'custom-file-input',
                            'id' => 'thumbnailFile',
                        ]) ?>
                        <label for="thumbnailFile" class="dropzone">
                            <div class="dz-preview" id="thumbnail-preview">
                                <div class="dz-message">
                                    <span>Drag and drop product thumbnail here or click to upload.</span>
                                </div>
                            </div>
                        </label>
                    </div>
                    <p class="fs-2 text-center mb-0">
                        Set the product thumbnail image. Only *.png, *.jpg and *.jpeg image files are accepted.
                    </p>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-center justify-content-between mb-7">
                        <h4 class="card-title">Status</h4>
                        <div class="p-2 h-100 bg-success rounded-circle"></div>
                    </div>
                    <div>
                        <?= $this->Form->select(
                            'status',
                            array_combine(array_map('strtolower', $enumValues), $enumValues),
                            ['class' => 'form-select mr-sm-2 mb-2']
                        ) ?>
                        <p class="fs-2 mb-0">Set the product status.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-7">Product Details</h4>
                    <div class="mb-3">
                        <?= $this->Form->label('categories._ids', 'Categories <span class="text-danger">*</span>', ['class' => 'form-label', 'escape' => false]) ?>
                        <?= $this->Form->select('categories._ids', $categories, ['multiple' => true, 'class' => 'select2 form-control']) ?>
                        <p class="fs-2 mb-0">
                            Add product to a category.
                        </p>
                    </div>
<!--                    TODO: Create New Category-->
                    <?= $this->Html->link(
                        '<span class="fs-4 me-1">+</span>Create New Category',
                        ['controller' => 'Categories', 'action' => 'add'],
                        ['class' => 'btn bg-primary-subtle text-primary', 'escape' => false]
                    ) ?>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-7">Stock Quantity <span class="text-danger">*</span></h4>
                    <div class="mb-3">
                        <?= $this->Form->text('stock_quantity', ['class' => 'form-control', 'placeholder' => 'Stock Quantity']) ?>
                        <p class="fs-2">A product name is required and recommended to be unique.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->Form->end() ?>

<?php $this->start('customScript'); ?>

<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js']) ?>
<?= $this->Html->script(['/libs/quill/dist/quill.min']) ?>
<?= $this->Html->script(['/libs/select2/dist/js/select2.full.min']) ?>
<?= $this->Html->script(['/libs/select2/dist/js/select2.min']) ?>
<?= $this->Html->script(['forms/select2.init']) ?>
<?= $this->Html->script(['/libs/jquery.repeater/jquery.repeater.min']) ?>
<?= $this->Html->script(['/libs/jquery-validation/dist/jquery.validate.min']) ?>
<?= $this->Html->script(['forms/repeater-init']) ?>
<?= $this->Html->script('apps/addProducts') ?>

<?php $this->end(); ?>
