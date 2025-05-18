<?php
session_start();
if (!isset($_SESSION['login']) || !isset($_SESSION['user_id'])) {
    header("location:login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        tbody tr:hover {
            background-color: #343a40;
            transition: 0.3s;
            cursor: pointer;
        }

        .hero-img {
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease;
            cursor: pointer;
            border-radius: 12px;
        }

        .hero-img:hover {
            transform: scale(1.03);
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.2);
        }
    </style>
</head>
<body class="bg-dark text-white">

    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary shadow">
        <div class="container">
            <a class="navbar-brand" href="../dashboard.php">🧑🏻‍🎓 Sistem Mahasiswa</a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="add.php">Tambah Data</a></li>
                    <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container my-4 text-center">
        <img src="Binus_School_Simprug.width-500.format-webp.webp" alt="Banner Mahasiswa" class="img-fluid hero-img">
        <h1 class="mt-3">Selamat Datang, <?= htmlspecialchars($_SESSION['username']); ?>!</h1>
        <p class="mt-3">Kelola data mahasiswa dengan mudah dan cepat menggunakan sistem berbasis web ini.</p>
    </div>

    <div class="container mt-4">
        <h4 class="mb-4">Data Mahasiswa</h4>

        <div class="table-responsive">
            <table class="table table-dark table-hover table-bordered align-middle shadow">
                <thead class="table-secondary text-dark">
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>Ponsel</th>
                        <th>Proses</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include("koneksi.php");
                $user_id = $_SESSION['user_id'];
                $sql = "SELECT * FROM mahasiswa WHERE user_id = ?";
                $exe = $conn->prepare($sql);

                if ($exe) {
                    $exe->bind_param("i", $user_id);
                    $exe->execute();
                    $result = $exe->get_result();

                    while ($data = $result->fetch_assoc()) {
                        ?>
                        <tr onclick="window.location.href='edit.php?nim=<?= urlencode($data['nim']); ?>'">
                            <td><?= htmlspecialchars($data['nim']) ?></td>
                            <td><?= htmlspecialchars($data['nama']) ?></td>
                            <td><?= htmlspecialchars($data['jenkel']) ?></td>
                            <td><?= htmlspecialchars($data['email']) ?></td>
                            <td><?= htmlspecialchars($data['nohp']) ?></td>
                            <td>
                                <a href="edit.php?nim=<?= urlencode($data['nim']); ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="hapus.php?nim=<?= urlencode($data['nim']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin dihapus?')">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }

                    $exe->close();
                } else {
                    echo "<tr><td colspan='6' class='text-center text-danger'>Query error: " . $conn->error . "</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
