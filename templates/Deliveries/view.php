<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Delivery $delivery
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Delivery'), ['action' => 'edit', $delivery->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Delivery'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Deliveries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Delivery'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="deliveries view content">
            <h3><?= h($delivery->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('Order') ?></th>
                    <td><?= $delivery->hasValue('order') ? $this->Html->link($delivery->order->id, ['controller' => 'Orders', 'action' => 'view', $delivery->order->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Address') ?></th>
                    <td><?= $delivery->hasValue('address') ? $this->Html->link($delivery->address->street, ['controller' => 'Addresses', 'action' => 'view', $delivery->address->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Delivery Status') ?></th>
                    <td><?= h($delivery->delivery_status) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($delivery->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Estimated Delivery Date') ?></th>
                    <td><?= h($delivery->estimated_delivery_date) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($delivery->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($delivery->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
