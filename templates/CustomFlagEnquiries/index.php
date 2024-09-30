<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\CustomFlagEnquiry> $customFlagEnquiries
 */
?>
<div class="customFlagEnquiries index content">
    <?= $this->Html->link(__('New Custom Flag Enquiry'), ['action' => 'add'], ['class' => 'button float-right']) ?>
    <h3><?= __('Custom Flag Enquiries') ?></h3>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th><?= $this->Paginator->sort('id') ?></th>
                    <th><?= $this->Paginator->sort('enquiry_id') ?></th>
                    <th><?= $this->Paginator->sort('flag_size') ?></th>
                    <th><?= $this->Paginator->sort('flag_color') ?></th>
                    <th><?= $this->Paginator->sort('attachment_url') ?></th>
                    <th><?= $this->Paginator->sort('created_at') ?></th>
                    <th><?= $this->Paginator->sort('updated_at') ?></th>
                    <th class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customFlagEnquiries as $customFlagEnquiry): ?>
                <tr>
                    <td><?= $this->Number->format($customFlagEnquiry->id) ?></td>
                    <td><?= $customFlagEnquiry->hasValue('enquiry') ? $this->Html->link($customFlagEnquiry->enquiry->subject, ['controller' => 'Enquiries', 'action' => 'view', $customFlagEnquiry->enquiry->id]) : '' ?></td>
                    <td><?= h($customFlagEnquiry->flag_size) ?></td>
                    <td><?= h($customFlagEnquiry->flag_color) ?></td>
                    <td><?= h($customFlagEnquiry->attachment_url) ?></td>
                    <td><?= h($customFlagEnquiry->created_at) ?></td>
                    <td><?= h($customFlagEnquiry->updated_at) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $customFlagEnquiry->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $customFlagEnquiry->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $customFlagEnquiry->id], ['confirm' => __('Are you sure you want to delete # {0}?', $customFlagEnquiry->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?></p>
    </div>
</div>
