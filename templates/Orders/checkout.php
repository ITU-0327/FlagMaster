<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Checkout</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Checkout</li>
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

<div class="checkout">
    <div class="card">
        <div class="card-body p-4">
            <div class="wizard-content">
                <form action="<?= $this->Url->build(['controller' => 'Orders', 'action' => 'submitOrder']); ?>" method="post" class="tab-wizard wizard-circle">
                    <h6>Cart</h6>
                    <section>
                        <div class="table-responsive">
                            <table class="table align-middle text-nowrap mb-0">
                                <thead class="fs-2">
                                <tr>
                                    <th>Product</th>
                                    <th>Quantity</th>
                                    <th class="text-end">Price</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td class="border-bottom-0">
                                        <div class="d-flex align-items-center gap-3 overflow-hidden">
                                            <?= $this->Html->image('/img/products/Brazil-Flag.png', [
                                                'alt' => h($product->name),
                                                'class' => 'img-fluid rounded',
                                                'width' => '80',
                                            ]) ?>


                                            <div>
                                                <h6 class="fw-semibold fs-4 mb-0"><?= h($product->name) ?></h6>
                                                <p class="mb-0"><?= h($product->description) ?></p>
                                                <a href="javascript:void(0)" class="text-danger fs-4">
                                                    <i class="ti ti-trash"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="border-bottom-0">
                                        <div class="input-group input-group-sm flex-nowrap rounded">
                                            <button class="btn minus min-width-40 py-0 border-end border-muted border-end-0 text-muted" type="button" id="decreaseQty">
                                                <i class="ti ti-minus"></i>
                                            </button>
                                            <input type="number" class="min-width-40 flex-grow-0 border border-muted text-muted fs-3 fw-semibold form-control text-center qty" name="quantity" value="1" id="productQuantity" min="1">
                                            <button class="btn min-width-40 py-0 border border-muted border-start-0 text-muted" type="button" id="increaseQty">
                                                <i class="ti ti-plus"></i>
                                            </button>
                                        </div>
                                    </td>
                                    <td class="text-end border-bottom-0">
                                        <h6 class="fs-4 fw-semibold mb-0">$<span id="productPrice"><?= $this->Number->format($product->price) ?></span></h6>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="order-summary border rounded p-4 my-4">
                            <div class="p-3">
                                <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Sub Total</p>
                                    <h6 class="mb-0 fs-4 fw-semibold">$<span id="subTotal"><?= $this->Number->format($product->price) ?></span></h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                    <h6 class="mb-0 fs-5 fw-semibold">$<span id="totalPrice"><?= $this->Number->format($product->price) ?></span></h6>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- 隐藏字段存储产品ID和价格 -->
                    <input type="hidden" name="product_id" value="<?= $product->id ?>">
                    <input type="hidden" name="price" id="finalPrice" value="<?= $this->Number->format($product->price) ?>">
                    <input type="hidden" name="total" id="totalAmount" value="<?= $this->Number->format($product->price) ?>">

                    <!-- 提交订单按钮 -->
                    <button type="submit" class="btn btn-primary">Submit Order</button>
                </form>
            </div>
        </div>
    </div>
</div>


<?php $this->start('customScript'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('/libs/jquery-steps/build/jquery.steps.min') ?>
<?= $this->Html->script('/libs/jquery-validation/dist/jquery.validate.min') ?>
<?= $this->Html->script('/js/apps/ecommerce') ?>

<script>
    const pricePerUnit = <?= $this->Number->format($product->price) ?>;
    const quantityInput = document.getElementById('productQuantity');
    const subTotalSpan = document.getElementById('subTotal');
    const totalPriceSpan = document.getElementById('totalPrice');
    const finalPriceInput = document.getElementById('finalPrice');
    const totalAmountInput = document.getElementById('totalAmount');

    document.getElementById('increaseQty').addEventListener('click', function() {
        quantityInput.value = parseInt(quantityInput.value) + 1;
        updatePrices();
    });

    document.getElementById('decreaseQty').addEventListener('click', function() {
        if (quantityInput.value > 1) {
            quantityInput.value = parseInt(quantityInput.value) - 1;
            updatePrices();
        }
    });

    function updatePrices() {
        const newQuantity = parseInt(quantityInput.value);
        const newSubTotal = newQuantity * pricePerUnit;
        subTotalSpan.innerText = newSubTotal.toFixed(2);
        totalPriceSpan.innerText = newSubTotal.toFixed(2);
        finalPriceInput.value = newSubTotal.toFixed(2);
        totalAmountInput.value = newSubTotal.toFixed(2);
    }
</script>

<style>
    input[type=number]::-webkit-inner-spin-button,
    input[type=number]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
</style>

<?php $this->end(); ?>
