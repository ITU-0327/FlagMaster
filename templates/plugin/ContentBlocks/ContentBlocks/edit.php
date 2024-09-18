<?php
/**
 * @var \App\View\AppView $this
 * @var \ContentBlocks\Model\Entity\ContentBlock $contentBlock
 */

$this->Html->script('ContentBlocks.ckeditor/ckeditor', ['block' => true]);
?>

<style>
    .ck-editor__editable_inline {
        min-height: 20rem;
    }
    .content-blocks--image-preview {
        max-height: 300px;
        width: auto;
    }
</style>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Edit Content Block</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Edit Content Block</li>
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4 fs-6"><?= h($contentBlock->label) ?></h3>

                <?= $this->Form->create($contentBlock, ['type' => 'file']) ?>

                <div class="mb-4">
                    <label for="contentBlockDescription" class="form-label fs-4">Description</label>
                    <p id="contentBlockDescription"><?= h($contentBlock->description) ?></p>
                </div>

                <?php if ($contentBlock->type === 'text') { ?>
                    <div class="mb-4">
                        <label for="value" class="form-label fs-4">Text Content</label>
                        <?= $this->Form->control('value', [
                            'type' => 'text',
                            'value' => html_entity_decode($contentBlock->value),
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                <?php } elseif ($contentBlock->type === 'html') { ?>
                    <div class="mb-4">
                        <label for="content-value-input" class="form-label">HTML Content</label>
                        <?= $this->Form->control('value', [
                            'type' => 'textarea',
                            'label' => false,
                            'id' => 'content-value-input',
                            'class' => 'form-control',
                        ]) ?>

                        <script>
                            document.addEventListener("DOMContentLoaded", (event) => {
                                CKSource.Editor.create(
                                    document.getElementById('content-value-input'),
                                    {
                                        toolbar: [
                                            "heading", "|",
                                            "bold", "italic", "underline", "|",
                                            "bulletedList", "numberedList", "|",
                                            "alignment", "blockQuote", "|",
                                            "indent", "outdent", "|",
                                            "link", "|",
                                            "insertTable", "imageInsert", "mediaEmbed", "horizontalLine", "|",
                                            "removeFormat", "|",
                                            "sourceEditing", "|",
                                            "undo", "redo"
                                        ],
                                        simpleUpload: {
                                            uploadUrl: <?= json_encode($this->Url->build(['action' => 'upload'])) ?>,
                                            headers: {
                                                'X-CSRF-TOKEN': <?= json_encode($this->request->getAttribute('csrfToken')) ?>,
                                            }
                                        }
                                    }
                                ).then(editor => {
                                    console.log(Array.from(editor.ui.componentFactory.names()));
                                });
                            });
                        </script>
                    </div>
                <?php } elseif ($contentBlock->type === 'image') { ?>
                    <div class="mb-4">
                        <label for="imageUpload" class="form-label">Image Upload</label>
                        <?php if ($contentBlock->value) { ?>
                            <div class="mb-3">
                                <?= $this->Html->image($contentBlock->value, ['class' => 'img-fluid content-blocks--image-preview']) ?>
                            </div>
                        <?php } ?>
                        <?= $this->Form->control('value', [
                            'type' => 'file',
                            'accept' => 'image/*',
                            'label' => false,
                            'class' => 'form-control',
                        ]) ?>
                    </div>
                <?php } ?>

                <div class="d-flex align-items-center gap-3">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn bg-danger-subtle text-danger']) ?>
                </div>

                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js']) ?>

<?php $this->end(); ?>
