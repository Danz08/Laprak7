<?php
include 'koneksi.php';
$logs = $conn->query("SELECT * FROM login_logs ORDER BY login_time DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4 bg-light">
  <div class="container">
    <h3 class="mb-4">Riwayat Login Pengguna</h3>
    <table class="table table-bordered bg-white">
      <thead>
        <tr>
          <th>No</th>
          <th>Username</th>
          <th>Waktu Login</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 1; while($row = $logs->fetch_assoc()): ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= htmlspecialchars($row['username']) ?></td>
          <td><?= $row['login_time'] ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
