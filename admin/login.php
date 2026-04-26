<?php
session_start();

$password = 'admin123'; // Simple hardcoded password

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['password'] === $password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit;
    } else {
        $error = "Incorrect password.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@400;600&display=swap" rel="stylesheet">
    <style>
        body { margin: 0; background-color: #0B0C10; color: #C5C6C7; font-family: 'Outfit', sans-serif; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-box { background: rgba(31, 40, 51, 0.25); backdrop-filter: blur(10px); border: 1px solid rgba(102, 252, 241, 0.15); border-radius: 16px; padding: 40px; width: 100%; max-width: 400px; text-align: center; box-shadow: 0 8px 32px rgba(0, 0, 0, 0.37); }
        h2 { color: #66FCF1; margin-bottom: 20px; }
        input[type="password"] { width: 100%; padding: 15px; margin-bottom: 20px; background: rgba(0,0,0,0.2); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: #fff; box-sizing: border-box; font-size: 1rem; outline: none; transition: 0.3s; }
        input[type="password"]:focus { border-color: #66FCF1; background: rgba(0,0,0,0.4); }
        button { width: 100%; padding: 15px; border-radius: 8px; border: none; background: #66FCF1; color: #000; font-weight: 600; font-size: 1rem; cursor: pointer; transition: 0.3s; }
        button:hover { background: #fff; transform: translateY(-2px); }
        .error { color: #ff6b6b; margin-bottom: 15px; font-size: 0.9rem; }
    </style>
</head>
<body>
    <div class="login-box">
        <h2>Admin Panel</h2>
        <?php if(!empty($error)): ?>
            <div class="error"><?= $error ?></div>
        <?php endif; ?>
        <form method="POST">
            <input type="password" name="password" placeholder="Enter Password" required>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>
