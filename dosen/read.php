<?php
session_start();
if (!isset($_SESSION['login'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Data Dosen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: white;
            min-height: 100vh;
        }
        .navbar-dark {
            background-color: #1f2937;
        }
        .container {
            padding-top: 2rem;
        }
        table {
            background-color: #1e1e1e;
            border-radius: 10px;
            overflow: hidden;
        }
        thead tr {
            background-color: #0d6efd;
        }
        thead tr th {
            color: white;
            text-align: center;
        }
        tbody tr {
            transition: background-color 0.3s ease;
            cursor: default;
        }
        tbody tr:hover {
            background-color: #0d6efd33;
        }
        tbody tr td {
            vertical-align: middle;
            text-align: center;
            color: #ddd;
        }
        .btn-edit, .btn-delete {
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            margin: 0 2px;
            font-weight: 600;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        .btn-edit {
            background-color: #198754;
            color: white;
        }
        .btn-edit:hover {
            background-color: #157347;
        }
        .btn-delete {
            background-color: #dc3545;
            color: white;
        }
        .btn-delete:hover {
            background-color: #a71d2a;
        }
        .action-cell {
            white-space: nowrap;
        }
        .header-text {
            margin-bottom: 1.5rem;
        }
        a.btn-add, a.btn-logout {
            margin-right: 10px;
        }
        .btn-add {
            background-color: #0d6efd;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .btn-add:hover {
            background-color: #0b5ed7;
        }
        .btn-logout {
            background-color: #6c757d;
            color: white;
            padding: 8px 16px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
        }
        .btn-logout:hover {
            background-color: #5a6268;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="../dashboard.php">🧑🏻‍🎓 Sistem Akademik</a>
        <div class="d-flex align-items-center">
            <span class="navbar-text me-3">Hai, <?= htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="btn btn-logout btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <h1 class="header-text">Data Dosen</h1>

    <table class="table table-hover text-center align-middle">
        <thead>
            <tr>
                <th>NIDN</th>
                <th>Nama</th>
                <th>Gender</th>
                <th>Jabatan</th>
                <th>Ponsel</th>
                <th>Proses</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include("koneksi2.php");

            $sql = "SELECT * FROM dosen";
            $result = $conn->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($data = $result->fetch_assoc()) { ?>
                    <tr>
                        <td><?= htmlspecialchars($data['nidn']); ?></td>
                        <td><?= htmlspecialchars($data['nama']); ?></td>
                        <td><?= htmlspecialchars($data['jenkel']); ?></td>
                        <td><?= htmlspecialchars($data['jabatan']); ?></td>
                        <td><?= htmlspecialchars($data['no_hp']); ?></td>
                        <td class="action-cell">
                            <a href="edit.php?nidn=<?= urlencode($data['nidn']); ?>" class="btn-edit">Edit</a>
                            <a href="hapus.php?nidn=<?= urlencode($data['nidn']); ?>" onclick="return confirm('Yakin dihapus?')" class="btn-delete">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo '<tr><td colspan="6" style="color:#ccc;">Data dosen tidak ditemukan</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <div class="mb-4">
        <a href="add.php" class="btn-add">+ Tambah Dosen</a>
        <a href="../dashboard.php" class="btn btn-outline-light">Kembali ke Dashboard</a>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
