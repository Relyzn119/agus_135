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
    <title>Tambah Dosen</title>
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
            max-width: 600px;
        }
        label {
            font-weight: 600;
        }
        .form-control, .form-select {
            background-color: #1e1e1e;
            border: 1px solid #444;
            color: white;
        }
        .form-control:focus, .form-select:focus {
            background-color: #2c2c2c;
            border-color: #0d6efd;
            box-shadow: 0 0 5px #0d6efd;
            color: white;
        }
        .btn-primary {
            background-color: #0d6efd;
            border-color: #0d6efd;
        }
        .btn-primary:hover {
            background-color: #0b5ed7;
            border-color: #0b5ed7;
        }
        a.btn-cancel {
            color: #ccc;
            text-decoration: none;
            margin-left: 10px;
        }
        a.btn-cancel:hover {
            color: white;
            text-decoration: underline;
        }
        h2 {
            margin-bottom: 1.5rem;
            font-weight: 700;
            color: #0d6efd;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="../dashboard.php">🧑🏻‍🎓 Sistem Akademik</a>
        <div class="d-flex align-items-center">
            <span class="navbar-text me-3">Hai, <?= htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container">
    <h2>Form Tambah Dosen</h2>
    <form action="simpan_dosen.php" method="POST">
        <div class="mb-3">
            <label for="nidn" class="form-label">NIDN</label>
            <input type="text" name="nidn" id="nidn" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="nama" class="form-label">Nama</label>
            <input type="text" name="nama" id="nama" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="jenkel" class="form-label">Gender</label>
            <select name="jenkel" id="jenkel" class="form-select" required>
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-Laki">Laki-Laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="jabatan" class="form-label">Jabatan</label>
            <input type="text" name="jabatan" id="jabatan" class="form-control" required />
        </div>

        <div class="mb-3">
            <label for="no_hp" class="form-label">No HP</label>
            <input type="text" name="no_hp" id="no_hp" class="form-control" required />
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="read.php" class="btn-cancel">Batal</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
