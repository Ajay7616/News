<?php
  $page_title="Sign Up";
  require_once($_SERVER["DOCUMENT_ROOT"]."/includes/init.php");

  if(isset($_POST["registration"]))
  {
    registration($_POST);
    current_page();
  }
?>

<div class="container mt-4" id="sign_up">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card">
        <div class="card-body m-3">
          <?php error_message(); ?>
          <form role="form" action="<?php echo action_form(); ?>" class="form-group" method="post" enctype="multipart/form-data">
            <h2 class="mt-2 mb-5 text-center fw-bold text-danger">Create New Account</h2>
            <div class="row mb-3">
                <div class="d-flex justify-content-center">
                    <img src="/img/default_profile.png" id="profile-photo" name="profile-photo" class="img-fluid profile-photo">
                </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label fw-bold text-uppercase" for="email_address">Email-ID</label>
                <input type="text" class="form-control" placeholder="Enter Email-ID" id="email_address" name="email_address" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-uppercase" for="user_name">Username</label>
                <input type="text" class="form-control" placeholder="Enter Username" id="user_name" name="user_name" required>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <label class="form-label fw-bold text-uppercase" for="password">Password</label>
                <input type="password" class="form-control" placeholder="Enter Enter Password" id="password" name="password" required>
              </div>
              <div class="col-md-6">
                <label class="form-label fw-bold text-uppercase" for="conf_pass">Confirm Password</label>
                <input type="password" class="form-control" placeholder="Re-Enter Password" id="conf_pass" name="conf_pass" required>
              </div>
            </div>
            <div class="col-md-12 mb-3">
              <label class="form-label fw-bold text-uppercase" for="image">Profile Image</label>
              <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <p class="acknowledgement"><input type="checkbox" id="acknowledgement" name="acknowledgement" value="acknowledgement" required> I Agree With <a href="/termsservice.html" class="text-decoration-none">Terms & Services</a></p>
            <div class="d-grid mb-3">
              <button class="btn btn-danger fw-bold" type="submit" id="registration" name="registration">Register</button>
            </div>
            <p class="text-center">Already Having an Account? <a href="/login/" class="text-decoration-none text-danger">Sign In</a> </p> 
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
            const imageInput = document.getElementById('image');
            const displayImage = document.getElementById('profile-photo');
            const imageDataInput = document.getElementById('image');

            imageInput.addEventListener('change', function (e) {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (event) {
                        displayImage.src = event.target.result;
                        displayImage.style.display = 'block';
                        imageDataInput.value = event.target.result;
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
</script>

<?php
    require_once($_SERVER["DOCUMENT_ROOT"]."/includes/footer.php");
?>