<?php
    $page_title = "User Dashboard";
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

    $user = get_user_details_by_id();
?>
<div class="container my-5" id="writer_detail">
  <div class="row mb-5">
    <div class="col-md-2">
      <img  src="<?php echo $user["img"]; ?>" alt="user Photo" class="img mb-3" id="user" style="border-radius: 50%;">
    </div>
    <div class="col-md-6 mb-3">
      <div class="col-mb-4 mb-3 mt-2 h3"><?php echo $user["user_name"]; ?></div>
  </div>
  <ul class="row" id="content_previous_option">
    <li class="h4 content col-md-1 justify_content_start">
        <label for="content" class="text-dark">Content</label>
    </li>
  </ul>
  <hr>
  <?php
    $id = $user["user_id"];
    $contents = get_user_content($id);
  ?>
  <div class="container">
    <div class="row" id="published_content">
      <div class="row">
        <?php if($contents): ?>
          <?php foreach($contents as $content): ?>
            <div class="col-md-3">
              <?php
                $id = $content["content_id"];
              ?>
              <div class="card h-100">
                <div class="card-body">
                  <a href="/content/content_view_page?q=<?php echo $content["content_id"]; ?>" class="text-decoration-none text-dark">
                    <img class="card-img-top img-fluid" src="<?php echo $content["img"]; ?>" alt="content">
                    <h5 class="card-title my-2"><?php echo $content["title"]; ?></h5>
                    <div class="row mb-3">
                      <div class="d-flex justify-content-between gap-2">
                        <?php echo substr($content['timestamp'], 8, 2) . "-" . substr($content['timestamp'], 5, 2) . "-" . substr($content['timestamp'], 0, 4); ?>
                        <a href="/content/edit_content?q=<?php echo $content["content_id"]; ?>" class="btn btn-danger">
                          <span><i class="fas fa-edit"></i></span>
                        </a>
                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>
<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>