<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Order> $orders
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Order</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Order</li>
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
<div class="card overflow-hidden invoice-application">
    <div class="d-flex align-items-center justify-content-between gap-6 m-3 d-lg-none">
        <button class="btn btn-primary d-flex" type="button" data-bs-toggle="offcanvas" data-bs-target="#chat-sidebar" aria-controls="chat-sidebar">
            <i class="ti ti-menu-2 fs-5"></i>
        </button>
        <form class="position-relative w-100">
            <input type="text" class="form-control search-chat py-2 ps-5" id="text-srh" placeholder="Search Contact">
            <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
        </form>
    </div>
    <div class="d-flex">
        <div class="w-25 d-none d-lg-block border-end user-chat-box">
            <div class="p-3 border-bottom">
                <form class="position-relative">
                    <input type="search" class="form-control search-invoice ps-5" id="text-srh" placeholder="Search Order" />
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="app-invoice">
                <ul class="overflow-auto invoice-users" data-simplebar>
                    <?php foreach ($orders as $order) : ?>
                        <li>
                            <a href="javascript:void(0)" class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user <?= $order->id % 2 == 0 ? 'bg-light-subtle' : '' ?>" id="invoice-<?= $order->id ?>" data-invoice-id="<?= $order->id ?>">
                                <div class="btn <?= $order->id % 2 == 0 ? 'btn-primary' : 'btn-danger' ?> round rounded-circle d-flex align-items-center justify-content-center px-2">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">
                                        <?php if ($order->user && $order->user->profile) : ?>
                                            <?= h($order->user->profile->first_name) ?> <?= h($order->user->profile->last_name) ?>
                                        <?php else : ?>
                                            Unknown User
                                        <?php endif; ?>
                                    </h6>
                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">Id: #<?= h($order->id) ?></span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block"><?= h($order->order_date->format('d M Y')) ?></span>
                                </div>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
        <div class="w-75 w-xs-100 chat-container">
            <div class="invoice-inner-part h-100">
                <div class="invoiceing-box">
                    <div class="invoice-header d-flex align-items-center border-bottom p-3">
                        <h4 class=" text-uppercase mb-0">Order</h4>
                        <div class="ms-auto">
                            <h4 class="invoice-number"></h4>
                        </div>
                    </div>
                    <div class="p-3" id="custom-invoice">
                        <?php foreach ($orders as $order) : ?>
                            <div class="invoice-<?= $order->id ?>" id="printableArea">
                                <div class="row pt-3">
                                    <div class="col-md-12">
                                        <div>
                                            <address>
                                                <h6>&nbsp;From,</h6>
                                                <h6 class="fw-bold">&nbsp; Flag Master</h6>
                                                <p class="ms-1">
                                                    Wellington Rd,
                                                    <br />Clayton,
                                                    <br />VIC - 3800
                                                </p>
                                            </address>
                                        </div>
                                        <div class="text-end">
                                            <address>
                                                <h6>To,</h6>
                                                <h6 class="fw-bold invoice-customer">
                                                    <?= h($order->user->profile->first_name ?? 'First name not available') ?>
                                                    <?= h($order->user->profile->last_name ?? 'Last name not available') ?>
                                                </h6>
                                                <?php $address = $order->user->profile->address ?? null; ?>
                                                <p class="ms-4">
                                                    <?= $address ? h($address->street) : 'Street not available' ?>,
                                                    <br /><?= $address ? h($address->city) : 'City not available' ?>,
                                                    <br /><?= $address ? h($address->state) : 'State not available' ?> - <?= $address ? h($address->postal_code) : 'Postal code not available' ?>
                                                </p>
                                                <p class="mt-4 mb-1">
                                                    <span>Order Date :</span>
                                                    <i class="ti ti-calendar"></i>
                                                    <?= h($order->order_date->format('jS M Y')) ?>
                                                </p>
                                                <p>
                                                    <span>Due Date :</span>
                                                    <i class="ti ti-calendar"></i>
                                                    <?= h($order->order_date->modify('+2 days')->format('jS M Y')) ?>
                                                </p>
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="table-responsive mt-5">
                                            <table class="table table-hover">
                                                <thead>
                                                <tr>
                                                    <th class="text-center">#</th>
                                                    <th>Description</th>
                                                    <th class="text-end">Quantity</th>
                                                    <th class="text-end">Unit Cost</th>
                                                    <th class="text-end">Total</th>
                                                </tr>
                                                </thead>
                                                <?php if (!empty($order->products)) : ?>
                                                    <tbody>
                                                    <?php $counter = 1; foreach ($order->products as $product) : ?>
                                                        <tr>
                                                            <td class="text-center"><?= $counter ?></td>
                                                            <td><?= h($product->name) ?></td>
                                                            <td class="text-end"><?= h($product->_joinData->quantity) ?></td>
                                                            <td class="text-end">$<?= h($this->Number->format($product->_joinData->unit_price, ['thousands' => ','])) ?></td>
                                                            <td class="text-end">$<?= h($this->Number->format($product->_joinData->total_price, ['thousands' => ','])) ?></td>
                                                        </tr>
                                                        <?php $counter++; ?>
                                                    <?php endforeach; ?>
                                                    </tbody>
                                                <?php else : ?>
                                                    <tr>
                                                        <td colspan="5" class="text-center">No products available for this order.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="pull-right mt-4 text-end">
                                            <p>Sub - Total amount: $<?= h($this->Number->format($order->total_amount - $order->shipping_cost, ['thousands' => ','])) ?></p>
                                            <p>Shipping Cost : <?= $order->shipping_cost > 0 ? '$' . h($this->Number->format($order->shipping_cost, ['thousands' => ','])) : 'Free' ?></p>
                                            <hr />
                                            <h3>
                                                <b>Total :</b> $<?= h($this->Number->format($order->total_amount, ['thousands' => ','])) ?>
                                            </h3>
                                        </div>
                                        <div class="clearfix"></div>
                                        <hr />
                                        <div class="text-end">
