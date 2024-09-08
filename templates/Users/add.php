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
                <h4 class="fw-semibold mb-8">Add New User</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">User</li>
                        <li class="breadcrumb-item" aria-current="page">Add</li>
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

<div class="row">
    <aside class="column">
        <div class="side-nav">
            <?= $this->Form->button(__('View Exist User'), [
                'type' => 'button',
                'onclick' => "location.href='" . $this->Url->build(['action' => 'index']) . "'",
                'class' => 'btn btn-primary mb-3',
            ]) ?>
        </div>
    </aside>
    <div class="column column-80">
        <div class="users form content">
            <?= $this->Form->create($user) ?>
            <fieldset>
                <legend><?= __('Add User') ?></legend>
                <label>
                    <i class="ti ti-user me-2 fs-4"></i>Username
                </label>
                <div class="form-floating mb-3">
                    <?= $this->Form->control('username', [
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Username'
                    ]) ?>
                </div>
                <label>
                    <i class="ti ti-mail me-2 fs-4"></i>Email Address
                </label>
                <div class="form-floating mb-3">
                    <?= $this->Form->control('email', [
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Email'
                    ]) ?>
                </div>
                <label>
                    <i class="ti ti-lock me-2 fs-4"></i>Password
                </label>
                <div class="form-floating mb-3">
                    <?= $this->Form->control('password', [
                        'label' => false,
                        'class' => 'form-control',
                        'placeholder' => 'Password'
                    ]) ?>
                </div>
                <label>
                    <i class="ti ti-lock me-2 fs-4"></i>Confirm Password
                </label>
                <div class="form-floating mb-3">
                    <div class="input">
                        <input type="password" class="form-control" placeholder="Confirm Password" aria-label="Password">
                    </div>
                </div>
            </fieldset>
            <div class="mt-3 mt-md-0 ms-auto">
                <?= $this->Form->button(__('Submit'), [
                    'type' => 'submit',
                    'class' => 'btn btn-primary hstack gap-6'
                ]) ?>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>
