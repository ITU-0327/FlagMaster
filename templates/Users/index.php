<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\App\Model\Entity\User> $users
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Users</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Users</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'flagmaster-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="users index content">
    <?= $this->Form->button(__('Add New User'), [
        'type' => 'button',
        'onclick' => "location.href='" . $this->Url->build(['action' => 'add']) . "'",
        'class' => 'btn btn-primary mb-3',
    ]) ?>
    <h3><?= __('Users') ?></h3>
    <div class="table-responsive">
        <table class="table align-middle text-nowrap mb-0">
            <thead>
            <tr>
                <th><?= $this->Paginator->sort('id') ?></th>
                <th><?= $this->Paginator->sort('username') ?></th>
                <th><?= $this->Paginator->sort('email') ?></th>
                <th><?= $this->Paginator->sort('role') ?></th>
                <th><?= $this->Paginator->sort('oauth_provider') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($users as $user) : ?>
                <tr>
                    <td><?= $this->Number->format($user->id) ?></td>
                    <td>
                        <div class="d-flex align-items-center">
                            <?= $this->Html->image('profile/user-1.jpg', [
                                'class' => 'irounded-circle',
                                'width' => '40',
                                'height' => '40',
                            ]) ?>
                            <div class="ms-3">
                                <h6 class="fs-4 fw-semibold mb-0"><?= h($user->username) ?></h6>
                                <span class="fw-normal">@<?= h($user->username) ?></span>
                            </div>
                        </div>
                    </td>
                    <td><?= h($user->email) ?></td>
                    <td>
                        <span class="badge text-bg-light text-dark fw-semibold fs-2 gap-1 d-inline-flex align-items-center">
                            <?php if ($user->role == 'admin') : ?>
                                <i class="ti ti-user-shield fs-3"></i> Admin
                            <?php elseif ($user->role == 'editor') : ?>
                                <i class="ti ti-pencil fs-3"></i> Editor
                            <?php else : ?>
                                <i class="ti ti-user fs-3"></i> User
                            <?php endif; ?>
                        </span>
                    </td>
                    <td><?= h($user->oauth_provider) ?></td>
                    <td>
                        <div class="dropdown dropstart">
                            <a href="javascript:void(0)" class="text-muted" id="dropdownMenuButton<?= $user->id ?>" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="ti ti-dots fs-5"></i>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton<?= $user->id ?>">
                                <li>
                                    <?= $this->Html->link('<i class="fs-4 ti ti-eye"></i> View', ['action' => 'view', $user->id], ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]) ?>
                                </li>
                                <li>
                                    <?= $this->Html->link('<i class="fs-4 ti ti-edit"></i> Edit', ['action' => 'edit', $user->id], ['class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]) ?>
                                </li>
                                <li>
                                    <?= $this->Form->postLink('<i class="fs-4 ti ti-trash"></i> Delete', ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'dropdown-item d-flex align-items-center gap-3', 'escape' => false]) ?>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="paginator">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div class="d-flex align-items-center">
                <p class="mt-3 fs-3">Rows per page:</p>
                <select class="form-select w-auto ms-2 me-4 py-1 pe-7 ps-2 border-0" aria-label="Default select example">
                    <option selected>5</option>
                    <option value="1">10</option>
                    <option value="2">25</option>
                </select>
            </div>
            <ul class="pagination mb-0">
                <li class="page-item p-2">
                    <?= $this->Paginator->first('<< ' . __('first')) ?>
                </li>
                <li class="page-item p-2">
                    <?= $this->Paginator->prev('< ' . __('previous')) ?>
                </li>
                <?= $this->Paginator->numbers(['before' => '<li class="page-item p-2">', 'after' => '</li>']) ?>
                <li class="page-item p-2">
                    <?= $this->Paginator->next(__('next') . ' >') ?>
                </li>
                <li class="page-item p-2">
                    <?= $this->Paginator->last(__('last') . ' >>') ?>
                </li>
            </ul>
        </div>

        <p class="text-center">
            <?= $this->Paginator->counter(__('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')) ?>
        </p>
    </div>
</div>
