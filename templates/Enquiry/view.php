<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Enquiry'), ['action' => 'edit', $enquiry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Enquiry'), ['action' => 'delete', $enquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $enquiry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Enquiry'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Enquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="enquiry view content">
            <h3><?= h($enquiry->SUBJECT) ?></h3>
            <table>
                <tr>
                    <th><?= __('User') ?></th>
                    <td><?= $enquiry->hasValue('user') ? $this->Html->link($enquiry->user->email, ['controller' => 'Users', 'action' => 'view', $enquiry->user->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('SUBJECT') ?></th>
                    <td><?= h($enquiry->SUBJECT) ?></td>
                </tr>
                <tr>
                    <th><?= __('STATUS') ?></th>
                    <td><?= h($enquiry->STATUS) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($enquiry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($enquiry->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($enquiry->updated_at) ?></td>
                </tr>
            </table>
            <div class="text">
                <strong><?= __('Message') ?></strong>
                <blockquote>
                    <?= $this->Text->autoParagraph(h($enquiry->message)); ?>
                </blockquote>
            </div>
        </div>
    </div>
</div>
