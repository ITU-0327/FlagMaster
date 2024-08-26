<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Review $review
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Review'), ['action' => 'edit', $review->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Review'), ['action' => 'delete', $review->id], ['confirm' => __('Are you sure you want to delete # {0}?', $review->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Review'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Review'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="review view content">
            <h3><?= h($review->id) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $review->hasValue('user') ? $this->Html->link($review->user->email, ['controller' => 'Users', 'action' => 'view', $review->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Product') ?></th>
                    <td><?= $review->hasValue('product') ? $this->Html->link($review->product->NAME, ['controller' => 'Product', 'action' => 'view', $review->product->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($review->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Rating') ?></th>
                    <td><?= $review->rating === null ? '' : $this->Number->format($review->rating) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($review->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($review->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Comment') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($review->comment)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
