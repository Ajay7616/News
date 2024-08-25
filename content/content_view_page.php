<?php
    $page_title = "News";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    if (isset($_GET["q"]) && !empty($_GET["q"]) && is_numeric($_GET["q"])) {
        $id = trim($_GET["q"]);
        $content = get_content_by_passing_id($id);
    }

    if (isset($_POST["comment-submit"])) {
        insert_comment($_POST);
        $content_id = trim($_POST["content_id"]);
        current_page("q=$content_id");
    }
?>

<div class="container col-md-8 offset-md-2 shadow rounded mt-3 mb-3 border" id="content_view_page">
    <div class="card">
        <div class="card-header">
            <h4 class="text-center"><?php echo htmlspecialchars($content["title"]); ?></h4>
        </div>
        <?php
            $user_id = $content["user_id"];
            $writer = get_user_details_by_passing_id($user_id); 
        ?>
        <a href="/writer/writer_detail?q=<?php echo htmlspecialchars($writer["user_id"]); ?>" class="text-decoration-none text-dark">
            <div class="card-body">
                <div class="d-flex justify-content-end mb-3">
                    <span>~by <?php echo htmlspecialchars($writer["user_name"]); ?></span>
                </div>
                <img src="<?php echo htmlspecialchars($content["img"]); ?>" class="card-img-top img-fluid rounded mb-2" alt="Content Image"/>
                <p class="card-text"><?php echo htmlspecialchars($content["content"]); ?></p>
            </div>
        </a>
        <div class="row mb-3">
            <div class="container">
                <div class="col-md-10 offset-md-1">
                    <div class="row">
                        <div class="col-md-10">
                            <h6>Comment</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-2">
            <div class="container">
                <div class="col-md-10 offset-md-1">
                    <form role="form" action="<?php echo action_form(); ?>" method="post" enctype="multipart/form-data">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" aria-describedby="comment-submit" id="comment" name="comment">
                            <input type="text" class="form-control" aria-describedby="comment-submit" value="<?php echo $id; ?>" id="content_id" name="content_id" hidden>                            <button class="btn btn-primary" type="submit" id="comment-submit" name="comment-submit">Comment</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <?php
            $comments = get_comment($id);
        ?>
        <?php if($comments): ?>
            <?php foreach($comments as $comment): ?>
                <?php
                    $comment_user = $comment["user_id"];
                    $user = get_user_details_by_passing_id($comment_user); 
                ?>
                <div class="row mb-1">
                    <div class="container">
                        <div class="col-md-10 offset-md-1">
                            <div class="container shadow rounded mb-3">
                                <div class="row">
                                    <div class="col-md-2 my-2">
                                        <img src="<?php echo $user["img"]; ?>" alt="profile image" id="comment_image" name="comment_image" style="border-radius: 50%;">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="columns">
                                            <div class="row">
                                                <div class="text"><?php echo $user["user_name"]; ?></div>
                                            </div>
                                            <div class="row mb-1">
                                                <p class="text h5"><?php echo $comment["comment"]; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>