<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #121212;
            color: white;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-box {
            background-color: #1e1e1e;
            padding: 40px;
            border-radius: 16px;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.05);
            width: 100%;
            max-width: 400px;
        }
        .btn-login:hover {
            transform: scale(1.05);
            transition: 0.3s;
        }
    </style>
</head>
<body>

    <div class="login-box">
        <h2 class="text-center mb-4">Login Sistem Mahasiswa</h2>
        <form action="autentikasi.php" method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control bg-dark text-white border-secondary" required>
            </div>
            <div class="mb-4">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control bg-dark text-white border-secondary" required>
            </div>
            <button type="submit" class="btn btn-primary w-100 btn-login">Login</button>
        </form>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
