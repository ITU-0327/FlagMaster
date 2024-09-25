<?php
/**
 * @var \App\View\AppView $this
 * @var iterable<\ContentBlocks\Model\Entity\ContentBlock> $contentBlocksGrouped
 */

$icons = [
    'global' => 'ti ti-world',
    'landing-page' => 'ti ti-home',
    'about-us' => 'ti ti-file-info',
    'faq' => 'ti ti-zoom-question',
];

$slugify = function ($text) {
    return preg_replace('/[^A-Za-z0-9-]+/', '-', $text);
};

$formatParent = function ($parent): string {
    $formattedParent = str_replace('-', ' ', $parent);

    return ucwords($formattedParent);
};
?>

<style>
    .single-note-item .card:hover {
        transform: translateY(-5px);
        transition: all 0.3s ease-in-out;
        box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
    }
    .note-content {
        min-height: 45px;
    }
</style>

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
                        'alt' => 'flagmaster-img',
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
    <?php foreach (array_keys($contentBlocksGrouped) as $parent) {
        $iconClass = $icons[$parent] ?? 'ti ti-list'; ?>
        <li class="nav-item">
            <a href="javascript:void(0)" class="nav-link gap-6 note-link d-flex align-items-center justify-content-center px-3 px-md-3" id="<?= $slugify($parent) ?>">
                <i class="<?= $iconClass ?> fill-white"></i>
                <span class="d-none d-md-block fw-medium"><?= $formatParent($parent) ?></span>
            </a>
        </li>
    <?php } ?>
</ul>
<div class="tab-content">
    <div id="note-full-container" class="note-has-grid row">
        <?php
        $availableColors = [
            'var(--bs-info)', 'var(--bs-danger)', 'var(--bs-success)',
            'var(--bs-warning)', 'var(--bs-secondary)', 'var(--bs-primary)',
        ];
        $colorIndex = 0;

        foreach ($contentBlocksGrouped as $parent => $contentBlocks) {
            $color = $availableColors[$colorIndex % count($availableColors)];
            $colorIndex++;

            foreach ($contentBlocks as $contentBlock) {?>
                <div class="col-md-4 single-note-item all-category <?= $slugify($parent) ?>">
                    <div class="card card-body shadow-sm" style="padding-top: 20px; padding-bottom: 15px; border-radius: 10px;">
                        <span class="side-stick" style="background-color: <?= $color ?>;" title="page: <?= $parent ?>"></span>

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

<?php $this->start('customScript'); ?>

<?= $this->Html->script(['https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js']) ?>
<script>
    const $btns = $(".note-link").click(function () {
        const $el = $("." + this.id).fadeIn();
        $("#note-full-container > div").not($el).hide();
        $btns.removeClass("active");
        $(this).addClass("active");
    });
</script>

<?php $this->end(); ?>
