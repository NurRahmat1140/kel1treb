<?php
session_start(); // Memulai session

// Jika pengguna sudah login, arahkan langsung ke halaman status
if (isset($_SESSION['isLoggedIn']) && $_SESSION['isLoggedIn'] === true) {
    header('Location: status.php');
    exit();
}

// Proses login jika form dikirim
$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi username dan password
    if ($username === 'kelompok1trebmalam' && $password === 'rahmatgans') {
        $_SESSION['isLoggedIn'] = true; // Tandai pengguna sudah login
        header('Location: status.php'); // Arahkan ke halaman status
        exit();
    } else {
        $error = "Username atau password salah!";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-box">
        <div class="login-header">
            <header>SELAMAT DATANG DI<br>MONITORING LIFT POLIBATAM</header>
        </div>
        <form method="POST" action="">
            <div class="input-box">
                <input type="text" name="username" class="input-field" placeholder="Username" autocomplete="off" required>
            </div>
            <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Password" autocomplete="off" required>
            </div>
            <div class="forgot">
                <section>
                    <input type="checkbox" id="check">
                    <label for="check">Remember Me</label>
                </section>
            </div>
            <?php if (!empty($error)): ?>
            <div id="error-message" style="color: red; text-align: center; margin-top: 10px;">
                <?= htmlspecialchars($error) ?>
            </div>
            <?php endif; ?>
            <div class="input-submit">
                <button type="submit" class="submit-btn">MASUK</button>
            </div>
        </form>
        <div class="sign-up-link">
            <p>Hint : Tanya Rahmat aja</p>
        </div>
    </div>
</body>
</html>
