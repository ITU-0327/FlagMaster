<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OrdersProduct> $ordersProducts
 */
?>
<div class="ordersProducts index content">
    <?= $this->Html->link(__('New Orders Product'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Orders Products') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('quantity') ?></th>
                    <th><?= $this->Paginator->sort('unit_price') ?></th>
                    <th><?= $this->Paginator->sort('total_price') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($ordersProducts as $ordersProduct): ?>
                <tr>
                    <td><?= $this->Number->format($ordersProduct->id) ?></td>
                    <td><?= $ordersProduct->hasValue('order') ? $this->Html->link($ordersProduct->order->id, ['controller' => 'Orders', 'action' => 'view', $ordersProduct->order->id]) : '' ?></td>
                    <td><?= $ordersProduct->hasValue('product') ? $this->Html->link($ordersProduct->product->name, ['controller' => 'Products', 'action' => 'view', $ordersProduct->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($ordersProduct->quantity) ?></td>
                    <td><?= $this->Number->format($ordersProduct->unit_price) ?></td>
                    <td><?= $ordersProduct->total_price === null ? '' : $this->Number->format($ordersProduct->total_price) ?></td>
                    <td><?= h($ordersProduct->created_at) ?></td>
                    <td><?= h($ordersProduct->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $ordersProduct->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $ordersProduct->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $ordersProduct->id], ['confirm' => __('Are you sure you want to delete # {0}?', $ordersProduct->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
