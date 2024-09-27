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
        <li class="nav-item" role="presentation">
            <button class="nav-link position-relative rounded-0 d-flex align-items-center justify-content-center bg-transparent fs-3 py-3" id="pills-bills-tab" data-bs-toggle="pill" data-bs-target="#pills-bills" type="button" role="tab" aria-controls="pills-bills" aria-selected="false">
                <i class="ti ti-article me-2 fs-6"></i>
                <span class="d-none d-md-block">Bills</span>
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
                                    <?php
                                    $profilePicture = $user->profile->profile_picture ?? 'default.jpg';
                                    echo $this->Html->image($profilePicture, [
                                        'alt' => 'Profile Picture',
                                        'class' => 'img-fluid rounded-circle',
                                        'width' => '120',
                                        'height' => '120',
                                        'id' => 'profileImage',
                                    ]);
                                    ?>
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
                                <p class="card-subtitle mb-4">To change your password please confirm here</p>
                                <div class="mb-3">
                                    <label for="currentPassword" class="form-label">Current Password</label>
                                    <?= $this->Form->password('current_password', [
                                        'class' => 'form-control',
                                        'id' => 'currentPassword',
                                        'autocomplete' => 'off',
                                    ]) ?>
                                </div>
                                <div class="mb-3">
                                    <label for="newPassword" class="form-label">New Password</label>
                                    <?= $this->Form->password('new_password', [
                                        'class' => 'form-control',
                                        'id' => 'newPassword',
                                        'autocomplete' => 'off',
                                    ]) ?>
                                </div>
                                <div>
                                    <label for="confirmPassword" class="form-label">Confirm Password</label>
                                    <?= $this->Form->password('confirm_password', [
                                        'class' => 'form-control',
                                        'id' => 'confirmPassword',
                                        'autocomplete' => 'off',
                                    ]) ?>
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
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="firstName" class="form-label">First Name</label>
                                            <?= $this->Form->text('profile.first_name', [
                                                'class' => 'form-control',
                                                'id' => 'firstName',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="lastName" class="form-label">Last Name</label>
                                            <?= $this->Form->text('profile.last_name', [
                                                'class' => 'form-control',
                                                'id' => 'lastName',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <?= $this->Form->email('email', [
                                                'class' => 'form-control',
                                                'id' => 'email',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="phone" class="form-label">Phone</label>
                                            <?= $this->Form->text('profile.phone', [
                                                'class' => 'form-control',
                                                'id' => 'phone',
                                            ]) ?>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="street" class="form-label">Street</label>
                                            <?= $this->Form->text('profile.address.street', [
                                                'class' => 'form-control',
                                                'id' => 'street',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="city" class="form-label">City</label>
                                            <?= $this->Form->text('profile.address.city', [
                                                'class' => 'form-control',
                                                'id' => 'city',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="state" class="form-label">State</label>
                                            <?= $this->Form->text('profile.address.state', [
                                                'class' => 'form-control',
                                                'id' => 'state',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="postalCode" class="form-label">Postal Code</label>
                                            <?= $this->Form->text('profile.address.postal_code', [
                                                'class' => 'form-control',
                                                'id' => 'postalCode',
                                            ]) ?>
                                        </div>
                                        <div class="mb-3">
                                            <label for="country" class="form-label">Country</label>
                                            <?= $this->Form->text('profile.address.country', [
                                                'class' => 'form-control',
                                                'id' => 'country',
                                            ]) ?>
                                        </div>
<!--                                        <div class="mb-3">-->
<!--                                            <label for="country" class="form-label">Country</label>-->
<!--                                            --><?php //= $this->Form->select('profile.address.country', $countries, [
//                                                'class' => 'form-select',
//                                                'id' => 'country',
//                                                'empty' => '-- Select Country --',
//                                            ]) ?>
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label class="form-label">Location</label>-->
<!--                                            <select class="form-select" aria-label="Default select example">-->
<!--                                                <option selected>United Kingdom</option>-->
<!--                                                <option value="1">United States</option>-->
<!--                                                <option value="2">United Kingdom</option>-->
<!--                                                <option value="3">India</option>-->
<!--                                                <option value="3">Russia</option>-->
<!--                                            </select>-->
<!--                                        </div>-->
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
            <div class="tab-pane fade" id="pills-bills" role="tabpanel" aria-labelledby="pills-bills-tab" tabindex="0">
                <div class="row justify-content-center">
                    <div class="col-lg-9">
                        <div class="card border shadow-none">
                            <div class="card-body p-4">
                                <h4 class="card-title mb-3">Billing Information</h4>
                                <form>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputtext6" class="form-label">Business
                                                    Name*</label>
                                                <input type="text" class="form-control" id="exampleInputtext6" placeholder="Visitor Analytics">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext7" class="form-label">Business
                                                    Address*</label>
                                                <input type="text" class="form-control" id="exampleInputtext7" placeholder="">
                                            </div>
                                            <div>
                                                <label for="exampleInputtext8" class="form-label">First Name*</label>
                                                <input type="text" class="form-control" id="exampleInputtext8" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="mb-3">
                                                <label for="exampleInputtext9" class="form-label">Business
                                                    Sector*</label>
                                                <input type="text" class="form-control" id="exampleInputtext9" placeholder="Arts, Media & Entertainment">
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleInputtext10" class="form-label">Country*</label>
                                                <input type="text" class="form-control" id="exampleInputtext10" placeholder="Romania">
                                            </div>
                                            <div>
                                                <label for="exampleInputtext11" class="form-label">Last Name*</label>
                                                <input type="text" class="form-control" id="exampleInputtext11" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card border shadow-none">
                            <div class="card-body p-4">
                                <h4 class="card-title">Current Plan : <span class="text-success">Executive</span>
                                </h4>
                                <p class="card-subtitle">Thanks for being a premium member and supporting our development.</p>
                                <div class="d-flex align-items-center justify-content-between mt-7 mb-3">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-package text-dark d-block fs-7" width="22" height="22"></i>
                                        </div>
                                        <div>
                                            <p class="mb-0">Current Plan</p>
                                            <h5 class="fs-4 fw-semibold">750.000 Monthly Visits</h5>
                                        </div>
                                    </div>
                                    <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Add">
                                        <i class="ti ti-circle-plus"></i>
                                    </a>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <button class="btn btn-primary">Change Plan</button>
                                    <button class="btn bg-danger-subtle text-danger">Reset Plan</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card border shadow-none">
                            <div class="card-body p-4">
                                <h4 class="card-title">Payment Method</h4>
                                <p class="card-subtitle">On 26 December, 2024</p>
                                <div class="d-flex align-items-center justify-content-between mt-7">
                                    <div class="d-flex align-items-center gap-3">
                                        <div class="text-bg-light rounded-1 p-6 d-flex align-items-center justify-content-center">
                                            <i class="ti ti-credit-card text-dark d-block fs-7" width="22" height="22"></i>
                                        </div>
                                        <div>
                                            <h5 class="fs-4 fw-semibold">Visa</h5>
                                            <p class="mb-0 text-dark">*****2102</p>
                                        </div>
                                    </div>
                                    <a class="text-dark fs-6 d-flex align-items-center justify-content-center bg-transparent p-2 fs-4 rounded-circle" href="javascript:void(0)" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit">
                                        <i class="ti ti-pencil-minus"></i>
                                    </a>
                                </div>
                                <p class="my-2">If you updated your payment method, it will only be dislpayed here after your
                                    next billing cycle.</p>
                                <div class="d-flex align-items-center gap-3">
                                    <button class="btn bg-danger-subtle text-danger">Cancel Subscription</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="d-flex align-items-center justify-content-end gap-6">
                            <button class="btn btn-primary">Save</button>
                            <button class="btn bg-danger-subtle text-danger">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?= $this->Html->script('apps/profileEdit') ?>

<?php $this->end(); ?>

