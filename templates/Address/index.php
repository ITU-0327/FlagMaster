<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\Addres> $address
 */
?>
<div class="address index content">
    <?= $this->Html->link(__('New Addres'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Address') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('street') ?></th>
                    <th><?= $this->Paginator->sort('city') ?></th>
                    <th><?= $this->Paginator->sort('state') ?></th>
                    <th><?= $this->Paginator->sort('postal_code') ?></th>
                    <th><?= $this->Paginator->sort('country') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($address as $addres): ?>
                <tr>
                    <td><?= $this->Number->format($addres->id) ?></td>
                    <td><?= h($addres->street) ?></td>
                    <td><?= h($addres->city) ?></td>
                    <td><?= h($addres->state) ?></td>
                    <td><?= h($addres->postal_code) ?></td>
                    <td><?= h($addres->country) ?></td>
                    <td><?= h($addres->created_at) ?></td>
                    <td><?= h($addres->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $addres->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $addres->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $addres->id], ['confirm' => __('Are you sure you want to delete # {0}?', $addres->id)]) ?>
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
