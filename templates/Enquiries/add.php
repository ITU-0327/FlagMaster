<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= ('Actions') ?></h4>
            <?= $this->Html->link(('List Enquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="enquiries form content">
            <?= $this->Form->create($enquiry) ?>
            <fieldset>
                <legend><?= __('Add Enquiry') ?></legend>
                <?php
                echo $this->Form->control('first_name', ['label' => 'First Name']);
                echo $this->Form->control('last_name', ['label' => 'Last Name']);
                echo $this->Form->control('email', ['label' => 'Email']);
                echo $this->Form->control('message', ['label' => 'Message', 'type' => 'textarea']);
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
