function uploadImage() {
    var formData = new FormData(document.getElementById('uploadForm'));

    // AJAX request
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'upload.php', true);

    xhr.onload = function () {
        if (xhr.status === 200) {
            document.getElementById('uploadResult').innerHTML = xhr.responseText;
        } else {
            document.getElementById('uploadResult').innerHTML = 'Error uploading image.';
        }
    };

    xhr.send(formData);
}
