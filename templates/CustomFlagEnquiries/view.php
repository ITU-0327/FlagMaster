<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFlagEnquiry $customFlagEnquiry
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Custom Flag Enquiry'), ['action' => 'edit', $customFlagEnquiry->id], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Custom Flag Enquiry'), ['action' => 'delete', $customFlagEnquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customFlagEnquiry->id), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Custom Flag Enquiries'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Custom Flag Enquiry'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="customFlagEnquiries view content">
            <h3><?= h($customFlagEnquiry->flag_size) ?></h3>
            <table>
                <tr>
                    <th><?= __('Enquiry') ?></th>
                    <td><?= $customFlagEnquiry->hasValue('enquiry') ? $this->Html->link($customFlagEnquiry->enquiry->subject, ['controller' => 'Enquiries', 'action' => 'view', $customFlagEnquiry->enquiry->id]) : '' ?></td>
                </tr>
                <tr>
                    <th><?= __('Flag Size') ?></th>
                    <td><?= h($customFlagEnquiry->flag_size) ?></td>
                </tr>
                <tr>
                    <th><?= __('Flag Color') ?></th>
                    <td><?= h($customFlagEnquiry->flag_color) ?></td>
                </tr>
                <tr>
                    <th><?= __('Attachment Url') ?></th>
                    <td><?= h($customFlagEnquiry->attachment_url) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id') ?></th>
                    <td><?= $this->Number->format($customFlagEnquiry->id) ?></td>
                </tr>
                <tr>
                    <th><?= __('Created At') ?></th>
                    <td><?= h($customFlagEnquiry->created_at) ?></td>
                </tr>
                <tr>
                    <th><?= __('Updated At') ?></th>
                    <td><?= h($customFlagEnquiry->updated_at) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
