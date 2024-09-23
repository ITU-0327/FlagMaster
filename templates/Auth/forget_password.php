<?php
/**
 * @var \App\View\AppView $this
 */

$this->layout = 'auth'; // Or 'login', depending on your layout
$this->assign('title', 'Forget Password');
?>
<div class="position-relative overflow-hidden radial-gradient min-vh-100 w-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3 auth-card">
                <div class="card mb-0">
                    <div class="card-body pt-5">
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
                        <div class="mb-5 text-center">
                            <p class="mb-0 ">
                                Please enter the email address associated with your account, and we will email you a link to reset your password.
                            </p>
                        </div>
                        <?= $this->Form->create(null, ['class' => '']) ?>
                        <?= $this->Flash->render() ?>
                        <div class="mb-3">
                            <?= $this->Form->control('email', [
                                'type' => 'email',
                                'label' => [
                                    'text' => 'Email address',
                                    'class' => 'form-label',
                                ],
                                'class' => 'form-control',
                                'id' => 'exampleInputEmail1',
                                'aria-describedby' => 'emailHelp',
                                'required' => true,
                                'autofocus' => true,
                            ]) ?>
                        </div>
                        <?= $this->Form->button('Forgot Password', ['class' => 'btn btn-primary w-100 py-8 mb-3']) ?>
                        <?= $this->Form->end() ?>
                        <?= $this->Html->link('Back to Login', ['controller' => 'Auth', 'action' => 'login'], ['class' => 'btn bg-primary-subtle text-primary w-100 py-8']) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->start('customScript'); ?>
<script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
<?php $this->end(); ?>
