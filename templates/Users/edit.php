<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 * @var bool $hasPassword
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
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Account Setting</li>
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

<div class="card">
    <ul class="nav nav-pills user-profile-tab" id="pills-tab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link position-relative rounded-0 active d-flex align-items-center justify-content-center bg-transparent fs-3 py-3" id="pills-account-tab" data-bs-toggle="pill" data-bs-target="#pills-account" type="button" role="tab" aria-controls="pills-account" aria-selected="true">
                <i class="ti ti-user-circle me-2 fs-6"></i>
                <span class="d-none d-md-block">Account</span>
            </button>
        </li>
    </ul>
    <div class="card-body">
        <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade show active" id="pills-account" role="tabpanel" aria-labelledby="pills-account-tab" tabindex="0">
                <?= $this->Form->create($user, ['type' => 'file']) ?>
                <div class="row">
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Change Profile</h4>
                                <p class="card-subtitle mb-4">Change your profile picture from here</p>
                                <div class="text-center">
                                    <?php $profilePicture = $user->profile->profile_picture ?? 'profile/user-1.jpg';
                                    echo $this->Html->image($profilePicture, [
                                        'alt' => 'Profile Picture',
                                        'class' => 'img-fluid rounded-circle',
                                        'width' => '120',
                                        'height' => '120',
                                        'id' => 'profileImage',
                                    ]); ?>
                                    <div class="d-flex align-items-center justify-content-center my-4 gap-6">
                                        <?= $this->Form->file('profile.profile_picture', [
                                            'label' => false,
                                            'id' => 'profilePictureInput',
                                            'accept' => 'image/*',
                                            'style' => 'display: none;',
                                        ]) ?>
                                        <button type="button" class="btn btn-primary" id="uploadButton">Upload</button>
                                        <button type="button" class="btn bg-danger-subtle text-danger" id="resetButton">Reset</button>
                                    </div>
                                    <p class="mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 d-flex align-items-stretch">
                        <div class="card w-100 border position-relative overflow-hidden">
                            <div class="card-body p-4">
                                <h4 class="card-title">Change Password</h4>

                                <?php if ($hasPassword) : ?>
                                    <p class="card-subtitle mb-4">To change your password please confirm here</p>
                                    <div class="mb-3">
                                        <label for="current-password" class="form-label">Current Password</label>
                                        <?= $this->Form->password('current_password', [
                                            'class' => 'form-control',
                                            'id' => 'current-password',
                                            'autocomplete' => 'off',
                                            'label' => false,
                                            'placeholder' => 'Enter your current password',
                                        ]); ?>
                                        <?= $this->Form->error('current_password'); ?>
                                    </div>
                                <?php else : ?>
                                    <p class="card-subtitle mb-4">You do not have a password set. Please set a new password below.</p>
                                <?php endif; ?>

                                <div class="mb-3">
                                    <label for="new-password" class="form-label">New Password</label>
                                    <?= $this->Form->password('new_password', [
                                        'class' => 'form-control',
                                        'id' => 'new-password',
                                        'autocomplete' => 'off',
                                        'label' => false,
                                        'placeholder' => 'Enter your new password',
                                        'title' => 'Password must be at least 8 characters long and include at least one number and one special character.',
                                        'data-bs-toggle' => 'tooltip',
                                        'data-bs-placement' => 'left',
                                    ]); ?>
                                    <div id="password-strength" class="mt-1 fs-3"></div>
                                    <?= $this->Form->error('new_password'); ?>
                                </div>
                                <div>
                                    <label for="confirm-password" class="form-label">Confirm Password</label>
                                    <?= $this->Form->password('confirm_password', [
                                        'class' => 'form-control',
                                        'id' => 'confirm-password',
                                        'autocomplete' => 'off',
                                        'label' => false,
                                        'placeholder' => 'Confirm your new password',
                                    ]); ?>
                                    <div id="password-match" class="mt-1 fs-3"></div>
                                    <?= $this->Form->error('confirm_password'); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card w-100 border position-relative overflow-hidden mb-0">
                            <div class="card-body p-4">
                                <h4 class="card-title">Personal Details</h4>
                                <p class="card-subtitle mb-4">To change your personal detail , edit and save from here</p>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">Username</label>
                                            <?= $this->Form->text('username', [
                                                'class' => 'form-control',
                                                'id' => 'username',
                                            ]); ?>
                                            <?= $this->Form->error('username'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <?= $this->Form->text('profile.first_name', [
                                                'class' => 'form-control',
                                                'id' => 'firstName',
                                            ]); ?>
                                            <?= $this->Form->error('profile.first_name'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <?= $this->Form->text('profile.last_name', [
                                                'class' => 'form-control',
                                                'id' => 'lastName',
                                            ]); ?>
                                            <?= $this->Form->error('profile.last_name'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <?= $this->Form->email('email', [
                                                'class' => 'form-control',
                                                'id' => 'email',
                                            ]); ?>
                                            <?= $this->Form->error('email'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <?= $this->Form->text('profile.phone', [
                                                'class' => 'form-control',
                                                'id' => 'phone',
                                            ]); ?>
                                            <?= $this->Form->error('profile.phone'); ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="street" class="form-label">Street</label>
                                            <?= $this->Form->text('profile.address.street', [
                                                'class' => 'form-control',
                                                'id' => 'street',
                                            ]); ?>
                                            <?= $this->Form->error('profile.address.street'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <?= $this->Form->text('profile.address.city', [
                                                'class' => 'form-control',
                                                'id' => 'city',
                                            ]); ?>
                                            <?= $this->Form->error('profile.address.city'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <?= $this->Form->text('profile.address.state', [
                                                'class' => 'form-control',
                                                'id' => 'state',
                                            ]) ?>
                                            <?= $this->Form->error('profile.address.state'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="postalCode" class="form-label">Postal Code</label>
                                            <?= $this->Form->text('profile.address.postal_code', [
                                                'class' => 'form-control',
                                                'id' => 'postalCode',
                                            ]) ?>
                                            <?= $this->Form->error('profile.address.postal_code'); ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <?= $this->Form->text('profile.address.country', [
                                                'class' => 'form-control',
                                                'id' => 'country',
                                            ]) ?>
                                            <?= $this->Form->error('profile.address.country'); ?>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="d-flex align-items-center justify-content-end mt-4 gap-6">
                                            <?= $this->Form->button('Save', ['class' => 'btn btn-primary']) ?>
                                            <?= $this->Html->link('Cancel', ['action' => 'view', $user->id], ['class' => 'btn bg-danger-subtle text-danger']) ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://cdnjs.cloudflare.com/ajax/libs/zxcvbn/4.4.2/zxcvbn.js'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('apps/profileEdit') ?>
<?= $this->Html->script('apps/passwordStrength'); ?>

<?php $this->end(); ?>

