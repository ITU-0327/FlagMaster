<?php
/**
 * @var array $themeSettings
 * @var string|null $userRole
 * @var \App\Model\Entity\Order $order
 */

$currencySymbol = 'A$';
$currencyPosition = 'before';
$decimalPlaces = 0;
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
        <?= $this->element('cart-sidebar') ?>
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
        const currencySymbol = '<?= $currencySymbol ?>';
        const currencyPosition = '<?= $currencyPosition ?>';
        const decimalPlaces = <?= $decimalPlaces ?>;

        document.addEventListener('DOMContentLoaded', function() {
            const quantityButtons = document.querySelectorAll(".minus, .add");
            if (quantityButtons) {
                quantityButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        const productId = this.getAttribute('data-product-id');
                        const qtyInputs = document.querySelectorAll('.qty[data-product-id="' + productId + '"]');
                        let currentVal = parseInt(qtyInputs[0].value);
                        const isAdd = this.classList.contains("add");

                        if (!isNaN(currentVal)) {
                            let newVal = isAdd ? currentVal + 1 : currentVal - 1;

                            if (newVal < 1) {
                                // Ask for confirmation to remove the item
                                const confirmDelete = confirm('Are you sure you want to remove this item from your cart?');
                                if (confirmDelete) {
                                    // Remove the item from the cart
                                    removeCartItem(productId);
                                    // Remove the item from the DOM
                                    qtyInputs.forEach(function(qtyInput) {
                                        const itemElement = qtyInput.closest('li, tr');
                                        if (itemElement) {
                                            itemElement.parentNode.removeChild(itemElement);
                                        }
                                    });
                                    // Update the total
                                    updateTotal();
                                } else {
                                    // User canceled, keep the quantity at 1
                                    newVal = 1;
                                    qtyInputs.forEach(function(qtyInput) {
                                        qtyInput.value = newVal;
                                    });
                                    updateProductPrice(productId);
                                    updateTotal();
                                }
                            } else {
                                // Update the quantity
                                qtyInputs.forEach(function(qtyInput) {
                                    qtyInput.value = newVal;
                                });
                                updateProductPrice(productId);
                                updateTotal();

                                // Send AJAX request to update quantity on the server
                                updateCartItem(productId, newVal);
                            }
                        }
                    });
                });
            }

            // Handle the remove buttons (trash icons)
            const removeButtons = document.querySelectorAll('.remove-cart-item');
            if (removeButtons) {
                removeButtons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        const productId = this.getAttribute('data-product-id');
                        const confirmDelete = confirm('Are you sure you want to remove this item from your cart?');
                        if (confirmDelete) {
                            // Remove the item from the cart
                            removeCartItem(productId);
                            // Remove the item from the DOM
                            const qtyInputs = document.querySelectorAll('.qty[data-product-id="' + productId + '"]');
                            qtyInputs.forEach(function(qtyInput) {
                                const itemElement = qtyInput.closest('li, tr');
                                if (itemElement) {
                                    itemElement.parentNode.removeChild(itemElement);
                                }
                            });
                            updateTotal();
                        }
                    });
                });
            }

            updateTotal();

            function updateProductPrice(productId) {
                const qtyInput = document.querySelector('.qty[data-product-id="' + productId + '"]');
                let currentQty = parseInt(qtyInput.value);
                const unitPrice = parseFloat(qtyInput.getAttribute('data-unit-price'));
                const productTotalPrice = unitPrice * currentQty;

                const productPriceElement = document.getElementById('productPrice_' + productId);
                productPriceElement.innerText = formatCurrency(productTotalPrice);
            }

            function updateTotal() {
                let subTotal = 0;
                let itemsExist = false;
                const productQuantities = {};

                const qtyInputs = document.querySelectorAll('.qty');
                qtyInputs.forEach(function(qtyInput) {
                    const productId = qtyInput.getAttribute('data-product-id');
                    let currentQty = parseInt(qtyInput.value);
                    const unitPrice = parseFloat(qtyInput.getAttribute('data-unit-price'));
                    if (!isNaN(currentQty)) {
                        itemsExist = true;
                        // Store the quantity and unit price for each unique product ID
                        productQuantities[productId] = {
                            quantity: currentQty,
                            unitPrice: unitPrice
                        };
                    }
                });

                // Now sum up the subtotal based on unique product IDs
                for (const productId in productQuantities) {
                    const item = productQuantities[productId];
                    subTotal += item.unitPrice * item.quantity;
                }

                let formattedSubTotal = formatCurrency(subTotal);

                // Update subtotal and total cost
                const subTotalElements = document.getElementsByClassName('subTotal');
                for (let i = 0; i < subTotalElements.length; i++) {
                    subTotalElements[i].innerText = formattedSubTotal;
                }

                const totalCostElements = document.getElementsByClassName('totalCost');
                for (let i = 0; i < totalCostElements.length; i++) {
                    totalCostElements[i].innerText = formattedSubTotal;
                }

                // Update cart subtotal in the sidebar
                const cartSubtotalElement = document.getElementById('cartSubtotal');
                if (cartSubtotalElement) {
                    cartSubtotalElement.innerText = formattedSubTotal;
                }

                // If no items exist, display a message or redirect
                if (!itemsExist) {
                    // Handle empty cart in checkout page
                    const tableResponsive = document.querySelector('.table-responsive');
                    if (tableResponsive) {
                        tableResponsive.innerHTML = '<p>Your cart is empty.</p><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']); ?>" class="btn btn-primary">Continue Shopping</a>';
                    }
                }
            }

            function formatCurrency(amount) {
                amount = parseFloat(amount);

                // Format the number with the specified decimal places
                let formattedAmount = amount.toFixed(decimalPlaces);

                // Add currency symbol before or after based on currencyPosition
                if (currencyPosition === 'before') {
                    return currencySymbol + formattedAmount;
                } else {
                    return formattedAmount + currencySymbol;
                }
            }

            function removeCartItem(productId) {
                // Send AJAX request to remove the item from the server-side cart
                const xhr = new XMLHttpRequest();
                xhr.open('POST', '<?= $this->Url->build(['controller' => 'Orders', 'action' => 'removeCartItem']); ?>', true);
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.setRequestHeader('X-CSRF-Token', '<?= $this->request->getAttribute('csrfToken') ?>');

                xhr.onerror = function() {
                    alert('An error occurred while removing the item from the cart. Please try again.');
                };

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                        try {
                            const response = JSON.parse(xhr.responseText);
                            if (response.success) {
                                // Update the cart item count in the navbar
                                const cartItemCountElement = document.querySelector('.popup-badge');
                                if (cartItemCountElement) {
                                    cartItemCountElement.textContent = response.cartItemCount;
                                    if (response.cartItemCount <= 0) {
                                        cartItemCountElement.parentNode.removeChild(cartItemCountElement);
                                    }
                                }
                                updateTotal();
                            } else {
                                alert(response.message || 'Failed to remove item from cart.');
                            }
                        } catch (error) {
                            console.error('Error parsing JSON:', error, xhr.responseText);
                            alert('An error occurred while processing the response.');
                        }
                    }
                };

                xhr.send('product_id=' + encodeURIComponent(productId));
            }

            function updateCartItem(productId, quantity) {
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
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            // Update cart item count in navbar
                            const cartItemCountElement = document.querySelector('.popup-badge');
                            if (cartItemCountElement) {
                                cartItemCountElement.textContent = response.cartItemCount;
                            }
                            updateTotal();
                        } else {
                            alert(response.message || 'Failed to update cart.');
                        }
                    }
                };

                xhr.send('product_id=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity));
            }
        });
    </script>
</body>
</html>
