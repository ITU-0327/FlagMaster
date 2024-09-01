<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var \Cake\Collection\CollectionInterface|string[] $categories
 */
?>

<?php $this->start('css'); ?>

<?= $this->Html->css(['/assets/libs/quill/dist/quill.snow']) ?>
<?= $this->Html->css(['/assets/libs/dropzone/dist/min/dropzone.min']) ?>
<?= $this->Html->css(['/assets/libs/select2/dist/css/select2.min']) ?>

<?php $this->end(); ?>


<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Add Product</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
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

<?= $this->Form->create($product, ['class' => 'form-horizontal']) ?>
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
                    <?= $this->Form->label('description', 'Description', ['class' => 'form-label']) ?>
                    <div id="editor"></div>
                    <?= $this->Form->hidden('description', ['id' => 'descriptionHidden']) ?>
                    <p class="fs-2 mb-0">Set a description to the product for better visibility.</p>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-7">Media</h4>
<!--            TODO: May need to adjust this section if the dropzone requires specific form handling -->
                <div class="dropzone dz-clickable mb-2">
                    <div class="dz-default dz-message">
                        <button class="dz-button" type="button">Drop files here to upload</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-7">Variation</h4>

                <label class="form-label">Add Product Variations</label>
                <div id="variation_fields" class="mb-3">
                    <!-- Existing variation fields will be placed here -->
                    <div class="row mb-3 variation-row">
                        <div class="col-md-4">
                            <?php /** @var string[] $variationTypes */ ?>
                            <?= $this->Form->select('product_variations[0][variation_type]',
                                array_combine(array_map('strtolower', $variationTypes), $variationTypes),
                                ['class' => 'select2 form-control', 'data-placeholder' => 'Select Variation Type']) ?>
                        </div>
                        <div class="col-md-4 mt-3 mt-md-0">
                            <?= $this->Form->text('product_variations[0][variation_value]', [
                                'class' => 'form-control',
                                'placeholder' => 'Variation Value'
                            ]) ?>
                        </div>
                        <div class="col-md-2 mt-3 mt-md-0">
                            <button class="btn bg-danger-subtle text-danger remove-variation" type="button">
                                <i class="ti ti-x fs-5 d-flex"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <button type="button" id="add_variation" class="btn bg-primary-subtle text-primary " >
                    <span class="fs-4 me-1">+</span>
                    Add another variation
                </button>
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
                            <label for="radio1" class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer" id="customControlValidation2" id="nav-none-tab" data-bs-toggle="tab" data-bs-target="#nav-none" aria-controls="nav-none">
                                <input type="radio" class="form-check-input" name="discount_type" id="radio1" value="none" checked>
                                <span class="fs-4 text-dark">No Discount</span>
                            </label>
                            <label for="radio2" class="form-check-label p-3 form-check border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer" id="customControlValidation2" id="nav-percentage-tab"  data-bs-toggle="tab" data-bs-target="#nav-percentage" aria-controls="nav-percentage">
                                <input type="radio" class="form-check-input" name="discount_type" id="radio2" value="percentage">
                                <span class="fs-4 text-dark">Percentage %</span>
                            </label>
                            <label for="radio3" class="form-check-label form-check p-3 border gap-2 rounded-2 d-flex flex-fill justify-content-center cursor-pointer" id="customControlValidation2" id="nav-fixed-tab"  data-bs-toggle="tab" data-bs-target="#nav-fixed" aria-controls="nav-fixed">
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
                                    'step' => 10
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
                                    'id' => 'discountValue'
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
<!--                TODO: May need to adjust this section if the dropzone requires specific form handling -->
                    <div class="dropzone dz-clickable mb-2">
                        <div class="dz-default dz-message">
                            <button class="dz-button" type="button">Drop Thumbnail here to upload</button>
                        </div>
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
                        <?php /** @var string[] $enumValues */ ?>
                        <?= $this->Form->select('status',
                            array_combine(array_map('strtolower', $enumValues), $enumValues),
                            ['class' => 'form-select mr-sm-2 mb-2']) ?>
                        <p class="fs-2 mb-0">Set the product status.</p>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title mb-7">Product Details</h4>
                    <div class="mb-3">
                        <?= $this->Form->label('categories._ids', 'Categories', ['class' => 'form-label']) ?>
                        <?= $this->Form->select('categories._ids', $categories, ['multiple' => true, 'class' => 'select2 form-control']) ?>
                        <p class="fs-2 mb-0">
                            Add product to a category.
                        </p>
                    </div>
