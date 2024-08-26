<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\OrderItem> $orderItem
 */
?>
<div class="orderItem index content">
    <?= $this->Html->link(__('New Order Item'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Order Item') ?></h3>
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
                <?php foreach ($orderItem as $orderItem): ?>
                <tr>
                    <td><?= $this->Number->format($orderItem->id) ?></td>
                    <td><?= $orderItem->hasValue('order') ? $this->Html->link($orderItem->order->id, ['controller' => 'Order', 'action' => 'view', $orderItem->order->id]) : '' ?></td>
                    <td><?= $orderItem->hasValue('product') ? $this->Html->link($orderItem->product->NAME, ['controller' => 'Product', 'action' => 'view', $orderItem->product->id]) : '' ?></td>
                    <td><?= $this->Number->format($orderItem->quantity) ?></td>
                    <td><?= $this->Number->format($orderItem->unit_price) ?></td>
                    <td><?= $orderItem->total_price === null ? '' : $this->Number->format($orderItem->total_price) ?></td>
                    <td><?= h($orderItem->created_at) ?></td>
                    <td><?= h($orderItem->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $orderItem->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $orderItem->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $orderItem->id], ['confirm' => __('Are you sure you want to delete # {0}?', $orderItem->id)]) ?>
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
