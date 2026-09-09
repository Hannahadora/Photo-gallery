<?php
$page_title = 'Upload Photo';
?>

<div class="upload-page app-container">
    <div class="upload-card">
        <div class="upload-header">
            <p class="page-label">Upload</p>
            <h1>Upload a new photo</h1>
            <p class="muted">Choose a photo, add a title and description, then click Upload.</p>
        </div>

        <form id="uploadForm" action="/upload" method="POST" enctype="multipart/form-data" class="upload-form">
            <div class="form-row">
                <label>Title
                    <input type="text" name="title" placeholder="Photo title" required>
                </label>
            </div>

            <div class="form-row">
                <label>Description
                    <textarea name="description" rows="4" placeholder="Describe your photo (optional)"></textarea>
                </label>
            </div>

            <div class="form-row">
                <label>Tags (comma separated)
                    <input type="text" name="tags" placeholder="landscape,sunset,nature">
                </label>
            </div>

            <div class="form-row">
                <label>Photo file
                    <input id="photoInput" type="file" name="photo" accept="image/*" required>
                </label>
            </div>

            <div id="preview" class="image-preview"></div>

            <div class="form-actions">
                <button type="submit" class="btn btn-pry">Upload Photo</button>
                <a href="/dashboard" class="btn btn-sec">Cancel</a>
            </div>
        </form>
    </div>
</div>

<script>
document.getElementById('photoInput').addEventListener('change', function (e) {
    const preview = document.getElementById('preview');
    preview.innerHTML = '';
    const file = e.target.files && e.target.files[0];
    if (!file) return;
    if (!file.type.startsWith('image/')) {
        preview.textContent = 'Selected file is not an image.';
        return;
    }
    const img = document.createElement('img');
    img.className = 'preview-img';
    img.alt = file.name;
    preview.appendChild(img);

    const reader = new FileReader();
    reader.onload = function (evt) {
        img.src = evt.target.result;
    };
    reader.readAsDataURL(file);
});
</script>
