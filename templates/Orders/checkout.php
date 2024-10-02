<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Product $product
 * @var int $quantity
 */
?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Checkout</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">checkout</li>
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
                <form action="#" class="tab-wizard wizard-circle">
                    <!-- Step 1: Cart -->
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
                                            <?= $this->Html->image(h($product->thumbnail_url), [
                                                'alt' => h($product->name),
                                                'class' => 'img-fluid rounded',
                                                'width' => '80',
                                            ]) ?>

                                            <div>
                                                <h6 class="fw-semibold fs-4 mb-0"><?= h($product->name) ?></h6>
                                            </div>
                                        </div>
                                    </td>
                                    <!-- quantity button-->
                                    <td class="border-bottom-0">
                                        <div class="input-group input-group-sm flex-nowrap rounded">
                                            <button class="btn minus min-width-40 py-0 border-end border-muted text-muted" type="button" onclick="decreaseQuantity()">
                                                <i class="ti ti-minus"></i>
                                            </button>

                                            <?= $this->Form->control('quantity', [
                                                'type' => 'text',
                                                'class' => 'min-width-40 flex-grow-0 border border-muted text-muted fs-3 fw-semibold form-control text-center qty',
                                                'id' => 'quantityInput',
                                                'value' => $quantity,
                                                'label' => false,
                                            ]) ?>

                                            <button class="btn min-width-40 py-0 border-start border-muted text-muted" type="button" onclick="increaseQuantity()">
                                                <i class="ti ti-plus"></i>
                                            </button>
                                        </div>
                                    </td>

                                    <td class="text-end border-bottom-0">
                                        <h6 id="productPrice" class="fs-4 fw-semibold mb-0">$<?= $this->Number->format($product->price) ?></h6>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>

                        <!-- order summary -->
                        <div class="order-summary border rounded p-4 my-4">
                            <div class="p-3">
                                <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Quantity</p>
                                    <h6 class="quantity mb-0 fs-4 fw-semibold"><?= h($quantity) ?></h6>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Unit Price</p>
                                    <h6 class="unitPrice mb-0 fs-4 fw-semibold">$<?= $this->Number->format($product->price) ?></h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-4 fw-semibold">Total Price</h6>
                                    <h6 class="totalCost mb-0 fs-5 fw-semibold">$<?= $this->Number->format($product->price * $quantity) ?></h6>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- Step 2: Billing & Address -->
                    <h6>Billing & Address</h6>
                    <section>
                        <div class="billing-address-content">
                            <?php if (!empty($user->profile->address)) : ?>
                                <div class="card shadow-none border">
                                    <div class="card-body p-4">
                                        <h6 class="mb-3 fs-4 fw-semibold"><?= h($user->username) ?></h6>
                                        <p class="mb-1 fs-2">
                                            <?= h($user->profile->address->street) ?>, <?= h($user->profile->address->city) ?>, <?= h($user->profile->address->postal_code) ?>, <?= h($user->profile->address->country) ?>
                                        </p>
                                        <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                            <i class="ti ti-device-mobile fs-7"></i><?= h($user->profile->phone) ?>
                                        </h6>
                                        <a href="javascript:void(0)" class="btn btn-outline-primary billing-address">Deliver To This Address</a>
                                    </div>
                                </div>
                            <?php else : ?>
                                <p>No address found. Please add a new address.</p>
                            <?php endif; ?>
                        </div>

                        <!-- Delivery and Payment Section -->
                        <div class="payment-method-list payment-method">
                            <!-- Delivery Option -->
                            <div class="delivery-option btn-group-active card shadow-none border">
                                <div class="card-body p-4">
                                    <h6 class="mb-3 fw-semibold fs-4">Delivery Option</h6>
                                    <div class="btn-group flex-row gap-3 w-100" role="group" aria-label="Delivery Options">
                                        <?php
                                        /**
                                         * Skip the weekend and calculate the working day
                                         *
                                         * @param \DateTime $date
                                         * @param int $days
                                         * @return \DateTime
                                         * @throws \DateMalformedStringException
                                         */
                                        function addBusinessDays(DateTime $date, int $days): DateTime
                                        {
                                            $addedDays = 0;

                                            while ($addedDays < $days) {
                                                $date->modify('+1 day'); // Add one day at a time

                                                // Check whether it is a working day (Monday to Friday from 1 to 5)
                                                if ($date->format('N') < 6) {
                                                    $addedDays++;
                                                }
                                            }

                                            return $date;
                                        }

                                        // Get the current date
                                        $now = new DateTime('now');

                                        // Clone $now objects to avoid modifying the original object
                                        $freeDeliveryDate = clone $now;
                                        $fastDeliveryDate = clone $now;

                                        // Calculate weekdays
                                        $freeDeliveryDate = addBusinessDays($freeDeliveryDate, 5); // Free delivery in 5个工作日
                                        $fastDeliveryDate = addBusinessDays($fastDeliveryDate, 2); // Fast delivery in 2个工作日

                                        // Formatting date
                                        $freeDeliveryDateFormatted = $freeDeliveryDate->format('l, F j');
                                        $fastDeliveryDateFormatted = $fastDeliveryDate->format('l, F j');
                                        ?>

                                        <!-- Free Delivery -->
                                        <div class="position-relative form-check btn-custom-fill flex-fill ps-0">
                                            <input type="radio" class="form-check-input ms-4 round-16" name="deliveryOpt" id="deliveryFree" value="0" checked>
                                            <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="deliveryFree">
                                                <div class="text-start ps-2">
                                                    <h6 class="fs-4 fw-semibold mb-0">Free Delivery</h6>
                                                    <p class="mb-0 text-muted">Delivered on <?= h($freeDeliveryDateFormatted) ?> (5 Business days)</p>
                                                </div>
                                            </label>
                                        </div>

                                        <!-- Fast Delivery -->
                                        <div class="position-relative form-check btn-custom-fill flex-fill ps-0">
                                            <input type="radio" class="form-check-input ms-4 round-16" name="deliveryOpt" id="deliveryFast" value="10">
                                            <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="deliveryFast">
                                                <div class="text-start ps-2">
                                                    <h6 class="fs-4 fw-semibold mb-0">Fast Delivery ($10.00)</h6>
                                                    <p class="mb-0 text-muted">Delivered on <?= h($fastDeliveryDateFormatted) ?> (2 Business days)</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Payment Option -->
                            <div class="payment-option btn-group-active card shadow-none border">
                                <div class="card-body p-4">
                                    <h6 class="mb-3 fw-semibold fs-4">Payment Option</h6>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="btn-group flex-column" role="group" aria-label="Payment Options">
                                                <!-- PayPal -->
                                                <div class="position-relative mb-3 form-check btn-custom-fill ps-0">
                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType" id="paymentPaypal" checked>
                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="paymentPaypal">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-start ps-2">
                                                                <h6 class="fs-4 fw-semibold mb-0">Pay with PayPal</h6>
                                                                <p class="mb-0 text-muted">You will be redirected to PayPal to complete your purchase.</p>
                                                            </div>
                                                            <?= $this->Html->image('svgs/paypal.svg', ['alt' => 'paypal-img', 'class' => 'img-fluid ms-auto']) ?>
                                                        </div>
                                                    </label>
                                                </div>
                                                <!-- Credit/Debit Card -->
                                                <div class="position-relative mb-3 form-check btn-custom-fill ps-0">
                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType" id="paymentCard">
                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="paymentCard">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-start ps-2">
                                                                <h6 class="fs-4 fw-semibold mb-0">Credit/Debit Card</h6>
                                                                <p class="mb-0 text-muted">We support Mastercard, Visa, Discover, and Stripe.</p>
                                                            </div>
                                                            <?= $this->Html->image('svgs/mastercard.svg', ['alt' => 'mastercard-img', 'class' => 'img-fluid ms-auto']) ?>
                                                        </div>
                                                    </label>
                                                </div>
                                                <!-- Cash on Delivery -->
                                                <div class="position-relative form-check btn-custom-fill ps-0">
                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType" id="paymentCOD">
                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="paymentCOD">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-start ps-2">
                                                                <h6 class="fs-4 fw-semibold mb-0">Cash on Delivery</h6>
                                                                <p class="mb-0 text-muted">Pay when your order is delivered.</p>
                                                            </div>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <?= $this->Html->image('products/payment.svg', ['alt' => 'payment-img', 'class' => 'img-fluid']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Order Summary -->
                            <div class="order-summary border rounded p-4 my-4">
                                <div class="p-3">
                                    <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Unit price</p>
                                        <h6 class="unitPrice mb-0 fs-4 fw-semibold">$<?= $this->Number->format($product->price) ?></h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Quantity</p>
                                        <h6 class="quantity mb-0 fs-4 fw-semibold"><?= h($quantity) ?></h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Shipping</p>
                                        <h6 class="shippingCost mb-0 fs-4 fw-semibold">Free</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0 fs-6 fw-semibold">Total</h6>
                                        <h6 class="totalCost mb-0 fs-6 fw-semibold">$<?= $this->Number->format($product->price * $quantity) ?></h6>
                                    </div>
                                    <!-- Added Including GST line -->
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="mb-0 fs-4 text-muted">Including GST</p>
                                        <h6 class="gstAmount mb-0 fs-4 text-muted">$0.00</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Payment</h6>
                    <section class="payment-method text-center">
                        <h5 class="fw-semibold fs-5">Thank you for your purchase!</h5>
                        <h6 class="fw-semibold text-primary mb-7">Your order id: 3fa7-69e1-79b4-dbe0d35f5f5d</h6>
                        <?= $this->Html->image('products/payment-complete.svg', [
                            'alt' => 'flagmaster-img',
                            'class' => 'img-fluid mb-4',
                            'width' => '350',
                        ]) ?>
                        <p class="mb-0 fs-2">We will send you a notification
                            <br>within 2 days when it ships.
                        </p>
                        <div class="d-sm-flex align-items-center justify-content-between my-4">
                            <?= $this->Html->link(
                                'Continue Shopping',
                                ['controller' => 'Products', 'action' => 'index'],
                                ['class' => 'btn btn-success d-block mb-2 mb-sm-0']
                            ); ?>
                            <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                        </div>
                    </section>
                </form>
            </div>
        </div>
        <script>
            const unitPrice = <?= $product->price ?>;
            let shippingCost = 0; // Initial freight
            let currentQty = <?= $quantity ?>; // Initial quantity

            window.onload = function() {
                // Get the default selected distribution option
                const defaultDeliveryOption = document.querySelector('input[name="deliveryOpt"]:checked');
                if (defaultDeliveryOption) {
                    shippingCost = parseFloat(defaultDeliveryOption.value);
                }
                updateTotal();

                // Add an event listener to the distribution option
                const deliveryOptions = document.getElementsByName('deliveryOpt');
                for (let i = 0; i < deliveryOptions.length; i++) {
                    deliveryOptions[i].addEventListener('change', function() {
                        shippingCost = parseFloat(this.value);
                        updateTotal();
                    });
                }

                // Event listener with additional quantity input boxes, if any
                const qtyInput = document.getElementById("quantityInput");
                if (qtyInput) {
                    qtyInput.addEventListener('change', updateTotal);
                }
            }

            function updateTotal() {
                const qtyInput = document.getElementById("quantityInput");
                if (qtyInput) {
                    currentQty = parseInt(qtyInput.value);
                    if (isNaN(currentQty) || currentQty < 1) {
                        currentQty = 1;
                        qtyInput.value = 1;
                    }
                }

                const subTotal = unitPrice * currentQty;
                const totalPrice = subTotal + shippingCost;

                // Update the unit price
                const unitPriceElements = document.getElementsByClassName("unitPrice");
                for (let i = 0; i < unitPriceElements.length; i++) {
                    unitPriceElements[i].innerText = '$' + unitPrice.toFixed(2);
                }

                // The number of updates
                const quantityElements = document.getElementsByClassName("quantity");
                for (let i = 0; i < quantityElements.length; i++) {
                    quantityElements[i].innerText = currentQty;
                }

                // Update the suptotal
                const subTotalElements = document.getElementsByClassName("subTotal");
                for (let i = 0; i < subTotalElements.length; i++) {
                    subTotalElements[i].innerText = '$' + subTotal.toFixed(2);
                }

                // update shipping
                const shippingCostElements = document.getElementsByClassName("shippingCost");
                for (let i = 0; i < shippingCostElements.length; i++) {
                    shippingCostElements[i].innerText = shippingCost > 0 ? '$' + shippingCost.toFixed(2) : 'Free';
                }

                // Updated total
                const totalCostElements = document.getElementsByClassName("totalCost");
                for (let i = 0; i < totalCostElements.length; i++) {
                    totalCostElements[i].innerText = '$' + totalPrice.toFixed(2);
                }

                // **Calculation and update GST**
                const gstAmount = totalPrice / 11; // 计算 GST 金额
                const gstElements = document.getElementsByClassName("gstAmount");
                for (let i = 0; i < gstElements.length; i++) {
                    gstElements[i].innerText = '$' + gstAmount.toFixed(2);
                }
            }

            function updateShipping(cost) {
                shippingCost = cost;
                updateTotal();
            }

            function increaseQuantity() {
                const qtyInput = document.getElementById("quantityInput");
                currentQty = parseInt(qtyInput.value);
                if (!isNaN(currentQty)) {
                    qtyInput.value = currentQty + 1;
                    updateTotal();
                }
            }

            function decreaseQuantity() {
                const qtyInput = document.getElementById("quantityInput");
                currentQty = parseInt(qtyInput.value);
                if (!isNaN(currentQty) && currentQty > 1) {
                    qtyInput.value = currentQty - 1;
                    updateTotal();
                }
            }
        </script>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('/libs/jquery-steps/build/jquery.steps.min') ?>
<?= $this->Html->script('/libs/jquery-validation/dist/jquery.validate.min') ?>
<?= $this->Html->script('forms/form-wizard') ?>
<?= $this->Html->script('apps/ecommerce') ?>

<?php $this->end(); ?>

