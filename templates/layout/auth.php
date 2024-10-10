<?php
/**
 * @var array $themeSettings
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->element('title-meta', ['title' => $this->fetch('title')]) ?>
    <?= $this->html->css('cake') ?>
</head>

<body>
    <!-- Preloader -->
    <div class="preloader">
        <?= $this->ContentBlock->image('preloader-logo', [
            'alt' => 'loader',
            'class' => 'lds-ripple img-fluid',
        ]) ?>
    </div>

    <div id="main-wrapper" class="auth-customizer-none">
        <?= $this->fetch('content') ?>
    </div>
    <div class="dark-transparent sidebartoggler"></div>

    <script>
        let userSettings = <?= json_encode($themeSettings) ?>;
    </script>

    <?= $this->element('vendor-script') ?>
    <?= $this->fetch('customScript') ?>
    <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
    </script>
</body>

</html>
