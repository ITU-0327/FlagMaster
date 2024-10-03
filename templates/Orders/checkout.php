<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \App\Model\Entity\User $user
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
                <?= $this->Form->create($order, ['class' => 'tab-wizard wizard-circle']) ?>
                    <!-- Step 1: Cart -->
                    <h6>Cart</h6>
                    <section>
                        <div class="table-responsive">
                            <?php if (empty($order->orders_products)) : ?>
                                <p>Your cart is empty.</p>
                                <?= $this->Html->link('Continue Shopping', ['controller' => 'Products', 'action' => 'index'], ['class' => 'btn btn-primary']) ?>
                            <?php else : ?>
                                <table class="table align-middle text-nowrap mb-0">
                                    <thead class="fs-2">
                                    <tr>
                                        <th>Product</th>
                                        <th>Quantity</th>
                                        <th class="text-end">Price</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($order->orders_products as $item) : ?>
                                        <?php $product = $item->product; ?>
                                        <tr>
                                            <td class="border-bottom-0">
                                                <div class="d-flex align-items-center gap-3 overflow-hidden">
                                                    <?= $this->Html->image($product->thumbnail_url ?? 'products/Brazil-Flag.png', [
                                                        'alt' => h($product->name),
                                                        'class' => 'img-fluid rounded',
                                                        'width' => '80',
                                                    ]) ?>

                                                    <div>
                                                        <h6 class="fw-semibold fs-4 mb-0"><?= h($product->name) ?></h6>
                                                        <?php foreach ($product->categories as $category) : ?>
                                                            <p class="mb-0"><?= h($category->name) ?></p>
                                                        <?php endforeach; ?>
                                                        <a href="javascript:void(0)" class="text-danger fs-4 remove-cart-item" data-product-id="<?= $product->id ?>">
                                                            <i class="ti ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </td>
                                            <!-- Quantity -->
                                            <td class="border-bottom-0">
                                                <div class="input-group input-group-sm flex-nowrap rounded">
                                                    <button class="btn minus min-width-40 py-0 border-end border-muted text-muted" type="button" data-product-id="<?= $product->id ?>">
                                                        <i class="ti ti-minus"></i>
                                                    </button>

                                                    <?= $this->Form->text('quantity[' . $product->id . ']', [
                                                        'type' => 'text',
                                                        'class' => 'qty min-width-40 flex-grow-0 border border-muted text-muted fs-3 fw-semibold form-control text-center',
                                                        'value' => $item->quantity,
                                                        'label' => false,
                                                        'data-product-id' => $product->id,
                                                        'data-unit-price' => $item->unit_price,
                                                    ]) ?>

                                                    <button class="btn min-width-40 py-0 border-start border-muted text-muted add" type="button" data-product-id="<?= $product->id ?>">
                                                        <i class="ti ti-plus"></i>
                                                    </button>
                                                </div>
                                            </td>

                                            <td class="text-end border-bottom-0">
                                                <h6 id="productPrice_<?= $product->id ?>" class="fs-4 fw-semibold mb-0"><?= $this->Number->currency($item->unit_price * $item->quantity, 'AUD', ['places' => 0]) ?></h6>
                                                <!-- Hidden field to store unit price -->
                                                <input type="hidden" id="unitPrice_<?= $product->id ?>" value="<?= $item->unit_price ?>">
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
                        </div>

                        <!-- order summary -->
                        <div class="order-summary border rounded p-4 my-4">
                            <div class="p-3">
                                <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Subtotal</p>
                                    <h6 class="subTotal mb-0 fs-4 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Shipping</p>
                                    <h6 class="shippingCost mb-0 fs-4 fw-semibold">Free</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                    <h6 class="totalCost mb-0 fs-5 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
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
                                        <h6 class="mb-3 fs-4 fw-semibold"><?= h($user->profile->first_name) ?> <?= h($user->profile->last_name) ?></h6>
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

                            <div class="order-summary border rounded p-4 my-4">
                                <div class="p-3">
                                    <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Subtotal</p>
                                        <h6 class="subTotal mb-0 fs-4 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Shipping</p>
                                        <h6 class="shippingCost mb-0 fs-4 fw-semibold">Free</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                        <h6 class="totalCost mb-0 fs-5 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                    </div>
                                </div>
                            </div>
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
                                        $freeDeliveryDate = addBusinessDays($freeDeliveryDate, 5); // Free delivery in 5 days
                                        $fastDeliveryDate = addBusinessDays($fastDeliveryDate, 2); // Fast delivery in 2 days

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
<!--                                                <div class="position-relative mb-3 form-check btn-custom-fill ps-0">-->
<!--                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType" id="paymentPaypal" checked>-->
<!--                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="paymentPaypal">-->
<!--                                                        <div class="d-flex align-items-center">-->
<!--                                                            <div class="text-start ps-2">-->
<!--                                                                <h6 class="fs-4 fw-semibold mb-0">Pay with PayPal</h6>-->
<!--                                                                <p class="mb-0 text-muted">You will be redirected to PayPal to complete your purchase.</p>-->
<!--                                                            </div>-->
<!--                                                            --><?php //= $this->Html->image('svgs/paypal.svg', ['alt' => 'paypal-img', 'class' => 'img-fluid ms-auto']) ?>
<!--                                                        </div>-->
<!--                                                    </label>-->
<!--                                                </div>-->
                                                <!-- Credit/Debit Card -->
