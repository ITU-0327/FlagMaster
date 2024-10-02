<?php
/**
 * @var array $themeSettings
 * @var string|null $userRole
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
    <?= $this->element('title-meta', ['title' => $this->fetch('title')]) ?>
</head>

<body>
<!-- Preloader -->
<div class="preloader">
    <?= $this->ContentBlock->image('preloader-logo', [
        'alt' => 'loader',
        'class' => 'lds-ripple img-fluid',
    ]) ?>
</div>

<div id="main-wrapper">
    <?php if ($userRole == 'admin') : ?>
        <?= $this->element('left-sidebar') ?>
    <?php endif; ?>

    <!-- Sidebar End -->
    <div class="page-wrapper">
        <?= $this->element('navbar') ?>

        <div class="body-wrapper">
            <div class="container-fluid">
                <?= $this->Flash->render() ?>
                <?= $this->fetch('content') ?>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end shopping-cart" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <?= $this->element('cart_sidebar') ?>
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

    <script>
        const quantityButtons = document.querySelectorAll(".minus, .add");
        if (quantityButtons) {
            quantityButtons.forEach(function (button) {
                button.addEventListener("click", function () {
                    const qtyInput = this.closest("div").querySelector(".qty");
                    let currentVal = parseInt(qtyInput.value);
                    const isAdd = this.classList.contains("add");
                    const productId = this.getAttribute('data-product-id');

                    if (!isNaN(currentVal)) {
                        qtyInput.value = isAdd
                            ? ++currentVal
                            : currentVal > 0
                            ? --currentVal
                            : currentVal;

                        // Send AJAX request to update quantity on the server
                        const xhr = new XMLHttpRequest();
                        xhr.open('POST', '<?= $this->Url->build(['controller' => 'Orders', 'action' => 'updateCartItem']); ?>', true);
                        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                        xhr.setRequestHeader('X-CSRF-Token', '<?= $this->request->getAttribute('csrfToken') ?>');

                        xhr.onerror = function() {
                            alert('An error occurred while updating the cart. Please try again.');
                        };

                        xhr.onreadystatechange = function() {
                            if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                                // Update the price and subtotal in the sidebar
                                const response = JSON.parse(xhr.responseText);
                                if (response.success) {
                                    // Update subtotal and total
                                    document.getElementById('cartSubtotal').textContent = response.subTotalFormatted;

                                    const cartItemCountElement = document.querySelector('.popup-badge');
                                    if (response.cartItemCount <= 0 && cartItemCountElement) {
                                        cartItemCountElement.parentNode.removeChild(cartItemCountElement);
                                        return;
                                    }

                                    if (cartItemCountElement) {
                                        cartItemCountElement.textContent = response.cartItemCount;
                                    } else {
                                        // If the badge doesn't exist yet, create it
                                        const navLink = document.querySelector('.nav-link[data-bs-target="#offcanvasRight"]');
                                        const badge = document.createElement('span');
                                        badge.className = 'popup-badge rounded-pill bg-danger text-white fs-2';
                                        badge.textContent = response.cartItemCount;
                                        navLink.appendChild(badge);
                                    }
                                }
                            }
                        };

                        xhr.send('product_id=' + productId + '&quantity=' + currentVal);
                    }
                });
            });
        }
    </script>
</body>
</html>
