<?php
/**
 * @var array $cartItems
 * @var int $cartItemCount
 */
?>

<div class="offcanvas-header justify-content-between py-4">
    <h5 class="offcanvas-title fs-5 fw-semibold" id="offcanvasRightLabel">Shopping Cart</h5>
    <span class="badge bg-primary rounded-4 px-3 py-1 lh-sm"><?= h($cartItemCount) ?> items</span>
</div>
<div class="offcanvas-body h-100 px-4 pt-0" data-simplebar>
    <ul class="mb-0">
        <?php
        $subTotal = 0;
        foreach ($cartItems as $item) :
            $product = $item->product;
            $quantity = (int)$item->quantity;
            $unitPrice = $product->getPrice();
            $totalPrice = $unitPrice * $quantity;
            $subTotal += $totalPrice;
            ?>
            <li class="pb-7">
                <div class="d-flex align-items-center">
                    <?= $this->Html->image($product->thumbnail_url ?? 'products/Brazil-Flag.png', [
                        'alt' => h($product->name),
                        'class' => 'rounded-1 me-9 flex-shrink-0',
                        'width' => '95',
                        'height' => '75',
                    ]) ?>
                    <div>
                        <h6 class="mb-1"><?= h($product->name) ?></h6>
                        <?php foreach ($product->categories as $category) : ?>
                            <p class="mb-0 text-muted fs-2"><?= h($category->name) ?></p>
                        <?php endforeach; ?>
                        <div class="d-flex align-items-center justify-content-between mt-2">
                            <h6 class="fs-2 fw-semibold mb-0 text-muted"><?= $this->Number->currency($unitPrice, 'AUD', ['places' => 0]) ?></h6>
                            <div class="input-group input-group-sm w-50">
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 minus" type="button" data-product-id="<?= $product->id ?>">-</button>
                                <input type="text" class="form-control bg-transparent text-muted fs-2 border-0 text-center qty" value="<?= $quantity ?>" data-product-id="<?= $product->id ?>" data-unit-price="<?= $unitPrice ?>" />
                                <button class="btn text-success bg-success-subtle p-0 round-20 border-0 add" type="button" data-product-id="<?= $product->id ?>">+</button>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        <?php endforeach; ?>
    </ul>
    <div class="align-bottom">
        <div class="d-flex align-items-center pb-7">
            <span class="text-dark fs-3">Sub Total</span>
            <div class="ms-auto">
                <span class="text-dark fw-semibold fs-3 cartSubtotal"><?= $this->Number->currency($subTotal, 'AUD', ['places' => 0]) ?></span>
            </div>
        </div>
        <?php if (count($cartItems) <= 0) : ?>
            <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']); ?>" class="btn btn-primary w-100">Continue Shopping</a>
        <?php else : ?>
            <a href="<?= $this->Url->build(['controller' => 'Orders', 'action' => 'checkout']); ?>" class="btn btn-outline-primary w-100">Go to shopping cart</a>
        <?php endif; ?>
    </div>
</div>
