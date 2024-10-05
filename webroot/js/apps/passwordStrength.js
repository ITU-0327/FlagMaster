$(document).ready(function () {
    $('#new-password').on('input', function () {
        const password = $(this).val();
        const result = zxcvbn(password);

        let strengthText = '';
        let strengthClass = '';

        switch (result.score) {
            case 0:
                strengthText = 'Very Weak';
                strengthClass = 'text-danger';
                break;
            case 1:
                strengthText = 'Weak';
                strengthClass = 'text-danger';
                break;
            case 2:
                strengthText = 'Fair';
                strengthClass = 'text-warning';
                break;
            case 3:
                strengthText = 'Good';
                strengthClass = 'text-info';
                break;
            case 4:
                strengthText = 'Strong';
                strengthClass = 'text-success';
                break;
        }

        if (password.length === 0) {
            $('#password-strength').html('');
        } else {
            $('#password-strength').html('Strength: <strong class="' + strengthClass + '">' + strengthText + '</strong>');
        }
    });

// Password Confirmation Match Indicator
    $('#confirm-password').on('input', function () {
        const password = $('#new-password').val();
        const confirmPassword = $(this).val();

        if (confirmPassword.length === 0) {
            $('#password-match').html('');
            return;
        }

        if (password === confirmPassword) {
            $('#password-match').html('<span class="text-success">Passwords match.</span>');
        } else {
            $('#password-match').html('<span class="text-danger">Passwords do not match.</span>');
        }
    });
});
