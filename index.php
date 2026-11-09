<?php
require "fungsi.php";

if (isset($_SESSION["id"])) {
    header("Location: dashboard.php");
    exit;
}

$error = $_SESSION["login_error"] ?? "";
$email = $_SESSION["login_email"] ?? "";
unset($_SESSION["login_error"], $_SESSION["login_email"]);
?>
<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Rental Mobil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body class="bg-light">
<main class="container min-vh-100 d-flex align-items-center justify-content-center py-4">
    <div class="card login-card border-0 shadow w-100">
        <div class="card-body p-4 p-md-5">
            <h1 class="h3 fw-bold text-center mb-2">Rental Mobil Rhesa</h1>
            <p class="text-secondary text-center mb-4">Silakan login untuk mengelola data kendaraan.</p>

            <?php if ($error !== ""): ?>
                <div class="alert alert-danger"><?= aman($error) ?></div>
            <?php endif; ?>

            <form action="validasi.php" method="post">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email"
                           value="<?= aman($email) ?>" maxlength="34" required>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary w-100">Masuk</button>
            </form>
        </div>
    </div>
</main>
</body>
</html>
