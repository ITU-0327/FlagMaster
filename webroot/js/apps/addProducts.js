document.addEventListener('DOMContentLoaded', function () {
    const basePriceInput = document.getElementById('basePrice');
    const discountPercentageInput = document.getElementById('discountPercentage');
    const discountValueInput = document.getElementById('discountValue');
    const discountTypeRadios = document.querySelectorAll('input[name="discount_type"]');

    function calculateDiscountedPrice()
    {
        const basePrice = parseFloat(basePriceInput.value) || 0;
        const discountPercentage = parseFloat(discountPercentageInput.value) || 0;
        const discountedPrice = basePrice - (basePrice * (discountPercentage / 100));
        discountValueInput.value = discountedPrice.toFixed(2);
    }

    function handleDiscountTypeChange()
    {
        const selectedDiscountType = document.querySelector('input[name="discount_type"]:checked').value;

        if (selectedDiscountType === 'none') {
            // If no discount is selected, clear the discount value or set it to the base price
            discountValueInput.value = '';
        } else if (selectedDiscountType === 'percentage') {
            // Calculate discount based on percentage
            calculateDiscountedPrice();
        }
    }

    // Event listener for when the discount type changes
    discountTypeRadios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            handleDiscountTypeChange();
        });
    });

    // Also calculate discount when the percentage or base price changes
    discountPercentageInput.addEventListener('input', function () {
        if (document.querySelector('input[name="discount_type"]:checked').value === 'percentage') {
            calculateDiscountedPrice();
        }
    });

    basePriceInput.addEventListener('input', function () {
        handleDiscountTypeChange();
    });

    // Initialize the discount value on page load
    handleDiscountTypeChange();
});

document.addEventListener('DOMContentLoaded', function () {
    const quill = window.quill;

    const descriptionHidden = document.getElementById('descriptionHidden');
    const form = document.querySelector('form');

    // On form submit, copy the editor content to the hidden field
    form.onsubmit = function () {
        // Get the HTML content from Quill
        descriptionHidden.value = quill.root.innerHTML; // Assign the content to the hidden field
    };
});

document.addEventListener('DOMContentLoaded', function () {
    let variationIndex = 1;

    function initializeSelect2()
    {
        $('.select2').select2({
            width: 'resolve'
        });
    }

    initializeSelect2();

    // Function to add a new variation row
    $('#add_variation').on('click', function () {
        const newVariationRow = $(`
            < div class = "row mb-3 variation-row" style = "display:none;" >
                < div class = "col-md-4" >
                    < select name = "product_variations[${variationIndex}][variation_type]" class = "select2 form-control" data - placeholder = "Select Variation Type" >
                        <  ? php foreach($variationTypes as $type) : ?  >
                            < option value = "<?= strtolower($type) ?>" > < ? = $type ?  > < / option >
                        <  ? php endforeach; ?  >
                    <  / select >
                <  / div >
                < div class = "col-md-4 mt-3 mt-md-0" >
                    < input type = "text" name = "product_variations[${variationIndex}][variation_value]" class = "form-control" placeholder = "Variation Value" >
                <  / div >
                < div class = "col-md-2 mt-3 mt-md-0" >
                    < button class = "btn bg-danger-subtle text-danger remove-variation" type = "button" >
                        < i class = "ti ti-x fs-5 d-flex" > < / i >
                    <  / button >
                <  / div >
            <  / div >
        `);

        $('#variation_fields').append(newVariationRow);
        initializeSelect2();

        newVariationRow.slideDown();

        variationIndex++;
    });

    // Function to remove a variation row with confirmation
    $(document).on('click', '.remove-variation', function () {
        const $row = $(this).closest('.variation-row');

        if (confirm("Are you sure you want to remove this item?")) {
            $row.slideUp(function () {
                $row.remove();
            });
        }
    });
});

const MAX_FILES = 10; // Maximum number of images allowed
const MAX_FILE_SIZE = 10 * 1024 * 1024; // Maximum file size (10MB)

