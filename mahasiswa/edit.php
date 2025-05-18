<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
        }
        .form-container {
            background-color: #1e1e1e;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(255,255,255,0.1);
        }
        button:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow">
        <div class="container">
            <a class="navbar-brand" href="read.php">🧑🏻‍🎓 Sistem Mahasiswa</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="read.php">Kembali</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <div class="form-container">
            <h2 class="mb-4">Form Edit Mahasiswa</h2>
            <?php
            include("koneksi.php");
            $x = $_GET['nim'];
            $sql = "SELECT * FROM mahasiswa WHERE nim = '$x'";
            $exe = $conn->query($sql);
            $data = $exe->fetch_assoc();
            ?>
            <form action="update.php" method="POST">
                <div class="mb-3">
                    <label for="nim" class="form-label">NIM</label>
                    <input type="text" name="nim" class="form-control bg-dark text-white border-secondary" value="<?= $data['nim'] ?>" readonly>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" class="form-control bg-dark text-white border-secondary" value="<?= $data['nama'] ?>" required>
                </div>
                <div class="mb-3">
                    <label for="jenkel" class="form-label">Jenis Kelamin</label>
                    <select name="jenkel" class="form-select bg-dark text-white border-secondary" required>
                        <option value="<?= $data['jenkel'] ?>"><?= $data['jenkel'] ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control bg-dark text-white border-secondary" value="<?= $data['email'] ?>" required>
                </div>
                <div class="mb-4">
                    <label for="nohp" class="form-label">No HP</label>
                    <input type="text" name="nohp" class="form-control bg-dark text-white border-secondary" value="<?= $data['nohp'] ?>" required>
                </div>
                <button type="submit" class="btn btn-warning">Update</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
