<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">checkout</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
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
                                            <?= $this->Html->image('/img/products/Brazil-Flag.png', [
                                                'alt' => h($product->name),
                                                'class' => 'img-fluid rounded',
                                                'width' => '80',
                                            ]) ?>

                                            <div>
                                                <h6 class="fw-semibold fs-4 mb-0"><?= h($product->name) ?></h6>
                                                <p class="mb-0"><?= h($product->category) ?></p>
                                                <!--delete product-->
                                                <!--<a href="javascript:void(0)" class="text-danger fs-4">
                                                    <i class="ti ti-trash"></i>
                                                </a>-->
                                            </div>
                                        </div>
                                    </td>
                                    <!-- quantity button-->
                                    <td class="border-bottom-0">
                                        <div class="input-group input-group-sm flex-nowrap rounded">
                                            <button class="btn minus min-width-40 py-0 border-end border-muted border-end-0 text-muted" type="button" onclick="decreaseQuantity() ">
                                                <i class="ti ti-minus"></i>
                                            </button>

                                            <input type="text" class="min-width-40 flex-grow-0 border border-muted text-muted fs-3 fw-semibold form-control text-center qty" id="quantityInput" value="1">

                                            <button class="btn min-width-40 py-0 border border-muted border-start-0 text-muted" type="button" onclick="increaseQuantity()">
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
                                    <p class="mb-0 fs-4">Sub Total</p>
                                    <h6 class="mb-0 fs-4 fw-semibold">$<?= $this->Number->format($product->price) ?></h6>
                                </div>
                                <div class="d-flex justify-content-between mb-4">
                                    <p class="mb-0 fs-4">Shipping</p>
                                    <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                    <h6 id="totalPrice" class="mb-0 fs-5 fw-semibold">$<?= $this->Number->format($product->price) ?></h6>
                                </div>
                            </div>
                        </div>
                    </section>

                    <script>
                        function updateTotal() {
                            var qtyInput = document.getElementById("quantityInput");
                            var price = parseFloat(document.getElementById("productPrice").innerText.replace('$', ''));
                            var totalElement = document.getElementById("totalPrice");

                            var currentQty = parseInt(qtyInput.value);
                            if (!isNaN(currentQty)) {
                                var total = price * currentQty;
                                totalElement.innerText = '$' + total.toFixed(2);
                            }
                        }

                        function increaseQuantity() {
                            var qtyInput = document.getElementById("quantityInput");
                            var currentQty = parseInt(qtyInput.value);
                            if (!isNaN(currentQty)) {
                                qtyInput.value = currentQty + 1;
                                updateTotal();
                            }
                        }

                        function decreaseQuantity() {
                            var qtyInput = document.getElementById("quantityInput");
                            var currentQty = parseInt(qtyInput.value);
                            if (!isNaN(currentQty) && currentQty > 1) {
                                qtyInput.value = currentQty - 1;
                                updateTotal();
                            } else {
                                qtyInput.value = 1;
                            }
                        }

                        window.onload = function() {
                            updateTotal();
                        }
                    </script>
                    <!-- Step 2 -->
                    <h6>Billing & address</h6>
                    <section>
                        <div class="billing-address-content">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="card shadow-none border">
                                        <div class="card-body p-4">
                                            <h6 class="mb-3 fs-4 fw-semibold">Johnathan Doe</h6>
                                            <p class="mb-1 fs-2">E601 Vrundavan Heights, godrej garden city - 382481</p>
                                            <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                                <i class="ti ti-device-mobile fs-7"></i>9999501050
                                            </h6>
                                            <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To
                                                this address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card shadow-none border">
                                        <div class="card-body p-4">
                                            <h6 class="mb-3 fs-4 fw-semibold">ParleG Doe</h6>
                                            <p class="mb-1 fs-2">D201 Galexy Heights, godrej garden city - 382481</p>
                                            <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                                <i class="ti ti-device-mobile fs-7"></i>9999501050
                                            </h6>
                                            <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To
                                                this address</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="card shadow-none border">
                                        <div class="card-body p-4">
                                            <h6 class="mb-3 fs-4 fw-semibold">Guddu Bhaiya</h6>
                                            <p class="mb-1 fs-2">Mumbai khao gali, Behind shukan, godrej garden city - 382481</p>
                                            <h6 class="d-flex align-items-center gap-2 my-4 fw-semibold fs-4">
                                                <i class="ti ti-device-mobile fs-7"></i>9999501050
                                            </h6>
                                            <a href="javascript:void(0)" class="btn btn-outline-primary  billing-address">Deliver To
                                                this address</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-summary border rounded p-4 my-4">
                                <div class="p-3">
                                    <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Sub Total</p>
                                        <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Discount 5%</p>
                                        <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Shipping</p>
                                        <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                        <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="payment-method-list payment-method">
                            <div class="delivery-option btn-group-active  card shadow-none border">
                                <div class="card-body p-4">
                                    <h6 class="mb-3 fw-semibold fs-4">Delivery Option</h6>
                                    <div class="btn-group flex-row gap-3 w-100" role="group" aria-label="Basic radio toggle button group">
                                        <div class="position-relative form-check btn-custom-fill flex-fill ps-0">
                                            <input type="radio" class="form-check-input ms-4 round-16" name="deliveryOpt1" id="btnradio1" autocomplete="off" checked>
                                            <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio1">
                                                <div class="text-start ps-2">
                                                    <h6 class="fs-4 fw-semibold mb-0">Free delivery</h6>
                                                    <p class="mb-0 text-muted">Delivered on Firday, May 10</p>
                                                </div>
                                            </label>
                                        </div>
                                        <div class="position-relative form-check btn-custom-fill flex-fill ps-0">
                                            <input type="radio" class="form-check-input ms-4 round-16" name="deliveryOpt1" id="btnradio2" autocomplete="off">
                                            <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio2">
                                                <div class="text-start ps-2">
                                                    <h6 class="fs-4 fw-semibold mb-0">Fast delivery ($2,00)</h6>
                                                    <p class="mb-0 text-muted">Delivered on Wednesday, May 8</p>
                                                </div>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="payment-option btn-group-active  card shadow-none border">
                                <div class="card-body p-4">
                                    <h6 class="mb-3 fw-semibold fs-4">Payment Option</h6>
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <div class="btn-group flex-column" role="group" aria-label="Basic radio toggle button group">
                                                <div class="position-relative mb-3 w-100 form-check btn-custom-fill ps-0">

                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType1" id="btnradio3" autocomplete="off" checked>

                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio3">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-start ps-2">
                                                                <h6 class="fs-4 fw-semibold mb-0">Pay with Paypal</h6>
                                                                <p class="mb-0 text-muted">You will be redirected to PayPal website to
                                                                    complete your purchase securely.</p>
                                                            </div>
                                                            <img src="../assets/images/svgs/paypal.svg" alt="matdash-img" class="img-fluid ms-auto">
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="position-relative mb-3 form-check btn-custom-fill ps-0">
                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType1" id="btnradio4" autocomplete="off">
                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio4">
                                                        <div class="d-flex align-items-center">
                                                            <div class="text-start ps-2">
                                                                <h6 class="fs-4 fw-semibold mb-0">Credit / Debit Card</h6>
                                                                <p class="mb-0 text-muted">We support Mastercard, Visa, Discover and Stripe.
                                                                </p>
                                                            </div>
                                                            <img src="../assets/images/svgs/mastercard.svg" alt="matdash-img" class="img-fluid ms-auto">
                                                        </div>
                                                    </label>
                                                </div>
                                                <div class="position-relative form-check btn-custom-fill ps-0">
                                                    <input type="radio" class="form-check-input ms-4 round-16" name="paymentType1" id="btnradio5" autocomplete="off">
                                                    <label class="btn btn-outline-primary mb-0 p-3 rounded ps-5 w-100" for="btnradio5">
                                                        <div class="text-start ps-2">
                                                            <h6 class="fs-4 fw-semibold mb-0">Cash on Delivery</h6>
                                                            <p class="mb-0 text-muted">Pay with cash when your order is delivered.</p>
                                                        </div>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <img src="../assets/images/products/payment.svg" alt="matdash-img" class="img-fluid">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="order-summary border rounded p-4 my-4">
                                <div class="p-3">
                                    <h5 class="fs-5 fw-semibold mb-4">Order Summary</h5>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Sub Total</p>
                                        <h6 class="mb-0 fs-4 fw-semibold">$285</h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Discount 5%</p>
                                        <h6 class="mb-0 fs-4 fw-semibold text-danger">-$14</h6>
                                    </div>
                                    <div class="d-flex justify-content-between mb-4">
                                        <p class="mb-0 fs-4">Shipping</p>
                                        <h6 class="mb-0 fs-4 fw-semibold">Free</h6>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <h6 class="mb-0 fs-4 fw-semibold">Total</h6>
                                        <h6 class="mb-0 fs-5 fw-semibold">$271</h6>
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
                        <img src="../assets/images/products/payment-complete.svg" alt="matdash-img" class="img-fluid mb-4" width="350">
                        <p class="mb-0 fs-2">We will send you a notification
                            <br>within 2 days when it ships.
                        </p>
                        <div class="d-sm-flex align-items-center justify-content-between my-4">
                            <a href="ecommerce_shop" class="btn btn-success d-block mb-2 mb-sm-0">Continue Shopping</a>
                            <a href="javascript:void(0)" class="btn btn-primary d-block">Download Receipt</a>
                        </div>
                    </section>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
$this->start('customScript'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('/libs/jquery-steps/build/jquery.steps.min') ?>
<?= $this->Html->script('/libs/jquery-validation/dist/jquery.validate.min') ?>
<?= $this->Html->script('forms/form-wizard') ?>
<?= $this->Html->script('apps/ecommerce') ?>
<?php $this->end(); ?>
