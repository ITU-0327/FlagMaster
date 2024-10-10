let addressConfirmed = false;

$(function () {
    // Initialize shippingCost variable
    let shippingCost = 0;

    // Add event listeners to delivery options
    const deliveryOptions = document.getElementsByName('deliveryOpt');
    const length = deliveryOptions.length;

    for (let i = 0; i < length; i++) {
        deliveryOptions[i].addEventListener('change', function () {
            shippingCost = parseFloat(this.value);
            updateTotal();
        });
    }

    // Get default selected delivery option (if any)
    const defaultDeliveryOption = document.querySelector('input[name="deliveryOpt"]:checked');
    if (defaultDeliveryOption) {
        shippingCost = parseFloat(defaultDeliveryOption.value);
        updateTotal();
    }

    // Handle "Deliver To This Address" button click
    $(".billing-address").click(function (e) {
        e.preventDefault(); // Prevent default link behavior

        // Reference to the form
        const form = $("form.tab-wizard");

        // Trigger validation
        if (form.valid()) {
            // If valid, hide the address content and show delivery & payment methods
            $(".billing-address-content").hide();
            $(".payment-method-list").show();

            addressConfirmed = true;
        } else {
            // If not valid, show an alert or error message
            swal("Please fill in all required address fields before proceeding.", "error");
        }
    });
});
