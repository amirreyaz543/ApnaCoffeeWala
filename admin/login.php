<?php
session_start();

// Redirect if already logged in
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header('Location: dashboard.php');
    exit;
}

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';
    
    // Simple admin authentication
    $admin_username = 'admin';
    $admin_password = 'admin123';
    
    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_username'] = $username;
        header('Location: dashboard.php');
        exit;
    } else {
        $error = 'Invalid username or password';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Apna Chai Wala</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            padding: 3rem;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            position: relative;
            overflow: hidden;
        }

        .login-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(45deg, #e74c3c, #f39c12);
        }

        .logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo i {
            font-size: 3rem;
            color: #e74c3c;
            margin-bottom: 1rem;
        }

        .logo h1 {
            color: #2c3e50;
            font-size: 1.8rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        label {
            display: block;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid #e1e8ed;
            border-radius: 10px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #f8f9fa;
        }

        .form-control:focus {
            outline: none;
            border-color: #e74c3c;
            background: white;
            box-shadow: 0 0 0 3px rgba(231, 76, 60, 0.1);
        }

        .btn {
            width: 100%;
            padding: 12px;
            background: linear-gradient(45deg, #e74c3c, #c0392b);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(231, 76, 60, 0.3);
        }

        .error {
            background: #f8d7da;
            color: #721c24;
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 1rem;
            text-align: center;
            border: 1px solid #f5c6cb;
        }

        .demo-credentials {
            margin-top: 1.5rem;
            padding: 1rem;
            background: #e8f4fd;
            border-radius: 8px;
            text-align: center;
            border: 1px solid #b8daff;
        }

        .demo-credentials h4 {
            color: #004085;
            margin-bottom: 0.5rem;
        }

        .demo-credentials p {
            color: #004085;
            margin: 0;
            font-family: monospace;
        }

        @media (max-width: 480px) {
            .login-container {
                padding: 2rem;
            }
            
            .logo h1 {
                font-size: 1.5rem;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <i class="fas fa-mug-hot"></i>
            <h1>Apna Chai Wala<br><small>Admin Panel</small></h1>
        </div>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" class="form-control" required autofocus>
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <button type="submit" class="btn">
                <i class="fas fa-sign-in-alt"></i> Login
            </button>
        </form>

        <div class="demo-credentials">
            <h4>Demo Credentials</h4>
            <p>Username: admin</p>
            <p>Password: admin123</p>
        </div>
    </div>
</body>
</html>
