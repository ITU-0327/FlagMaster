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

    .custom-dropzone {
        position: relative;
    }

    .custom-file-input {
        opacity: 0;
        position: absolute;
        width: 100%;
        height: 100%;
        cursor: pointer;
    }

    .dropzone {
        border: 2px dashed #0087F7;
        border-radius: 5px;
        background: white;
        padding: 20px;
        min-height: 150px;
        text-align: center;
    }

    .dropzone img {
        max-width: 100%;
        height: auto;
    }

    .dropzone .dz-message {
        font-size: 1em;
        color: #555;
    }

    /* Optional: Style for the dragover state */
    .custom-dropzone.dragover .dropzone {
        border-color: #0056b3;
        background-color: #e6f7ff;
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

<?= $this->Form->create($contentBlock, ['type' => 'file']) ?>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h3 class="card-title mb-4 fs-6"><?= h($contentBlock->label) ?></h3>

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
                                <?= $this->Html->image($contentBlock->value, [
                                    'class' => 'img-fluid content-blocks--image-preview',
                                    'alt' => 'Current Image',
                                ]) ?>
                            </div>
                        <?php } ?>

                        <div class="custom-dropzone">
                            <?= $this->Form->file('value', [
                                'accept' => 'image/*',
                                'label' => false,
                                'class' => 'custom-file-input',
                                'id' => 'customFile',
                            ]) ?>
                            <label for="customFile" class="dropzone">
                                <div class="dz-preview" id="dz-preview">
                                    <div class="dz-message">
                                        <span>Drag and drop a file here or click to select one</span>
                                    </div>
                                </div>
                            </label>
                        </div>
                    </div>
                <?php } ?>

                <div class="d-flex align-items-center gap-3">
                    <?= $this->Form->button(__('Save'), ['class' => 'btn btn-primary']) ?>
                    <?= $this->Html->link('Cancel', ['action' => 'index'], ['class' => 'btn bg-danger-subtle text-danger']) ?>
                </div>

            </div>
        </div>
    </div>
</div>

<?= $this->Form->end() ?>

<?php $this->start('customScript'); ?>

<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js']) ?>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const fileInput = document.getElementById('customFile');
        const dropzone = document.querySelector('.custom-dropzone');
        const dropzoneLabel = dropzone.querySelector('.dropzone');
        const dropzonePreview = dropzoneLabel.querySelector('.dz-preview');

        fileInput.addEventListener('change', function(e) {
            const files = e.target.files;
            if (files && files[0]) {
                const file = files[0];

                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        dropzonePreview.innerHTML = '';

                        const img = document.createElement('img');
                        img.src = e.target.result;
                        img.className = 'content-blocks--image-preview';
                        img.alt = 'New Image Preview';

                        dropzonePreview.appendChild(img);
                    }

                    reader.readAsDataURL(file);
                } else {
                    dropzonePreview.innerHTML = '<div class="dz-message"><span>Selected file is not an image.</span></div>';
                }
            }
        });

        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.add('dragover');
        });

        dropzone.addEventListener('dragleave', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');
        });

        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');

            const files = e.dataTransfer.files;
            if (files.length > 0) {
                fileInput.files = files;

                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        });
    });
</script>

<?php $this->end(); ?>