document.addEventListener("DOMContentLoaded", function () {
    /**
     * Initializes a custom Dropzone with preview and message toggle functionality.
     * @param {string} dropzoneId - The ID of the dropzone container.
     * @param {string} fileInputId - The ID of the file input.
     */
    function initializeCustomDropzone(dropzoneId, fileInputId)
    {
        const fileInput = document.getElementById(fileInputId);
        const dropzone = document.getElementById(dropzoneId);
        const dropzoneLabel = dropzone.querySelector('.dropzone');
        const dropzonePreview = dropzoneLabel.querySelector('.dz-preview');
        const dzMessage = dropzonePreview.querySelector('.dz-message');

        // Array to hold the selected files
        let selectedFiles = [];

        /**
         * Updates the file input's FileList to reflect the selectedFiles array.
         */
        function updateFileInput()
        {
            const dataTransfer = new DataTransfer();
            selectedFiles.forEach(file => dataTransfer.items.add(file));
            fileInput.files = dataTransfer.files;
        }

        /**
         * Shows the Dropzone message.
         */
        function showMessage()
        {
            dzMessage.style.display = 'block';
        }

        /**
         * Hides the Dropzone message.
         */
        function hideMessage()
        {
            dzMessage.style.display = 'none';
        }

        /**
         * Renders a single image preview.
         * @param {File} file - The image file to preview.
         * @param {number} index - The index of the file in selectedFiles.
         */
        function renderPreview(file, index)
        {
            const reader = new FileReader();

            reader.onload = function (e) {
                const imageContainer = document.createElement('div');
                imageContainer.className = 'image-container me-3 mb-3'; // Added margin for better layout

                const img = document.createElement('img');
                img.src = e.target.result;
                img.className = 'content-blocks--image-preview';
                img.alt = 'Image Preview';

                const deleteBtn = document.createElement('button');
                deleteBtn.className = 'delete-image-btn';
                deleteBtn.innerHTML = '<iconify-icon icon="flowbite:close-circle-solid"></iconify-icon>';
                deleteBtn.setAttribute('data-index', index); // Set data-index to identify the file

                imageContainer.appendChild(img);
                imageContainer.appendChild(deleteBtn);
                dropzonePreview.appendChild(imageContainer);

                // Hide the message since at least one image is present
                hideMessage();

                // Handle delete button click
                deleteBtn.addEventListener('click', function (e) {
                    e.preventDefault();
                    e.stopPropagation();

                    const idx = parseInt(this.getAttribute('data-index'));
                    // Remove the file from the selectedFiles array
                    selectedFiles.splice(idx, 1);
                    // Remove the image container from the preview
                    imageContainer.remove();
                    // Re-render the data-index for remaining delete buttons
                    const remainingDeleteBtns = dropzonePreview.querySelectorAll('.delete-image-btn');
                    remainingDeleteBtns.forEach((btn, newIndex) => {
                        btn.setAttribute('data-index', newIndex);
                    });
                    // Update the file input
                    updateFileInput();

                    // If no files are left, show the message
                    if (selectedFiles.length === 0) {
                        showMessage();
                    }
                });
            }

            reader.readAsDataURL(file);
        }

        /**
         * Handles the addition of new files (either via input change or drop).
         * @param {File[]} files - Array of File objects.
         */
        function handleFiles(files)
        {
            const acceptedImageTypes = ['image/jpeg', 'image/png', 'image/jpg'];

            files.forEach(file => {
                if (!acceptedImageTypes.includes(file.type)) {
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'text-danger';
                    errorMsg.textContent = `${file.name} is not a supported image format.`;
                    dropzonePreview.appendChild(errorMsg);
                    return;
                }

                if (file.size > MAX_FILE_SIZE) {
                    const errorMsg = document.createElement('div');
                    errorMsg.className = 'text-danger';
                    errorMsg.textContent = `${file.name} exceeds the maximum size of ${MAX_FILE_SIZE / (1024 * 1024)}MB.`;
                    dropzonePreview.appendChild(errorMsg);
                    return;
                }

                if (selectedFiles.length >= MAX_FILES) {
                    alert(`You can only upload up to ${MAX_FILES} images.`);
                    return;
                }

                selectedFiles.push(file);
                renderPreview(file, selectedFiles.length - 1);
            });
            updateFileInput();
        }

        // Handle file selection via input
        fileInput.addEventListener('change', function (e) {
            const files = Array.from(e.target.files);
            handleFiles(files);
        });

        // Handle dragover event
        dropzone.addEventListener('dragover', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.add('dragover');
        });

        // Handle dragleave event
        dropzone.addEventListener('dragleave', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');
        });

        // Handle drop event
        dropzone.addEventListener('drop', function (e) {
            e.preventDefault();
            e.stopPropagation();
            dropzone.classList.remove('dragover');

            const files = Array.from(e.dataTransfer.files);
            handleFiles(files);
        });

        // Initially, show the message
        showMessage();
    }

    // Initialize Product Images Dropzone
    initializeCustomDropzone('product-images-dropzone', 'productImages');

    // Initialize Thumbnail Dropzone
    initializeCustomDropzone('thumbnail-dropzone', 'thumbnailFile');
});
