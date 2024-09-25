<?php
/**
 * @var \App\View\AppView $this
 */

$aboutUsCount = 3;
?>

<?php $this->start('css'); ?>

<?= $this->Html->css('about-us') ?>

<?php $this->end(); ?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">About Us</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">About Us</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'About Us',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card position-relative overflow-hidden">
    <div class="card-body">
        <div class="container">
            <?php for ($i = 1; $i <= $aboutUsCount; $i++) : ?>
                <?php
                $reverse = ($i % 2 == 0);
                ?>
                <div class="section <?= $reverse ? 'reverse' : '' ?>">
                    <div class="image">
                        <?= $this->ContentBlock->image(
                            "section-$i-image",
                            [
                                'alt' => $this->ContentBlock->text("section-$i-heading-main"),
                                'class' => 'img-fluid',
                            ]
                        ); ?>
                    </div>
                    <div class="text">
                        <h6 class="small-heading">
                            <?= $this->ContentBlock->text("section-$i-heading-small"); ?>
                        </h6>
                        <h2 class="main-heading">
                            <?= $this->ContentBlock->text("section-$i-heading-main"); ?>
                        </h2>
                        <?= $this->ContentBlock->html("section-$i-description"); ?>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
