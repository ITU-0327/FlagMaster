<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFlagEnquiry $customFlagEnquiry
 * @var \Cake\Collection\CollectionInterface|string[] $enquiries
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('List Custom Flag Enquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="customFlagEnquiries form content">
            <?= $this->Form->create($customFlagEnquiry) ?>
            <fieldset>
                <legend><?= __('Add Custom Flag Enquiry') ?></legend>
                <?php
                    echo $this->Form->control('enquiry_id', ['options' => $enquiries]);
                    echo $this->Form->control('flag_size');
                    echo $this->Form->control('flag_color');
                    echo $this->Form->control('attachment_url');
                    echo $this->Form->control('created_at');
                    echo $this->Form->control('updated_at');
                ?>
            </fieldset>
            <?= $this->Form->button(__('Submit')) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
