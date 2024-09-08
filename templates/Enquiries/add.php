<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Enquiry $enquiry
 * @var \Cake\Collection\CollectionInterface|string[] $users
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Contact Us</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a class="text-muted text-decoration-none" href="/">Home</a>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Contact Us</li>
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
<div class="card w-100">
    <?= $this->Form->create($enquiry) ?>
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h4 class="card-title mb-0">Enquiry Form</h4>
            <div class="ms-auto">
                <div class="btn-group">
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="javascript:void(0)">Action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Another action</a>
                        <a class="dropdown-item" href="javascript:void(0)">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="javascript:void(0)">Separated link</a>
                    </div>
                </div>
            </div>
        </div>
        <p class="card-subtitle mb-3">Please fill out the form below to submit an enquiry.</p>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="user_id" class="form-label">User</label>
                    <?= $this->Form->control('user_id', [
                        'options' => $users,
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'user_id',
                        'placeholder' => 'Select a User'
                    ]) ?>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="subject" class="form-label">Subject</label>
                    <?= $this->Form->control('subject', [
                        'label' => false,
                        'class' => 'form-control',
                        'id' => 'subject',
                        'placeholder' => 'Subject Here'
                    ]) ?>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="message" class="form-label">Message</label>
                    <?= $this->Form->control('message', [
                        'label' => false,
                        'type' => 'textarea',
                        'class' => 'form-control',
                        'id' => 'message',
                        'rows' => '4',
                        'placeholder' => 'Your message here'
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="p-3 border-top">
        <div class="text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <button type="reset" class="btn bg-danger-subtle text-danger ms-6 px-4">Cancel</button>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
