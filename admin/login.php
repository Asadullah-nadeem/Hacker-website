<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <!-- Include Bootstrap CSS (CDN link) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<!--    <link rel="stylesheet" type="text/css" href="style.css">-->
</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Login</h2>
        </div>
        <div class="card-body">
            <form method="post" action="login.php">
                <?php include('errors.php'); ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="login_user">Login</button>
                </div>
                <p class="mb-0">
                    Not yet a member? <a href="register.php">Sign up</a>
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS (CDN link) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