<!--                                                <div class="position-relative mb-3 form-check btn-custom-fill ps-0">-->
<!--                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType" id="paymentCard">-->
<!--                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="paymentCard">-->
<!--                                                        <div class="d-flex align-items-center">-->
<!--                                                            <div class="text-start ps-2">-->
<!--                                                                <h6 class="fs-4 fw-semibold mb-0">Credit/Debit Card</h6>-->
<!--                                                                <p class="mb-0 text-muted">We support Mastercard, Visa, Discover, and Stripe.</p>-->
<!--                                                            </div>-->
<!--                                                            --><?php //= $this->Html->image('svgs/mastercard.svg', ['alt' => 'mastercard-img', 'class' => 'img-fluid ms-auto']) ?>
<!--                                                        </div>-->
<!--                                                    </label>-->
<!--                                                </div>-->
                                                <!-- Pay by Bank -->
                                                <div class="position-relative mb-3 form-check btn-custom-fill ps-0">
                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType" id="paymentTWB">
                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="paymentTWB">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-start ps-2">
                                                                <h6 class="fs-4 fw-semibold mb-0">Transfer with bank account</h6>
                                                                <p class="mb-0 text-muted">Transfer the total amount to our bank account</p>
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
                                        <p class="mb-0 fs-4">Subtotal</p>
                                        <h6 class="subTotal mb-0 fs-4 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Shipping</p>
                                        <h6 class="shippingCost mb-0 fs-4 fw-semibold">Free</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                        <h6 class="totalCost mb-0 fs-5 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- Step 3 -->
                    <h6>Confirm Order</h6>
                    <section class="payment-method text-center">
                        <h5 class="fw-semibold fs-5">Review and Confirm Your Order</h5>
                        <p>Please review your order details below before placing your order.</p>

                        <!-- Order Summary -->
                        <div class="order-summary border rounded p-4 my-4">
                            <div class="p-3">
                                <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Subtotal</p>
                                    <h6 class="subTotal mb-0 fs-4 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Shipping</p>
                                    <h6 class="shippingCost mb-0 fs-4 fw-semibold">Free</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                    <h6 class="totalCost mb-0 fs-5 fw-semibold"><?= $this->Number->currency($order->total_amount, 'AUD', ['places' => 0]) ?></h6>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Details Reminder -->
                        <div class="payment-option card shadow-none border">
                            <div class="card-body p-4">
                                <h6 class="mb-3 fw-semibold fs-4">Payment Details</h6>
                                <p class="fs-3">Please ensure you have transferred the total amount to the following bank account:</p>
                                <div class="fs-4 mb-0">
                                    <p class="mb-2"><strong>Account Name:</strong> <span class="text-dark">FlagMaster</span></p>
                                    <p class="mb-2"><strong>BSB:</strong> <span class="text-dark">306-089</span></p>
                                    <p><strong>Account Number:</strong> <span class="text-dark">78901234</span></p>
                                </div>
                                <br>
                                <p class="fs-4">Click <strong>"Place Order"</strong> to complete your purchase.</p>
                            </div>
                        </div>
                    </section>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://unpkg.com/sweetalert/dist/sweetalert.min.js') ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('/libs/jquery-steps/build/jquery.steps.min') ?>
<?= $this->Html->script('/libs/jquery-validation/dist/jquery.validate.min') ?>
<?= $this->Html->script('forms/form-wizard') ?>
<?= $this->Html->script('apps/ecommerce') ?>

<script>
    // Initialize shippingCost variable
    let shippingCost = 0;

    // Add event listeners to delivery options
    const deliveryOptions = document.getElementsByName('deliveryOpt');
    for (let i = 0; i < deliveryOptions.length; i++) {
        deliveryOptions[i].addEventListener('change', function() {
            shippingCost = parseFloat(this.value);
            updateTotal();
        });
    }

    // Get default selected delivery option (if any)
    const defaultDeliveryOption = document.querySelector('input[name="deliveryOpt"]:checked');
    if (defaultDeliveryOption) {
        shippingCost = parseFloat(defaultDeliveryOption.value);
    }
</script>

<?php $this->end(); ?>
