<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Payment $payment
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Payment'), ['action' => 'edit', $payment->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Payment'), ['action' => 'delete', $payment->id], ['confirm' => __('Are you sure you want to delete # {0}?', $payment->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Payment'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Payment'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="payment view content">
            <h3><?= h($payment->payment_method) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $payment->hasValue('order') ? $this->Html->link($payment->order->id, ['controller' => 'Order', 'action' => 'view', $payment->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Method') ?></th>
                    <td><?= h($payment->payment_method) ?></td>
                </tr>
                <tr>
                    <th><?= __('Stripe Payment Id') ?></th>
                    <td><?= h($payment->stripe_payment_id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Status') ?></th>
                    <td><?= h($payment->status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($payment->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Amount') ?></th>
                    <td><?= $this->Number->format($payment->amount) ?></td>
                </tr>
                <tr>
                    <th><?= __('Payment Date') ?></th>
                    <td><?= h($payment->payment_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($payment->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($payment->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
