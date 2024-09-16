<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var \Cake\Collection\CollectionInterface|string[] $users
 * @var \Cake\Collection\CollectionInterface|string[] $products
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
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Order</li>
                        <li class="breadcrumb-item" aria-current="page">Add</li>
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


<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Form->button(__('View Exist Orders'), [
                'type' => 'button',
                'onclick' => "location.href='" . $this->Url->build(['action' => 'index']) . "'",
                'class' => 'btn btn-primary mb-3',
            ]) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-3"><?= __('Add Order') ?></h4>
                <?= $this->Form->create($order) ?>
                <div class="row">
                    <div class="col-md-6">
                        <label for="user-id"><?= __('User') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('user_id', ['options' => $users, 'empty' => true, 'class' => 'form-control', 'label' => false, 'placeholder' => 'User']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="order-date"><?= __('Order Date') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('order_date', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Order Date']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="total-amount"><?= __('Total Amount') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('total_amount', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Total Amount']) ?>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="status"><?= __('Status') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('status', ['class' => 'form-control', 'label' => false, 'placeholder' => 'Status']) ?>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <label for="products"><?= __('Products') ?></label>
                        <div class="form-floating mb-3">
                            <?= $this->Form->control('products._ids', ['options' => $products, 'class' => 'form-control', 'label' => false, 'placeholder' => 'Products']) ?>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-md-flex align-items-center">
                            <div class="ms-auto mt-3 mt-md-0">
                                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary hstack gap-6']) ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>
