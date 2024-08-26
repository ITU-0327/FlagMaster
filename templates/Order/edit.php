<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Order $order
 * @var string[]|\Cake\Collection\CollectionInterface $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Form->postLink(
                __('Delete'),
                ['action' => 'delete', $order->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $order->id), 'class' => 'side-nav-item']
            ) ?>
            <?= $this->Html->link(__('List Order'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="order form content">
            <?= $this->Form->create($order) ?>
            <fieldset>
                <legend><?= __('Edit Order') ?></legend>
                <?php
                    echo $this->Form->control('user_id', ['options' => $users, 'empty' => true]);
                    echo $this->Form->control('order_date');
                    echo $this->Form->control('total_amount');
                    echo $this->Form->control('status');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
