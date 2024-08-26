<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Delivery> $delivery
 */
?>
<div class="delivery index content">
    <?= $this->Html->link(__('New Delivery'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Delivery') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('order_id') ?></th>
                    <th><?= $this->Paginator->sort('address_id') ?></th>
                    <th><?= $this->Paginator->sort('delivery_status') ?></th>
                    <th><?= $this->Paginator->sort('estimated_delivery_date') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($delivery as $delivery): ?>
                <tr>
                    <td><?= $this->Number->format($delivery->id) ?></td>
                    <td><?= $delivery->hasValue('order') ? $this->Html->link($delivery->order->id, ['controller' => 'Order', 'action' => 'view', $delivery->order->id]) : '' ?></td>
                    <td><?= $delivery->hasValue('addres') ? $this->Html->link($delivery->addres->street, ['controller' => 'Address', 'action' => 'view', $delivery->addres->id]) : '' ?></td>
                    <td><?= h($delivery->delivery_status) ?></td>
                    <td><?= h($delivery->estimated_delivery_date) ?></td>
                    <td><?= h($delivery->created_at) ?></td>
                    <td><?= h($delivery->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $delivery->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $delivery->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $delivery->id], ['confirm' => __('Are you sure you want to delete # {0}?', $delivery->id)]) ?>
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
