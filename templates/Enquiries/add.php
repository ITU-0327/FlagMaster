<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 */
?>

<div class="d-flex justify-content-center align-items-center vh-100">
    <div class="col-md-6">
        <h1 class="text-center mb-4">Contact Us</h1>
        <?= $this->Form->create($enquiry) ?>
        <div class="form-group mb-3">
            <?= $this->Form->label('first_name', 'First Name:') ?>
            <?= $this->Form->text('first_name', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group mb-3">
            <?= $this->Form->label('last_name', 'Last Name:') ?>
            <?= $this->Form->text('last_name', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group mb-3">
            <?= $this->Form->label('phone', 'Phone Number:') ?>
            <?= $this->Form->text('phone', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group mb-3">
            <?= $this->Form->label('message', 'Message:') ?>
            <?= $this->Form->textarea('message', ['class' => 'form-control']) ?>
        </div>
        <div class="form-group text-center">
            <?= $this->Form->button(__('Send'), ['class' => 'btn btn-primary']) ?>
        </div>
        <?= $this->Form->end() ?>
    </div>
</div>

<style>
    .vh-100 {
        height: 100vh;
    }

    .form-control {
        border-radius: 0.375rem;
        padding: 0.75rem;
        font-size: 1rem;
    }

    .btn {
        padding: 0.75rem 1.5rem;
        font-size: 1rem;
        color: #fff;
        border: none;
        border-radius: 0.375rem;
        transition: background-color 0.2s ease-in-out;
    }
</style>
