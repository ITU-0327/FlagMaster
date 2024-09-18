document.addEventListener("DOMContentLoaded", function () {
    const fileInput = document.getElementById('customFile');
    const dropzone = document.querySelector('.custom-dropzone');
    const dropzoneLabel = dropzone.querySelector('.dropzone');
    const dropzonePreview = dropzoneLabel.querySelector('.dz-preview');

    fileInput.addEventListener('change', function (e) {
        const files = e.target.files;
        if (files && files[0]) {
            const file = files[0];

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    dropzonePreview.innerHTML = '';

                    const imageContainer = document.createElement('div');
                    imageContainer.className = 'image-container';

                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.className = 'content-blocks--image-preview';
                    img.alt = 'New Image Preview';

                    const deleteBtn = document.createElement('button');
                    deleteBtn.className = 'delete-image-btn';
                    deleteBtn.innerHTML = '<iconify-icon icon="flowbite:close-circle-solid"></iconify-icon>';

                    imageContainer.appendChild(img);
                    imageContainer.appendChild(deleteBtn);

                    dropzonePreview.appendChild(imageContainer);

                    deleteBtn.addEventListener('click', function (e) {
                        e.preventDefault();
                        e.stopPropagation();

                        dropzonePreview.innerHTML = '';

                        fileInput.value = '';

                        dropzonePreview.innerHTML = '<div class="dz-message"><span>Drag and drop a file here or click to select one</span></div>';
                    });
                }

                reader.readAsDataURL(file);
            } else {
                dropzonePreview.innerHTML = '<div class="dz-message"><span>Selected file is not an image.</span></div>';
            }
        }
    });

    dropzone.addEventListener('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.add('dragover');
    });

    dropzone.addEventListener('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.remove('dragover');
    });

    dropzone.addEventListener('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        dropzone.classList.remove('dragover');

        const files = e.dataTransfer.files;
        if (files.length > 0) {
            fileInput.files = files;

            const event = new Event('change');
            fileInput.dispatchEvent(event);
        }
    });
});
