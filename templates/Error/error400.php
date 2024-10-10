<?php
/**
 * @var \App\View\AppView $this
 * @var string $message
 * @var string $url
 */
use Cake\Core\Configure;

$this->layout = 'error';

if (Configure::read('debug')) :
    $this->layout = 'dev_error';

    $this->assign('title', $message);
    $this->assign('templateName', 'error400.php');

    $this->start('file');
    echo $this->element('auto_table_warning');
    $this->end();
endif;
?>
<div class="position-relative overflow-hidden min-vh-100 w-100 d-flex align-items-center justify-content-center">
    <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
            <div class="col-lg-4">
                <div class="text-center">
                    <?= $this->Html->image('backgrounds/errorimg.svg', ['alt' => 'flagmaster-img', 'class' => 'img-fluid', 'width' => 500]) ?>
                    <h1 class="fw-semibold my-7 fs-9">Opps!!!</h1>
                    <h4 class="fw-semibold mb-7">This page you are looking for could not be found.</h4>
                    <?= $this->Html->link(
                        __('Back'),
                        'javascript:history.back()',
                        ['class' => 'btn btn-primary me-2', 'role' => 'button']
                    ) ?>
                    <?= $this->Html->link(
                        'Go Back to Home',
                        ['controller' => 'Pages', 'action' => 'home'],
                        ['class' => 'btn btn-primary', 'role' => 'button']
                    ) ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$this->start('customScript'); ?>
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js') ?>
<?php $this->end(); ?>
