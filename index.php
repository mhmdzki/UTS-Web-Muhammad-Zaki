<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $error = [];
    
    // Validasi form
    if (empty($username)) {
        $error['username'] = "Username harus terisi";
    }
    
    if (empty($password)) {
        $error['password'] = "Password harus terisi";
    } else {
        if (strlen($password) < 5) {
            $error['password'] = "Password minimal 5 karakter";
        }
        if (!preg_match('/[0-9]/', $password)) {
            $error['password'] = "Password harus terdiri dari huruf dan angka";
        }
    }
    
    // Jika tidak ada error dan kredensial sesuai
    if (empty($error) && $username === "admin" && $password === "admin123") {
        $_SESSION['username'] = $username;
        header("Location: home.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Hotel Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .login-container {
            max-width: 400px;
            margin: 100px auto;
            padding: 20px;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <h2 class="text-center mb-4">Hotel Login</h2>
            <form method="POST" action="">
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                    <?php if(isset($error['username'])): ?>
                        <div class="text-danger"><?php echo $error['username']; ?></div>
                    <?php endif; ?>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                    <?php if(isset($error['password'])): ?>
                        <div class="text-danger"><?php echo $error['password']; ?></div>
                    <?php endif; ?>
                </div>
                <button type="submit" class="btn btn-primary w-100">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>