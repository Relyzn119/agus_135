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
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - Sistem Akademik</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <style>
        body {
            background-color: #121212;
            color: white;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        .navbar-dark {
            background-color: #1f2937;
        }
        .dashboard-container {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 2rem;
            padding: 2rem;
            flex-wrap: wrap;
        }
        .card {
            background-color: #1e1e1e;
            border-radius: 15px;
            box-shadow: 0 0 15px rgba(255,255,255,0.1);
            width: 250px;
            text-align: center;
            transition: transform 0.3s ease;
            cursor: pointer;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 0 25px #0d6efd;
        }
        .card h3 {
            margin: 1rem 0;
        }
        a.card-link {
            color: white;
            text-decoration: none;
            display: block;
            padding: 2rem 1rem;
        }
        /* VISI MISI & GAMBAR */
        .visi-misi-section {
            max-width: 900px;
            margin: 2rem auto 3rem auto;
            background-color: #1e1e1e;
            border-radius: 15px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(255,255,255,0.1);
        }
        .visi-misi-section h2 {
            text-align: center;
            margin-bottom: 1.5rem;
            color: #0d6efd;
        }
        .visi-misi-content {
            display: flex;
            flex-wrap: wrap;
            gap: 2rem;
            justify-content: center;
            align-items: center;
        }
        .visi-misi-text {
            flex: 1 1 400px;
            font-size: 1.1rem;
            line-height: 1.6;
            color: #ccc;
        }
        .visi-misi-img {
            flex: 1 1 300px;
            text-align: center;
        }
        .visi-misi-img img {
            max-width: 100%;
            border-radius: 12px;
            cursor: pointer;
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            box-shadow: 0 0 10px rgba(0,0,0,0.4);
        }
        .visi-misi-img img:hover {
            transform: scale(1.1) rotate(3deg);
            box-shadow: 0 0 30px #0d6efd;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark shadow">
    <div class="container">
        <a class="navbar-brand" href="dashboard.php">🧑🏻‍🎓 Sistem Akademik</a>
        <div class="d-flex">
            <span class="navbar-text me-3">Hai, <?= htmlspecialchars($_SESSION['username']); ?></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="dashboard-container container">
    <div class="card">
        <a href="mahasiswa/read.php" class="card-link">
            <h3>Data Mahasiswa</h3>
            <p>Kelola data mahasiswa</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#0d6efd" class="bi bi-people" viewBox="0 0 16 16">
              <path d="M13 7a3 3 0 1 0-2.829-4H5a3 3 0 0 0-2.993 3.22A5.98 5.98 0 0 0 0 12a1 1 0 0 0 1 1h13a1 1 0 0 0 1-1 5.98 5.98 0 0 0-2-4.776zM4 7a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
            </svg>
        </a>
    </div>
    <div class="card">
        <a href="dosen/read.php" class="card-link">
            <h3>Data Dosen</h3>
            <p>Kelola data dosen</p>
            <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="#0d6efd" class="bi bi-person-badge" viewBox="0 0 16 16">
              <path d="M6.5 2a.5.5 0 0 0-.5.5v.5h4v-.5a.5.5 0 0 0-.5-.5h-3zm-4.01 6.34a2 2 0 0 1 3.76-1.675A3.5 3.5 0 0 1 8 8.5v.25H2.49a.5.5 0 0 1-.5-.41zM2.5 13a2.5 2.5 0 1 0 5 0h-5z"/>
              <path d="M8.5 6v3h-3v-3h3z"/>
            </svg>
        </a>
    </div>
</div>

<section class="visi-misi-section container">
    <h2>Visi dan Misi Universitas BINUS</h2>
    <div class="visi-misi-content">
        <div class="visi-misi-text">
            <h4>Visi</h4>
            <p>
                Menjadi universitas terkemuka yang menghasilkan lulusan berkompeten, kreatif, dan berwawasan global.
            </p>
            <h4>Misi</h4>
            <ul>
                <li>Menyelenggarakan pendidikan berkualitas tinggi dan relevan dengan kebutuhan zaman.</li>
                <li>Mendorong penelitian inovatif dan berkontribusi pada perkembangan ilmu pengetahuan.</li>
                <li>Mengembangkan jejaring internasional untuk meningkatkan kolaborasi akademik.</li>
                <li>Menghasilkan lulusan yang siap menghadapi tantangan global dengan nilai-nilai integritas.</li>
            </ul>
        </div>
        <div class="visi-misi-img">
            <img src="BINUS-@Bekasi-gedung.jpeg" />
        </div>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
