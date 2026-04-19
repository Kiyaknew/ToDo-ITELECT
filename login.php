<?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header('Location: list.php');
    exit;
}

$error = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        header('Location: list.php');
        exit;
    } else {
        $error = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - Ditto</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-image: url(bggg.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;   
            margin: 0;
        }

        .container { 
            width: 400px; 
            max-width: 90%;
            background: rgb(255, 255, 243); 
            padding: 3rem; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
        }

        h2 { color: #333; margin-bottom: 2rem; font-size: 2rem; }

        .login-form { display: flex; flex-direction: column; gap: 20px; }

        .login-form input { 
            padding: 12px; 
            border: 3px solid #6d6262; 
            border-radius: 6px; 
            font-size: 1rem; 
        }

        .login-form button { 
            padding: 12px; 
            background: #afba7a; 
            color: rgb(23, 64, 41); 
            border: 3px solid rgb(86, 107, 95); 
            border-radius: 6px; 
            cursor: pointer; 
            font-weight: bold; 
            font-size: 1.1rem;
        }

        .login-form button:hover { background: #9da86d; }

        .error-msg {
            color: #c1429d;
            margin-bottom: 15px;
            font-weight: bold;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            color: #555;
            text-decoration: none;
            font-size: 0.9rem;
        }
        .back-link:hover { text-decoration: underline; }
    </style>
</head>
<body>

    <div class="container">
        <h2>Login</h2>

        <?php if ($error): ?>
            <p class="error-msg"><?php echo $error; ?></p>
        <?php endif; ?>

        <form class="login-form" method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required>
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Enter Ditto</button>
        </form>

        <a href="welcome.php" class="back-link">← Back to Welcome</a>
    </div>

</body>
</html>