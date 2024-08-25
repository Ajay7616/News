<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if (isset($page_title) && !empty($page_title)): ?>
        <title>
            <?php echo htmlspecialchars(trim($page_title)); ?> | Any News
        </title>
    <?php else: ?>
        <title>Any News</title>
    <?php endif; ?>
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <script type="text/javascript" src="/assets/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow navbar-custom">
        <div class="container">
            <!-- Align brand to the left -->
            <a class="navbar-brand writershouse-title fw-bold text-danger" href="/">Any News</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarText">
                <?php if (isset($_SESSION["user_id"]) && !empty($_SESSION["user_id"]) && is_numeric($_SESSION["user_id"]) && isset($_SESSION["role"]) && $_SESSION["role"] == "user"): ?>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/user/edit"><span>News Editing</span></a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/login"><span>Account</span></a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/logout"><span>Logout</span></a>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/login/"><span>Sign In</span></a>
                        </li>
                        <li class="nav-item me-4">
                            <a class="nav-link" href="/register/"><span>Register</span></a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>