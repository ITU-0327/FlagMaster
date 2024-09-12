<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Account Setting</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit User</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'modernize-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card w-100 border position-relative overflow-hidden mb-0">
    <div class="card-body p-4">
        <h4 class="card-title">Edit User Details</h4>
        <p class="card-subtitle mb-4">To change your personal details, edit and save the information here.</p>
        <?= $this->Form->create($user) ?>
        <div class="row">
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <?= $this->Form->control('username', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <?= $this->Form->control('email', ['type' => 'email', 'class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <?= $this->Form->control('password', ['type' => 'password', 'class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <?= $this->Form->control('role', ['class' => 'form-select', 'label' => false]) ?>
                </div>
                <div class="mb-3">
                    <label for="oauth_provider" class="form-label">OAuth Provider</label>
                    <?= $this->Form->control('oauth_provider', ['class' => 'form-select', 'label' => false]) ?>
                </div>
                <div class="mb-3">
                    <label for="oauth_id" class="form-label">OAuth ID</label>
                    <?= $this->Form->control('oauth_id', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="created_at" class="form-label">Created At</label>
                    <?= $this->Form->control('created_at', ['class' => 'form-control', 'label' => false]) ?>
                </div>
                <div class="mb-3">
                    <label for="updated_at" class="form-label">Updated At</label>
                    <?= $this->Form->control('updated_at', ['class' => 'form-control', 'label' => false]) ?>
                </div>
            </div>
            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <a href="<?= $this->Url->build(['action' => 'index']) ?>" class="btn bg-danger-subtle text-danger">Cancel</a>
                </div>
            </div>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>
