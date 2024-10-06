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
        const currencySymbol = '<?= $currencySymbol ?>';
        const currencyPosition = '<?= $currencyPosition ?>';
        const decimalPlaces = <?= $decimalPlaces ?>;
        let shippingCost = 0;
    </script>

    <?= $this->element('vendor-script') ?>
    <?= $this->fetch('customScript') ?>
    <script>
        function handleColorTheme(e) {
            document.documentElement.setAttribute("data-color-theme", e);
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Instead of adding event listeners to each button, use event delegation
            document.body.addEventListener('click', function(event) {
                // Handle minus button click
                if (event.target.closest('.minus')) {
                    handleQuantityChange(event.target.closest('.minus'), false);
                }
                // Handle add button click
                else if (event.target.closest('.add')) {
                    handleQuantityChange(event.target.closest('.add'), true);
                }
                // Handle remove button click (trash icons)
                else if (event.target.closest('.remove-cart-item')) {
                    handleRemoveItem(event.target.closest('.remove-cart-item'));
                }
            });

            updateTotal();
        });

        function handleQuantityChange(button, isAdd) {
            const productId = button.getAttribute('data-product-id');
            const qtyInputs = document.querySelectorAll('.qty[data-product-id="' + productId + '"]');
            let currentVal = parseInt(qtyInputs[0].value);

            if (!isNaN(currentVal)) {
                let newVal = isAdd ? ++currentVal : --currentVal;

                if (newVal > 0) {
                    // Update the quantity
                    qtyInputs.forEach(function(qtyInput) {
                        qtyInput.value = newVal;
                    });
                    updateProductPrice(productId);
                    updateTotal();

                    // Send AJAX request to update quantity on the server
                    updateCartItem(productId, newVal);
                } else {
                    // Ask for confirmation to remove the item
                    const confirmDelete = confirm('Are you sure you want to remove this item from your cart?');
                    if (confirmDelete) {
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
                }
            }
        }

        function handleRemoveItem(button) {
            const productId = button.getAttribute('data-product-id');
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
        }

        function updateProductPrice(productId) {
            const qtyInput = document.querySelector('.qty[data-product-id="' + productId + '"]');
            let currentQty = parseInt(qtyInput.value);
            const unitPrice = parseFloat(qtyInput.getAttribute('data-unit-price'));
            const productTotalPrice = unitPrice * currentQty;

            const productPriceElement = document.getElementById('productPrice_' + productId);
            if(productPriceElement){
                productPriceElement.innerText = formatCurrency(productTotalPrice);
            }
        }

        function updateItemCount(count) {
            const itemCountElements = document.getElementsByClassName('badge');
            for (let i = 0; i < itemCountElements.length; i++) {
                itemCountElements[i].innerText = count + ' items';
            }
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

            // Calculate total cost including shipping
            const totalCost = subTotal + shippingCost;

            let formattedSubTotal = formatCurrency(subTotal);
            let formattedTotalCost = formatCurrency(totalCost);
            let formattedShippingCost = shippingCost > 0 ? formatCurrency(shippingCost) : 'Free';

            updateElementsByClassName('subTotal', formattedSubTotal);
            updateElementsByClassName('shippingCost', formattedShippingCost);
            updateElementsByClassName('totalCost', formattedTotalCost);
            updateElementsByClassName('cartSubtotal', formattedSubTotal);

            // If no items exist, display a message to redirect
            if (!itemsExist) {
                // Handle empty cart in checkout page
                const tableResponsive = document.querySelector('.checkout.table-responsive');
                if (tableResponsive) {
                    tableResponsive.innerHTML = '<p>Your cart is empty.</p><a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'index']); ?>" class="btn btn-primary">Continue Shopping</a>';
                }
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
                            const cartItemCountElements = document.querySelectorAll('.popup-badge');
                            cartItemCountElements.forEach(function(badge) {
                                badge.textContent = response.cartItemCount;
                                if (response.cartItemCount <= 0) {
                                    badge.parentNode.removeChild(badge);
                                }
                            });
                            updateTotal();
                            updateItemCount(response.cartItemCount);
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
                        const cartItemCountElements = document.querySelectorAll('.popup-badge');
                        cartItemCountElements.forEach(function(badge) {
                            badge.textContent = response.cartItemCount;
                        });
                        updateTotal();
                        updateItemCount(response.cartItemCount);
                    } else {
                        alert(response.message || 'Failed to update cart.');
                    }
                }
            };

            xhr.send('product_id=' + encodeURIComponent(productId) + '&quantity=' + encodeURIComponent(quantity));
        }

        // Helper functions
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

        function updateElementsByClassName(className, value) {
            const elements = document.getElementsByClassName(className);
            for (let i = 0; i < elements.length; i++) {
                elements[i].innerText = value;
            }
        }
    </script>
</body>
</html>
