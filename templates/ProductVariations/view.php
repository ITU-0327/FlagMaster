<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductVariation $productVariation
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Product Variation'), ['action' => 'edit', $productVariation->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Product Variation'), ['action' => 'delete', $productVariation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $productVariation->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Product Variations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Product Variation'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productVariations view content">
            <h3><?= h($productVariation->variation_type) ?></h3>
            <table>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $productVariation->hasValue('product') ? $this->Html->link($productVariation->product->name, ['controller' => 'Products', 'action' => 'view', $productVariation->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Variation Type') ?></th>
                    <td><?= h($productVariation->variation_type) ?></td>
                </tr>
                <tr>
                    <th><?= __('Variation Value') ?></th>
                    <td><?= h($productVariation->variation_value) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($productVariation->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($productVariation->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($productVariation->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
