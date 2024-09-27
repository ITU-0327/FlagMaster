<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var \App\Model\Entity\Profile $profile
 * @var \App\Model\Entity\Address $address
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
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">User Profile</li>
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

<div class="card overflow-hidden">
    <div class="card-body p-0">
        <?= $this->Html->image('backgrounds/profilebg.jpg', [
            'alt' => 'flagmaster-img',
            'class' => 'img-fluid',
        ]) ?>
        <div class="row align-items-center mb-3">
            <div class="col-lg-4 order-lg-1 order-2">
            </div>
            <div class="col-lg-4 mt-n3 order-lg-2 order-1">
                <div class="mt-n5">
                    <div class="d-flex align-items-center justify-content-center mb-2">
                        <div class="d-flex align-items-center justify-content-center round-110">
                            <div class="border border-4 border-white d-flex align-items-center justify-content-center rounded-circle overflow-hidden round-100">
                                <?php $profilePicture = $user->profile->profile_picture ?? 'profile/user-1.jpg';
                                 echo $this->Html->image($profilePicture, [
                                    'alt' => 'flagmaster-img',
                                    'class' => 'w-100 h-100',
                                 ]); ?>
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
                        <?php if ($this->Identity->get('id') === $user->id) : ?>
                            <?= $this->Html->link(__('Edit Profile'), ['action' => 'edit', $user->id], ['class' => 'btn btn-primary me-2']) ?>
                        <?php endif; ?>
                        <?= $this->Form->postLink(__('Delete User'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id), 'class' => 'btn btn-danger']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow-none border">
    <div class="card-body p-4">
        <h4 class="fs-5 mb-7"><?= __('Profile Details') ?></h4>
        <table class="table table-bordered">
            <tr>
                <th>
                    <i class="ti ti-user text-dark fs-6"></i>
                    <?= __('Username') ?>
                </th>
                <td><?= h($user->username) ?></td>
            </tr>
            <tr>
                <th>
                    <i class="ti ti-mail text-dark fs-6"></i>
                    <?= __('Email') ?>
                </th>
                <td><?= h($user->email) ?></td>
            </tr>
            <tr>
                <th>
                    <i class="ti ti-lock text-dark fs-6"></i>
                    <?= __('Role') ?>
                </th>
                <td><?= h($user->role) ?></td>
            </tr>
            <?php if (!empty($user->profile)) : ?>
                <tr>
                    <th>
                        <i class="ti ti-id-badge text-dark fs-6"></i>
                        <?= __('Name') ?>
                    </th>
                    <td><?= h($user->profile->first_name) ?> <?= h($user->profile->last_name) ?></td>
                </tr>
                <tr>
                    <th>
                        <i class="ti ti-phone text-dark fs-6"></i>
                        <?= __('Phone Number') ?>
                    </th>
                    <td><?= h($user->profile->phone) ?></td>
                </tr>
            <?php endif; ?>
        </table>
    </div>
</div>

<?php if (!empty($user->profile->address)) : ?>
    <div class="card shadow-none border">
        <div class="card-body p-4">
            <h4 class="fs-5 mb-7"><?= __('Address Information') ?></h4>
            <table class="table table-bordered">
                <tr>
                    <th>
                        <i class="ti ti-map-pin text-dark fs-6"></i>
                        <?= __('Street') ?>
                    </th>
                    <td><?= h($user->profile->address->street) ?></td>
                </tr>
                <tr>
                    <th>
                        <i class="ti ti-building text-dark fs-6"></i>
                        <?= __('City') ?>
                    </th>
                    <td><?= h($user->profile->address->city) ?></td>
                </tr>
                <tr>
                    <th>
                        <i class="ti ti-compass text-dark fs-6"></i>
                        <?= __('State') ?>
                    </th>
                    <td><?= h($user->profile->address->state) ?></td>
                </tr>
                <tr>
                    <th>
                        <i class="ti ti-zip text-dark fs-6"></i>
                        <?= __('Postal Code') ?>
                    </th>
                    <td><?= h($user->profile->address->postal_code) ?></td>
                </tr>
                <tr>
                    <th>
                        <i class="ti ti-flag text-dark fs-6"></i>
                        <?= __('Country') ?>
                    </th>
                    <td><?= h($user->profile->address->country) ?></td>
                </tr>
            </table>
        </div>
    </div>
<?php endif; ?>
