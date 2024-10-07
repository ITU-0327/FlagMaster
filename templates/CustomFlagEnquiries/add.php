<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\CustomFlagEnquiry $customFlagEnquiry
 * @var \Cake\Collection\CollectionInterface|string[] $enquiries
 */
?>
<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Custom Flag Enquiry</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Custom Flag Enquiry', ['controller' => 'enquiries', 'action' => 'index'], ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
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
    <?= $this->Form->create($customFlagEnquiry, ['type' => 'file']) ?>  <!-- Added 'file' type to form -->
    <div class="card-body">
        <div class="d-flex align-items-center">
            <h4 class="card-title mb-0">Custom Flag Enquiry Form</h4>
        </div>
        <p class="card-subtitle mb-3 mt-1">Please fill out the form below to submit a custom flag enquiry.</p>

        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="enquiry_subject" class="form-label">Subject</label>
                    <?= $this->Form->control('enquiry.subject', [
                        'value' => $customFlagEnquiry->enquiry->subject ?? '',
                        'label' => false,
                        'class' => 'form-control',
                        'disabled' => false,
                    ]) ?>
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="enquiry_message" class="form-label">Message</label>
                    <?= $this->Form->textarea('enquiry.message', [
                        'value' => $customFlagEnquiry->enquiry->message ?? '',
                        'label' => false,
                        'class' => 'form-control',
                        'disabled' => false,
                    ]) ?>
                </div>
            </div>

            <!-- Flag Size Radio Buttons -->
            <div class="col-12">
                <div class="mb-3">
                    <label class="form-label">Flag Size</label>
                    <div class="d-flex gap-3 mt-2">
                        <?= $this->Form->radio('flag_size', [
                            ['value' => 'Small', 'text' => 'Small', 'label' => ['class' => 'form-check-label']],
                            ['value' => 'Medium', 'text' => 'Medium', 'label' => ['class' => 'form-check-label']],
                            ['value' => 'Large', 'text' => 'Large', 'label' => ['class' => 'form-check-label']],
                        ], [
                            'label' => false,
                            'class' => 'form-check-input',
                            'legend' => false,
                            'templates' => [
                                'radioWrapper' => '<div class="form-check">{{input}}{{label}}</div>',
                            ],
                        ]) ?>
                    </div>
                </div>
            </div>

            <!-- Flag Color Picker -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="flag_color" class="form-label">Primary Flag Color</label>
                    <?= $this->Form->control('flag_color', [
                        'label' => false,
                        'type' => 'color',
                        'class' => 'form-control form-control-color',
                        'id' => 'flag_color',
                        'value' => '#563d7c', // Default color value
                        'title' => 'Choose your color',
                    ]) ?>
                </div>
            </div>

            <!-- File Upload Section -->
            <div class="col-12">
                <div class="mb-3">
                    <label for="attachment_url" class="form-label">Upload File</label>
                    <?= $this->Form->file('attachment_file', [
                        'class' => 'form-control',
                        'id' => 'attachment_url',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>

    <div class="p-3 border-top">
        <div class="text-center">
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary']) ?>
            <?= $this->Html->link(__('Cancel '), ['action' => 'index'], ['class' => 'btn bg-danger-subtle text-danger ms-6 px-4']) ?>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>
