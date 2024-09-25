<?php
/**
 * @var \App\View\AppView $this
 */

// Make sure the FAQ content blocks exist and match the expected count
$faqCount = 11;
?>

<?php $this->start('css'); ?>

<?php $this->end(); ?>

<div class="card bg-info-subtle shadow-none position-relative overflow-hidden mb-4">
    <div class="card-body px-4 py-3">
        <div class="row align-items-center">
            <div class="col-9">
                <h4 class="fw-semibold mb-8">FAQ</h4>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <?= $this->Html->link('Home', '/', ['class' => 'text-muted text-decoration-none']) ?>
                        </li>
                        <li class="breadcrumb-item" aria-current="page">FAQ</li>
                    </ol>
                </nav>
            </div>
            <div class="col-3">
                <div class="text-center mb-n5">
                    <?= $this->Html->image('breadcrumb/ChatBc.png', [
                        'alt' => 'FAQ',
                        'class' => 'img-fluid mb-n4',
                    ]) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-9">
        <div class="text-center mb-7">
            <h3 class="fw-semibold">Frequently asked questions</h3>
            <p class="fw-normal mb-0 fs-4">Get to know more about FlagMaster’s products and services.</p>
        </div>
        <div class="accordion accordion-flush mb-5 card position-relative overflow-hidden" id="accordionFlushExample">
            <?php for ($i = 1; $i <= $faqCount; $i++) : ?>
                <?php
                // Generate unique IDs for each accordion item
                $headingId = 'flush-heading' . $i;
                $collapseId = 'flush-collapse' . $i;

                // Fetch the answer content block
                try {
                    $question = $this->ContentBlock->text('faq-' . $i . '-question');
                } catch (Exception $e) {
                    $question = '';
                }

                // Fetch the answer content block
                try {
                    $answer = $this->ContentBlock->html('faq-' . $i . '-answer');
                } catch (Exception $e) {
                    $answer = '';
                }

                // Skip rendering if question or answer is empty
                if (empty($question) || empty($answer)) {
                    continue;
                }
                ?>
                <div class="accordion-item">
                    <h2 class="accordion-header" id="<?= h($headingId) ?>">
                        <button class="accordion-button collapsed fs-5 fw-semibold shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#<?= h($collapseId) ?>" aria-expanded="false" aria-controls="<?= h($collapseId) ?>">
                            <?= $question ?>
                        </button>
                    </h2>
                    <div id="<?= h($collapseId) ?>" class="accordion-collapse collapse" aria-labelledby="<?= h($headingId) ?>" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body fw-normal fs-4">
                            <?= $answer ?>
                        </div>
                    </div>
                </div>
            <?php endfor; ?>
        </div>
    </div>
</div>
<div class="card bg-primary-subtle rounded-2">
    <div class="card-body text-center">
        <div class="d-flex align-items-center justify-content-center mb-4 pt-8">
            <a href="javascript:void(0)">
                <?= $this->Html->image('profile/user-3.jpg', [
                    'class' => 'rounded-circle me-n2 card-hover border border-2 border-white',
                    'width' => 44,
                    'height' => 44,
                ]) ?>
            </a>
            <a href="javascript:void(0)">
                <?= $this->Html->image('profile/user-2.jpg', [
                    'class' => 'rounded-circle me-n2 card-hover border border-2 border-white',
                    'width' => 44,
                    'height' => 44,
                ]) ?>
            </a>
            <a href="javascript:void(0)">
                <?= $this->Html->image('profile/user-4.jpg', [
                    'class' => 'rounded-circle me-n2 card-hover border border-2 border-white',
                    'width' => 44,
                    'height' => 44,
                ]) ?>
            </a>
        </div>
        <h3 class="fw-semibold">Still have questions</h3>
        <p class="fw-normal mb-4 fs-4">
            Can't find the answer you're looking for ? Please chat to our friendly team.
        </p>
        <?= $this->Html->link(
            'Contact Us',
            ['controller' => 'Enquiries', 'action' => 'add'],
            ['class' => 'btn btn-outline-primary']
        ) ?>
    </div>
</div>

<?php $this->start('customScript'); ?>

<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>

<?php $this->end(); ?>
