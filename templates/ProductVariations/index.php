<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\ProductVariation> $productVariations
 */
?>
<div class="productVariations index content">
    <?= $this->Html->link(__('New Product Variation'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Product Variations') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('product_id') ?></th>
                    <th><?= $this->Paginator->sort('variation_type') ?></th>
                    <th><?= $this->Paginator->sort('variation_value') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($productVariations as $productVariation): ?>
                <tr>
                    <td><?= $this->Number->format($productVariation->id) ?></td>
                    <td><?= $productVariation->hasValue('product') ? $this->Html->link($productVariation->product->name, ['controller' => 'Products', 'action' => 'view', $productVariation->product->id]) : '' ?></td>
                    <td><?= h($productVariation->variation_type) ?></td>
                    <td><?= h($productVariation->variation_value) ?></td>
                    <td><?= h($productVariation->created_at) ?></td>
                    <td><?= h($productVariation->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $productVariation->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $productVariation->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $productVariation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productVariation->id)]) ?>
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
