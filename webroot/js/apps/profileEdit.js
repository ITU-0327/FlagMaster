document.addEventListener('DOMContentLoaded', function () {
    const profileImage = document.getElementById('profileImage');
    const profilePictureInput = document.getElementById('profilePictureInput');
    const uploadButton = document.getElementById('uploadButton');
    const resetButton = document.getElementById('resetButton');
    let originalImageSrc = profileImage.src;

    // Handle Upload Button Click
    uploadButton.addEventListener('click', function () {
        profilePictureInput.click();
    });

    // Handle File Input Change (Image Preview)
    profilePictureInput.addEventListener('change', function (event) {
        const file = event.target.files[0];
        if (file) {
            // Validate file size (800KB)
            if (file.size > 800 * 1024) {
                alert('Image size must be less than 800KB.');
                profilePictureInput.value = ''; // Clear the input
                return;
            }

            // Validate file type
            const allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (!allowedTypes.includes(file.type)) {
                alert('Please upload only images (jpeg, png, gif).');
                profilePictureInput.value = ''; // Clear the input
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                profileImage.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
    });

    // Handle Reset Button Click
    resetButton.addEventListener('click', function () {
        profilePictureInput.value = ''; // Clear the input
        profileImage.src = originalImageSrc; // Reset the image preview
    });
});