<!--                    TODO: Create New Category-->
                    <button type="button" class="btn bg-primary-subtle text-primary ">
                        <span class="fs-4 me-1">+</span>
                        Create New Category
                    </button>
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
<?= $this->Html->script(['/assets/libs/quill/dist/quill.min']) ?>
<?= $this->Html->script(['/assets/js/forms/quill-init']) ?>
<?= $this->Html->script(['/assets/libs/dropzone/dist/min/dropzone.min']) ?>
<?= $this->Html->script(['/assets/libs/select2/dist/js/select2.full.min']) ?>
<?= $this->Html->script(['/assets/libs/select2/dist/js/select2.min']) ?>
<?= $this->Html->script(['/assets/js/forms/select2.init']) ?>
<?= $this->Html->script(['/assets/libs/jquery.repeater/jquery.repeater.min']) ?>
<?= $this->Html->script(['/assets/libs/jquery-validation/dist/jquery.validate.min']) ?>
<?= $this->Html->script(['/assets/js/forms/repeater-init']) ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const basePriceInput = document.getElementById('basePrice');
        const discountPercentageInput = document.getElementById('discountPercentage');
        const discountValueInput = document.getElementById('discountValue');
        const discountTypeRadios = document.querySelectorAll('input[name="discount_type"]');

        function calculateDiscountedPrice() {
            const basePrice = parseFloat(basePriceInput.value) || 0;
            const discountPercentage = parseFloat(discountPercentageInput.value) || 0;
            const discountedPrice = basePrice - (basePrice * (discountPercentage / 100));
            discountValueInput.value = discountedPrice.toFixed(2);
        }

        function handleDiscountTypeChange() {
            const selectedDiscountType = document.querySelector('input[name="discount_type"]:checked').value;

            if (selectedDiscountType === 'none') {
                // If no discount is selected, clear the discount value or set it to the base price
                discountValueInput.value = '';
            } else if (selectedDiscountType === 'percentage') {
                // Calculate discount based on percentage
                calculateDiscountedPrice();
            }
        }

        // Event listener for when the discount type changes
        discountTypeRadios.forEach(function(radio) {
            radio.addEventListener('change', function() {
                handleDiscountTypeChange();
            });
        });

        // Also calculate discount when the percentage or base price changes
        discountPercentageInput.addEventListener('input', function () {
            if (document.querySelector('input[name="discount_type"]:checked').value === 'percentage') {
                calculateDiscountedPrice();
            }
        });

        basePriceInput.addEventListener('input', function () {
            handleDiscountTypeChange();
        });

        // Initialize the discount value on page load
        handleDiscountTypeChange();
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const quill = window.quill;

        const descriptionHidden = document.getElementById('descriptionHidden');
        const form = document.querySelector('form');

        // On form submit, copy the editor content to the hidden field
        form.onsubmit = function() {
             // Get the HTML content from Quill
            descriptionHidden.value = quill.root.innerHTML; // Assign the content to the hidden field
        };
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        let variationIndex = 1;

        function initializeSelect2() {
            $('.select2').select2({
                width: 'resolve'
            });
        }

        initializeSelect2();

        // Function to add a new variation row
        $('#add_variation').on('click', function () {
            const newVariationRow = $(`
            <div class="row mb-3 variation-row" style="display:none;">
                <div class="col-md-4">
                    <select name="product_variations[${variationIndex}][variation_type]" class="select2 form-control" data-placeholder="Select Variation Type">
                        <?php foreach ($variationTypes as $type): ?>
                            <option value="<?= strtolower($type) ?>"><?= $type ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-4 mt-3 mt-md-0">
                    <input type="text" name="product_variations[${variationIndex}][variation_value]" class="form-control" placeholder="Variation Value">
                </div>
                <div class="col-md-2 mt-3 mt-md-0">
                    <button class="btn bg-danger-subtle text-danger remove-variation" type="button">
                        <i class="ti ti-x fs-5 d-flex"></i>
                    </button>
                </div>
            </div>
        `);

            $('#variation_fields').append(newVariationRow);
            initializeSelect2();

            newVariationRow.slideDown();

            variationIndex++;
        });

        // Function to remove a variation row with confirmation
        $(document).on('click', '.remove-variation', function () {
            const $row = $(this).closest('.variation-row');

            if (confirm("Are you sure you want to remove this item?")) {
                $row.slideUp(function() {
                    $row.remove();
                });
            }
        });
    });

</script>

<?php $this->end(); ?>
