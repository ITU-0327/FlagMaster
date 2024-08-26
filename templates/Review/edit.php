<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 * @var string[]|\Cake\Collection\CollectionInterface $users
 * @var string[]|\Cake\Collection\CollectionInterface $product
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $review->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $review->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Review'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="review form content">
            <?= $this->Form->create($review) ?>
            <fieldset>
                <legend><?= __('Edit Review') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('product_id', ['options' => $product, 'empty' => true]);
                    echo $this->Form->control('rating');
                    echo $this->Form->control('comment');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
