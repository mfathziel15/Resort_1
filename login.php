<?php
session_start();
include 'koneksi.php'; // Pastikan file koneksi.php sudah benar

$error = '';

if (isset($_POST['login'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    // Cek user di database (Asumsi password masih teks biasa untuk tahap awal)
    // Di tahap produksi, WAJIB gunakan password_hash() dan password_verify()
    $query = mysqli_query($conn, "SELECT * FROM users WHERE username='$username' AND password='$password'");
    
    if (mysqli_num_rows($query) > 0) {
        $data = mysqli_fetch_assoc($query);
        $_SESSION['admin_id'] = $data['id'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['role'] = $data['role'];
        
        header("Location: admin.php");
        exit();
    } else {
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | AURA Sanctuary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #111; color: #f8f6f0; font-family: 'Inter', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; margin: 0; }
        .login-card { background: #1a1a1a; padding: 3rem; border-radius: 12px; border: 1px solid rgba(255,255,255,0.1); width: 100%; max-width: 400px; box-shadow: 0 10px 30px rgba(0,0,0,0.5); }
        .form-control { background: transparent; border: none; border-bottom: 1px solid #444; border-radius: 0; color: #fff; padding-left: 0; }
        .form-control:focus { background: transparent; color: #fff; box-shadow: none; border-color: #f8f6f0; }
        .btn-login { background: #f8f6f0; color: #111; border: none; text-transform: uppercase; letter-spacing: 2px; font-size: 0.8rem; font-weight: 600; padding: 12px; width: 100%; margin-top: 20px; transition: 0.3s; }
        .btn-login:hover { background: #ccc; }
    </style>
</head>
<body>

    <div class="login-card">
        <h3 class="text-center mb-4" style="font-family: 'Playfair Display', serif; letter-spacing: 2px;">AURA.<br><span style="font-size: 1rem; color: #777; font-family: 'Inter', sans-serif;">Workspace</span></h3>
        
        <?php if($error): ?>
            <div class="alert alert-danger py-2" role="alert"><small><?= $error; ?></small></div>
        <?php endif; ?>

        <form method="POST" action="">
            <div class="mb-4">
                <label class="form-label small text-muted text-uppercase" style="letter-spacing: 1px;">Username</label>
                <input type="text" name="username" class="form-control" required autocomplete="off">
            </div>
            <div class="mb-4">
                <label class="form-label small text-muted text-uppercase" style="letter-spacing: 1px;">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <button type="submit" name="login" class="btn btn-login">Masuk Akses</button>
        </form>
        <span style="display: flex; gap: 1.5rem;">
        
        <a href="index.php" style="text-decoration: underline; opacity: 0.6; transition: opacity 0.3s;" onmouseover="this.style.opacity='1'" onmouseout="this.style.opacity='0.6'">Kembali ↗</a>
      </span>
    </div>

</body>
</html>
