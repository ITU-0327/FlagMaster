<?php
/**
 * @var \App\View\AppView $this
 */
?>

<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                <div class="card mb-0">
                    <div class="card-body">
                        <?= $this->Html->link(
                            $this->Html->image('logos/dark-logo.svg', [
                                'alt' => 'Logo-Dark',
                                'class' => 'dark-logo',
                            ]) .
                            $this->Html->image('logos/light-logo.svg', [
                                'alt' => 'Logo-light',
                                'class' => 'light-logo',
                            ]),
                            '/',
                            ['class' => 'text-nowrap logo-img text-center d-block mb-5 w-100', 'escape' => false]
                        ) ?>
                        <div class="row">
                            <div class="col-12 mb-2 mb-sm-0">
                                <?= $this->Html->link(
                                    $this->Html->image('svgs/google-icon.svg', [
                                        'alt' => 'Google',
                                        'class' => 'img-fluid me-2',
                                        'width' => 18,
                                        'height' => 18,
                                    ]) . '<span class="flex-shrink-0">with Google</span>',
                                    ['controller' => 'Auth', 'action' => 'googleLogin'],
                                    [
                                        'escape' => false,
                                        'class' => 'btn text-dark border fw-normal d-flex align-items-center justify-content-center rounded-2 py-8',
                                    ]
                                ); ?>
                            </div>
                        </div>
                        <div class="position-relative text-center my-4">
                            <p class="mb-0 fs-4 px-3 d-inline-block bg-body text-dark z-index-5 position-relative">
                                or sign in with
                            </p>
                            <span class="border-top w-100 position-absolute top-50 start-50 translate-middle"></span>
                        </div>
                        <?= $this->Form->create(null, ['class' => '']) ?>
                        <div class="mb-3">
                            <?= $this->Form->control('email', [
                                'label' => 'Email',
                                'type' => 'email',
                                'class' => 'form-control',
                                'id' => 'email',
                                'required' => true,
                                'templates' => [
                                    'inputContainer' => '{{content}}',
                                ],
                            ]); ?>
                        </div>
                        <div class="mb-4">
                            <?= $this->Form->control('password', [
                                'label' => 'Password',
                                'type' => 'password',
                                'class' => 'form-control',
                                'id' => 'password',
                                'required' => true,
                                'templates' => [
                                    'inputContainer' => '{{content}}',
                                ],
                            ]); ?>
                        </div>
                        <div class="d-flex align-items-center justify-content-between mb-4">
                            <div class="form-check">
                                <?= $this->Form->checkbox(
                                    'remember_me',
                                    ['class' => 'form-check-input primary', 'id' => 'flexCheckChecked']
                                ); ?>
                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                    Remember this Device
                                </label>
                            </div>
                            <?= $this->Html->link(
                                'Forgot Password?',
                                ['controller' => 'Auth', 'action' => 'forgetPassword'],
                                ['class' => 'text-primary fw-medium']
                            ); ?>
                        </div>

                        <div class="mb-4">
                            <div class="cf-turnstile" data-sitekey="0x4AAAAAAAkd0EvD2eY9X-kL"></div>
                        </div>

                        <?= $this->Form->button(
                            'Sign In',
                            ['class' => 'btn btn-primary w-100 py-8 mb-4 rounded-2']
                        ); ?>
                        <?= $this->Form->end() ?>

                        <div class="d-flex align-items-center justify-content-center">
                            <p class="fs-4 mb-0 fw-medium">New to flagmaster?</p>
                            <?= $this->Html->link(
                                'Create an account',
                                ['controller' => 'Auth', 'action' => 'register'],
                                ['class' => 'text-primary fw-medium ms-2']
                            ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js'); ?>
<?= $this->Html->script('https://challenges.cloudflare.com/turnstile/v0/api.js', ['async' => true, 'defer' => true]); ?>

<?php $this->end(); ?>
