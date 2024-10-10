$(function () {
    // Initialize the form wizard
    $(".tab-wizard").steps({
        headerTag: "h6",
        bodyTag: "section",
        transitionEffect: "fade",
        titleTemplate: '<span class="step">#index#</span> #title#',
        labels: {
            finish: "Place Order",
        },
        // Disable step header clicking to prevent skipping steps
        enableAllSteps: false,
        transitionEffect: "fade",
        onStepChanging: function (event, currentIndex, newIndex) {
            // Always allow going back
            if (currentIndex > newIndex) {
                return true;
            }

            // Reference to the form
            const form = $("form.tab-wizard");

            // Validate the form
            form.validate().settings.ignore = ":disabled,:hidden";

            // Custom validation when moving from Billing & Address step
            if (currentIndex === 1 && newIndex === 2) {
                if (!addressConfirmed) {
                    swal("Please click 'Deliver To This Address' to confirm your address before proceeding.", "error");
                    return false; // Prevent moving to the next step
                }
            }

            return form.valid();
        },
        onFinishing: function (event, currentIndex) {
            const form = $("form.tab-wizard");
            form.validate().settings.ignore = ":disabled";
            return form.valid();
        },
        onFinished: function (event, currentIndex) {
            swal({
                title: "Confirm Order",
                text: "Are you sure you want to place this order?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
                .then((willSubmit) => {
                    if (willSubmit) {
                        // Submit the form
                        $('form.tab-wizard').submit();
                    } else {
                        swal("Your order has not been placed.");
                    }
                });
        },
    });

    // Initialize validation
    $(".tab-wizard").validate({
        errorClass: "text-danger",
        rules: {
            'profile.first_name': {
                required: true,
                maxlength: 50,
            },
            'profile.last_name': {
                required: true,
                maxlength: 50,
            },
            'profile.phone': {
                required: true,
                // You can add a specific phone validation method if needed
            },
            'profile.address.street': {
                required: true,
                maxlength: 255,
            },
            'profile.address.city': {
                required: true,
                maxlength: 100,
            },
            'profile.address.state': {
                required: true,
                maxlength: 100,
            },
            'profile.address.postal_code': {
                required: true,
                maxlength: 20,
            },
            'profile.address.country': {
                required: true,
                maxlength: 100,
            },
            'deliveryOpt': {
                required: true,
            },
            'paymentType': {
                required: true,
            },
        },
        messages: {
            'profile.first_name': "First name is required and cannot exceed 50 characters.",
            'profile.last_name': "Last name is required and cannot exceed 50 characters.",
            'profile.phone': "Phone number is required.",
            'profile.address.street': "Street address is required and cannot exceed 255 characters.",
            'profile.address.city': "City is required and cannot exceed 100 characters.",
            'profile.address.state': "State is required and cannot exceed 100 characters.",
            'profile.address.postal_code': "Postal code is required and cannot exceed 20 characters.",
            'profile.address.country': "Country is required and cannot exceed 100 characters.",
            'deliveryOpt': "Please select a delivery option.",
            'paymentType': "Please select a payment method.",
        },
        errorPlacement: function (error, element) {
            if (element.attr("name") === "deliveryOpt" || element.attr("name") === "paymentType") {
                error.insertAfter(element.closest('.btn-group'));
            } else {
                error.insertAfter(element);
            }
        },
    });
});
