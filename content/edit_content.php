<?php
$page_title = "Add Content";
require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

if(isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"]))
{
    $id = trim($_GET["q"]);
    $content = get_content_by_passing_id($id);
}

if(isset($_POST["publish"]))
{
    $content_id = trim($_POST["content_id"]);
    update_content($_POST, $content_id);
    current_page("q=$content_id");
}
?>

<div class="container col-md-6 shadow rounded mb-3 border mt-4" id="add_content">
    <?php error_message(); ?>
    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
        <!-- Image Display Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="card shadow border my-3 py-7 d-inline-block">
                    <img src="<?php echo $content["img"]; ?>" class="img-fluid rounded" id="display_image">
                </div>
            </div>
        </div>

        <!-- Title Input Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <label for="title" class="h5">Title</label>
                    <input type="text" class="form-control shadow mb-0 border" id="title" name="title" value="<?php echo $content["title"]; ?>" required>
                </div>
            </div>
        </div>

        <!-- Genre and Image Input Section -->
        <div class="row mb-3">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="image" class="h5">Add/Edit Image</label>
                    <input type="file" class="form-control" name="image" id="image" onchange="updateImage(this)">
                </div>
            </div>
        </div>

        <!-- Content Text Area Section -->
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="mb-3">
                    <textarea class="form-control shadow rounded border" rows="12" id="content" name="content" required><?php echo $content["content"]; ?></textarea>
                    <input type="hidden" name="content_id" id="content_id" value="<?php echo $content["content_id"]; ?>">
                </div>
            </div>
        </div>

        <!-- Publish Button Section -->
        <div class="row">
            <div class="col-md text-end">
                <button type="submit" class="btn btn-primary mb-3" id="publish" name="publish">
                    Update
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
