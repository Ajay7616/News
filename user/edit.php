<?php
    $page_title = "News Editing";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    if(isset($_POST["publish"]))
    {
        insert_content($_POST);
        current_page();
    }
?>

<div class="container col-md-6 shadow rounded mb-3 border mt-4" id="add_content">
    <?php error_message(); ?>
    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
        <!-- Image Display Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card shadow border my-3 h-75 py-7 d-inline-bloc">
                    <img src="" id="display_image">
                </div>
            </div>
        </div>

        <!-- Title Input Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="title" class="h5">Title</label>
                    <input type="text" class="form-control shadow mb-0 border" id="title" name="title" required>
                </div>
            </div>
        </div>

        <!-- Add/Edit Image Input Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="image" class="h5">Add/Edit Image</label>
                    <input type="file" class="form-control" name="image" id="image" onchange="updateImage(this)" required>
                </div>
            </div>
        </div>

        <!-- Text Area Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <textarea class="form-control shadow rounded border" rows="12" id="content" name="content" required></textarea>
                </div>
            </div>
        </div>

        <!-- Publish Button Section -->
        <div class="row">
            <div class="col-md text-end">
                <button type="submit" class="btn btn-danger mb-3" id="publish" name="publish">
                    Publish
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('image');
        const displayImage = document.getElementById('display_image');

        imageInput.addEventListener('change', function (e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (event) {
                    displayImage.src = event.target.result;
                    displayImage.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    });
</script>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
