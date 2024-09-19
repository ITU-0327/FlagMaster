<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\User $user
 */
?>
<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                <div class="card mb-0">
                    <div class="card-body">
                        <a href="" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                            <?= $this->Html->image(
                                'logos/dark-logo.svg',
                                ['alt' => 'Logo-Dark', 'class' => 'dark-logo']
                            ); ?>
                            <?= $this->Html->image(
                                'logos/light-logo.svg',
                                ['alt' => 'Logo-light', 'class' => 'light-logo']
                            ); ?>
                        </a>
                        <div class="row">
                            <div class="col-6 mb-2 mb-sm-0">
                                <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                                    <?= $this->Html->image(
                                        'svgs/google-icon.svg',
                                        ['alt' => 'flagmaster-img', 'class' => 'img-fluid me-2', 'width' => 18, 'height' => 18]
                                    ); ?>
                                    <span class="flex-shrink-0">with Google</span>
                                </a>
                            </div>
                            <div class="col-6">
                                <a class="btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8" href="javascript:void(0)" role="button">
                                    <?= $this->Html->image(
                                        'svgs/facebook-icon.svg',
                                        ['alt' => 'flagmaster-img', 'class' => 'img-fluid me-2', 'width' => 18, 'height' => 18]
                                    ); ?>
                                    <span class="flex-shrink-0">with FB</span>
                                </a>
                            </div>
                        </div>
                        <div class="position-relative text-center my-4">
                            <p class="mb-0 fs-4 px-3 d-inline-block bg-white z-index-5 position-relative">or sign Up with</p>
                            <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                        </div>
                        <?= $this->Form->create($user) ?>
                        <div class="mb-3">
                            <?= $this->Form->control('email', [
                                'label' => ['text' => 'Email address', 'class' => 'form-label'],
                                'class' => 'form-control',
                                'id' => 'exampleInputEmail1',
                                'aria-describedby' => 'emailHelp',
                            ]); ?>
                        </div>
                        <div class="mb-3">
                            <?= $this->Form->control('password', [
                                'label' => ['text' => 'Password', 'class' => 'form-label'],
                                'class' => 'form-control',
                                'id' => 'exampleInputPassword1',
                            ]); ?>
                        </div>
                        <div class="mb-4">
                            <?= $this->Form->control('password_confirm', [
                                'type' => 'password',
                                'label' => ['text' => 'Confirm Password', 'class' => 'form-label'],
                                'class' => 'form-control',
                                'id' => 'exampleInputPassword2',
                            ]); ?>
                        </div>
                        <?= $this->Form->button('Sign Up', ['class' => 'btn btn-primary w-100 py-8 mb-4 rounded-2']) ?>
                        <div class="d-flex align-items-center">
                            <p class="fs-4 mb-0 text-dark">Already have an Account?</p>
                            <?= $this->Html->link('Sign In', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'text-primary fw-medium ms-2']); ?>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php
$this->start('customScript'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js'); ?>
<?php $this->end(); ?>
