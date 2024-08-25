<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");
    
    // Fetch content from database
    $contents = get_content(); // Adjust this function call as needed to get the data

    function truncate_text($text, $length = 100) {
        if (strlen($text) > $length) {
            return substr($text, 0, $length) . '...';
        }
        return $text;
    }
?>

<div id="main" class="container mt-4">
    <div class="row">
        <?php foreach ($contents as $content): ?>
            <div class="col-md-4 mb-4">
                <a href="/content/content_view_page?q=<?php echo $content['content_id']; ?>" class="text-decoration-none">
                    <div class="card shadow-sm border-0">
                        <img src="<?php echo $content['img']; ?>" class="card-img-top" alt="Image" style="height: 200px; object-fit: cover;">
                        <div class="card-body">
                            <h5 class="card-title text-dark"><?php echo htmlspecialchars($content['title']); ?></h5>
                            <p class="card-text text-dark"><?php echo htmlspecialchars(truncate_text($content['content'])); ?></p>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>
