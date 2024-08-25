<?php
    $page_title = "News Editing";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    if (isset($_POST["publish"])) {
        insertContent($_POST); // Changed from signin to insertContent for content submission
        current_page();
    }
?>

<div class="container col-md-8 shadow rounded mb-3 border mt-4" id="add_content">
    <?php error_message(); ?>
    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
        <div class="row mb-4">
            <!-- Image Display -->
            <div class="col-md-12 mb-4">
                <div class="card shadow border align-items-center justify-content-center mb-3" id="card1">
                    <img src="" class="img-fluid" id="display_image" style="display: none;">
                </div>
            </div>
            <!-- Title Input -->
            <div class="col-md-12 mb-3">
                <label for="title" class="h5">Title</label>
                <input type="text" class="form-control shadow mb-0 border" id="title" name="title" required>
            </div>
            <!-- File Input -->
            <div class="col-md-12 mb-3">
                <label for="image" class="h5">Add/Edit Image</label>
                <input type="file" class="form-control" name="image" id="image" onchange="updateImage(this)">
            </div>
            <!-- Content Textarea -->
            <div class="col-md-12 mb-3">
                <label for="writers_content" class="h5">Content</label>
                <textarea class="form-control shadow rounded border" rows="12" id="writers_content" name="writers_content" required></textarea>
            </div>
            <!-- Publish Button -->
            <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-danger mb-3" id="publish" name="publish">
                    Publish
                </button>
            </div>
        </div>
    </form>
</div>

<script>
    function updateImage(input) {
        const file = input.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(event) {
                const displayImage = document.getElementById('display_image');
                displayImage.src = event.target.result;
                displayImage.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }

    document.addEventListener('DOMContentLoaded', function () {
        const imageInput = document.getElementById('image');
        imageInput.addEventListener('change', function (e) {
            updateImage(e.target);
        });
    });
</script>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
