<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\ContentBlocks\Model\Entity\ContentBlock> $contentBlocksGrouped
 */

/**
 * @return array|array<string>|string|null
 * @var \App\View\AppView $this
 */
$slugify = function ($text) {
    return preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
}
?>

<!--<style>-->
<!--    .single-note-item .card {-->
<!--        transition: all 0.3s ease;-->
<!--        border: none;-->
<!--    }-->
<!---->
<!--    .single-note-item .card:hover {-->
<!--        transform: scale(1.05);-->
<!--        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);-->
<!--    }-->
<!---->
<!--    .side-stick {-->
<!--        width: 5px;-->
<!--        height: 100%;-->
<!--        position: absolute;-->
<!--        top: 0;-->
<!--        left: 0;-->
<!--        border-top-left-radius: 10px;-->
<!--        border-bottom-left-radius: 10px;-->
<!--    }-->
<!--</style>-->

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">Content Management</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">Content Management</li>
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

<ul class="nav nav-pills p-3 mb-3 rounded align-items-center card flex-row">
    <li class="nav-item">
        <a href="javascript:void(0)" class="
                      nav-link
                     gap-6
                      note-link
                      d-flex
                      align-items-center
                      justify-content-center
                      active
                      px-3 px-md-3
                    " id="all-category">
            <i class="ti ti-list fill-white"></i>
            <span class="d-none d-md-block fw-medium">All Blocks</span>
        </a>
    </li>
    <?php foreach (array_keys($contentBlocksGrouped) as $parent) { ?>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3" id="<?= $slugify($parent) ?>">
                <i class="ti ti-list fill-white"></i>
                <span class="d-none d-md-block fw-medium"><?= $parent ?></span>
            </a>
        </li>
    <?php } ?>
    <li class="nav-item ms-auto">
        <a href="javascript:void(0)" class="btn btn-primary d-flex align-items-center px-3 gap-6" id="add-notes">
            <i class="ti ti-file fs-4"></i>
            <span class="d-none d-md-block fw-medium fs-3">Add Blocks</span>
        </a>
    </li>
</ul>
<div class="tab-content">
    <div id="note-full-container" class="note-has-grid row">
        <?php
        $availableColors = [
            'var(--bs-info)', 'var(--bs-danger)', 'var(--bs-success)',
            'var(--bs-secondary)', 'var(--bs-warning)','var(--bs-primary)',
        ];
        $colorIndex = 0;

        foreach ($contentBlocksGrouped as $parent => $contentBlocks) {
            $color = $availableColors[$colorIndex % count($availableColors)];
            $colorIndex++;

            foreach ($contentBlocks as $contentBlock) { ?>
                <div class="col-md-4 single-note-item all-category <?= $slugify($parent)?>">
                    <div class="card card-body shadow-sm">
                        <span class="side-stick" style="background-color: <?= $color ?>;"></span>

                        <div class="d-flex justify-content-between align-items-center">
                            <h6 class="note-title text-truncate w-75 mb-0" data-noteHeading="<?= $contentBlock['label'] ?>" style="font-weight: bold;">
                                <?= $contentBlock['label'] ?>
                            </h6>
                            <?php if ($contentBlock['type'] === 'image') {
                                echo $this->Html->link(
                                    '<i class="ti ti-photo-edit fs-6" title="Edit Image"></i>',
                                    ['action' => 'edit', $contentBlock['id']],
                                    ['class' => 'link ms-1 ms-auto', 'escape' => false]
                                );
                            } else {
                                echo $this->Html->link(
                                    '<i class="ti ti-edit fs-6" title="Edit Content"></i>',
                                    ['action' => 'edit', $contentBlock->id],
                                    ['class' => 'link ms-1 ms-auto', 'escape' => false]
                                );
                            }

                            if (!empty($contentBlock->previous_value)) {
                                echo $this->Form->postLink(
                                    '<i class="ti ti-arrow-back-up fs-6 text-danger" title="Restore Previous Version"></i>',
                                    ['action' => 'restore', $contentBlock->id],
                                    [
                                        'class' => 'link text-danger ms-2',
                                        'escape' => false,
                                        'confirm' => __(
                                            "Are you sure you want to restore the previous version for this item?\n{0}/{1}\nNote: You cannot cancel this action!",
                                            $contentBlock->parent,
                                            $contentBlock->slug
                                        ),
                                    ]
                                );
                            } ?>
                        </div>

                        <p class="note-date fs-2"><?= ucfirst($contentBlock['type']) ?></p>

                        <div class="note-content">
                            <p class="note-inner-content" data-noteContent="<?= $contentBlock['description'] ?>" style="font-size: 0.9rem; margin-bottom: 0;">
                                <?= $contentBlock['description'] ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</div>
<!-- Modal Add notes -->
<div class="modal fade" id="addnotesmodal" tabindex="-1" role="dialog" aria-labelledby="addnotesmodalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content border-0">
            <div class="modal-header text-bg-primary">
                <h6 class="modal-title text-white">Add Blocks</h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="notes-box">
                    <div class="notes-content">
                        <form action="javascript:void(0);" id="addnotesmodalTitle">
                            <div class="row">
                                <div class="col-md-12 mb-3">
                                    <div class="note-title">
                                        <label class="form-label">Note Title</label>
                                        <input type="text" id="note-has-title" class="form-control" minlength="25" placeholder="Title" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="note-description">
                                        <label class="form-label">Note Description</label>
                                        <textarea id="note-has-description" class="form-control" minlength="60" placeholder="Description" rows="3"></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="d-flex gap-6">
                    <button class="btn bg-danger-subtle text-danger" data-bs-dismiss="modal">Discard</button>
                    <button id="btn-n-add" class="btn btn-primary" disabled>Add</button>
                </div>
            </div>
        </div>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js']) ?>
<!-- TODO: Figure out what is this script for. -->
<?php //= $this->Html->script(['/libs/fullcalendar/index.global.min']) ?>
<?= $this->Html->script(['apps/notes']) ?>

<?php $this->end(); ?>
