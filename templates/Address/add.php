<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Addres $addres
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Address'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="address form content">
            <?= $this->Form->create($addres) ?>
            <fieldset>
                <legend><?= __('Add Addres') ?></legend>
                <?php
                    echo $this->Form->control('street');
                    echo $this->Form->control('city');
                    echo $this->Form->control('state');
                    echo $this->Form->control('postal_code');
                    echo $this->Form->control('country');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
