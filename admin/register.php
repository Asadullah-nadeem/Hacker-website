<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Registration system PHP and MySQL</title>
    <!-- Include Bootstrap CSS (CDN link) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
<div class="container mt-5">
    <div class="card">
        <div class="card-header">
            <h2 class="text-center">Register</h2>
        </div>
        <div class="card-body">
            <form method="post" action="register.php">
                <?php include('errors.php'); ?>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" value="<?php echo $username; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" value="<?php echo $email; ?>" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password_1" class="form-label">Password</label>
                    <input type="password" name="password_1" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="password_2" class="form-label">Confirm password</label>
                    <input type="password" name="password_2" class="form-control">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary" name="reg_user">Register</button>
                </div>
                <p class="mb-0">
                    Already a member? <a href="login.php">Sign in</a>
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Include Bootstrap JS (CDN link) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
