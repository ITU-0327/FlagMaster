<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\ProductVariation $productVariation
 * @var string[]|\Cake\Collection\CollectionInterface $products
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $productVariation->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $productVariation->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Product Variations'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="productVariations form content">
            <?= $this->Form->create($productVariation) ?>
            <fieldset>
                <legend><?= __('Edit Product Variation') ?></legend>
                <?php
                    echo $this->Form->control('product_id', ['options' => $products, 'empty' => true]);
                    echo $this->Form->control('variation_type');
                    echo $this->Form->control('variation_value');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