<!--                                            TODO: Add payment-->
<!--                                            <button class="btn bg-danger-subtle text-danger" type="submit">-->
<!--                                                Proceed to payment-->
<!--                                            </button>-->
                                            <button class="btn btn-primary btn-default print-page ms-6" type="button">
                                                <span>
                                                    <i class="ti ti-printer fs-5"></i>
                                                    Print
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="offcanvas offcanvas-start user-chat-box" tabindex="-1" id="chat-sidebar" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasExampleLabel">
                    Order
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="p-3 border-bottom">
                <form class="position-relative">
                    <input type="search" class="form-control search-invoice ps-5" id="text-srh" placeholder="Search Order">
                    <i class="ti ti-search position-absolute top-50 start-0 translate-middle-y fs-6 text-dark ms-3"></i>
                </form>
            </div>
            <div class="app-invoice overflow-auto">
                <ul class="invoice-users">
                    <?= $first = true ?>
                    <?php foreach ($orders as $order) : ?>
                        <li>
                            <a href="javascript:void(0)" class="p-3 bg-hover-light-black border-bottom d-flex align-items-start invoice-user listing-user <?= $first ? 'bg-light' : '' ?>" id="invoice-<?= $order->id ?>" data-invoice-id="<?= $order->id ?>">
                                <div class="btn <?= $order->id % 2 == 0 ? 'btn-primary' : 'btn-danger' ?> round rounded-circle d-flex align-items-center justify-content-center px-2">
                                    <i class="ti ti-user fs-6"></i>
                                </div>
                                <div class="ms-3 d-inline-block w-75">
                                    <h6 class="mb-0 invoice-customer">
                                        <?php if ($order->user && $order->user->profile) : ?>
                                            <?= h($order->user->profile->first_name) ?> <?= h($order->user->profile->last_name) ?>
                                        <?php else : ?>
                                            Unknown User
                                        <?php endif; ?>
                                    </h6>
                                    <span class="fs-3 invoice-id text-truncate text-body-color d-block w-85">Id: #<?= h($order->id) ?></span>
                                    <span class="fs-3 invoice-date text-nowrap text-body-color d-block"><?= h($order->order_date->format('d M Y')) ?></span>
                                </div>
                            </a>
                        </li>
                        <?php $first = false ?>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php
$this->start('customScript'); ?>
<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js']) ?>
<?= $this->Html->script(['/libs/fullcalendar/index.global.min']) ?>
<?= $this->Html->script(['apps/invoice']) ?>
<?= $this->Html->script(['apps/jquery.PrintArea']) ?>
<?php $this->end(); ?>
