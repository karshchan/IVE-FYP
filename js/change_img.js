function loadImage(event) {

    var preview = document.getElementById('preview_img');

    preview.src = URL.createObjectURL(event.target.files[0]);

    preview.onload = function() {

        URL.revokeObjectURL(preview.src);

    }

};