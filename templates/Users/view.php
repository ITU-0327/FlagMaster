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
                <h4 class="fw-semibold mb-8">User Profile</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">User Profile</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <!--<img src="../assets/images/breadcrumb/ChatBc.png" alt="modernize-img" class="img-fluid mb-n4" />-->
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'modernize-img',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card overflow-hidden">
    <div class="card-body p-0">
        <!--<img src="../assets/images/backgrounds/profilebg.jpg" alt="modernize-img" class="img-fluid">-->
        <?= $this->Html->image('backgrounds/profilebg.jpg', [
            'alt' => 'modernize-img',
            'class' => 'img-fluid',
        ]) ?>
        <div class="row align-items-center">
            <div class="col-lg-4 order-lg-1 order-2">

            </div>
            <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                <div class="mt-n5">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <div class="d-flex align-items-center justify-content-center round-110">
                            <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                <!--<img src="../assets/images/profile/user-1.jpg" alt="modernize-img" class="w-100 h-100">-->
                                <?= $this->Html->image('profile/user-1.jpg', [
                                    'alt' => 'modernize-img',
                                    'class' => 'w-100 h-100',
                                ]) ?>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <h5 class="mb-0"><?= h($user->username) ?></h5>
                        <p class="mb-0"><?= h($user->role) ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 order-lg-3 order-3">
                <div class="d-flex justify-content-center">
                    <div class="text-center">
                        <?= $this->Html->link(__('Edit User'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary me-2']) ?>
                        <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card-body">
    <h4 class="mb-3">Introduction</h4>
    <p class="card-subtitle">This is a summary of the user's profile information.</p>

    <div class="vstack gap-3 mt-4">
        <div class="hstack gap-6">
            <i class="ti ti-user text-dark fs-6"></i>
            <h6 class="mb-0">Username: <?= h($user->username) ?></h6>
        </div>
        <div class="hstack gap-6">
            <i class="ti ti-mail text-dark fs-6"></i>
            <h6 class="mb-0">Email: <?= h($user->email) ?></h6>
        </div>
        <div class="hstack gap-6">
            <i class="ti ti-lock text-dark fs-6"></i>
            <h6 class="mb-0">Role: <?= h($user->role) ?></h6>
        </div>
        <div class="hstack gap-6">
            <i class="ti ti-shield text-dark fs-6"></i>
            <h6 class="mb-0">OAuth Provider: <?= h($user->oauth_provider) ?></h6>
        </div>
        <div class="hstack gap-6">
            <i class="ti ti-id text-dark fs-6"></i>
            <h6 class="mb-0">OAuth ID: <?= h($user->oauth_id) ?></h6>
        </div>
    </div>
</div>
</div>
