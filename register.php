<?php
include 'koneksi.php';

$alert = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

  $cek = $conn->query("SELECT * FROM users WHERE username='$username'");
  if ($cek->num_rows > 0) {
    $alert = '<div class="alert alert-danger text-center">Username sudah digunakan!</div>';
  } else {
    $conn->query("INSERT INTO users (username, password) VALUES ('$username', '$password')");
    $alert = '<div class="alert alert-success text-center">Registrasi berhasil! Silakan login.</div>';
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Register</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
  <link href="style.css" rel="stylesheet">
</head>
<body class="body-bg">
  <div class="card card-custom">
    <h4 class="text-center text-success mb-4">
      <i class="bi bi-person-plus-fill me-2"></i>Register
    </h4>
    <?= $alert ?>
    <form method="POST">
      <div class="input-group mb-3">
        <span class="input-group-text bg-dark text-white">
          <i class="bi bi-person-fill"></i>
        </span>
        <input type="text" name="username" class="form-control" placeholder="Username" required>
      </div>
      <div class="input-group mb-4">
        <span class="input-group-text bg-dark text-white">
          <i class="bi bi-lock-fill"></i>
        </span>
        <input type="password" name="password" class="form-control" placeholder="Password" required>
      </div>
      <div class="text-center">
        <button type="submit" class="btn btn-success">Daftar</button>
      </div>
    </form>
    <div class="text-center mt-3">
      <a href="login.php" class="text-decoration-none text-success">Sudah punya akun? Login</a>
    </div>
  </div>
</body>
</html>
