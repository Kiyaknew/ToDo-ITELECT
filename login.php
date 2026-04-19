<?php
session_start();

$error = ''; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === 'admin' && $password === 'password123') {
        $_SESSION['loggedin'] = true;
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Ditto</title>
    <style>
        body { 
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif; 
            background-image: url('bggg.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;   
            margin: 0;
            color: #2d3436;
            overflow: hidden;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container { 
            width: 380px; 
            max-width: 90%;
            background: rgba(255, 255, 243, 0.98); 
            padding: 3rem 2.5rem; 
            border-radius: 24px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            text-align: center;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.4);
            animation: fadeIn 0.6s ease-out;
        }

        h2 { 
            color: #3d3d3d; 
            margin: 0.5rem 0; 
            font-size: 2.4rem;
            font-weight: 800;
            letter-spacing: -1.5px;
        }

        .kaomoji {
            color: #afba7a;
            font-size: 0.8rem;
            letter-spacing: 2px;
            opacity: 0.7;
        }

        .login-form { 
            display: flex; 
            flex-direction: column; 
            gap: 15px; 
            margin-top: 20px;
        }

        .login-form input { 
            /* Changed font for input boxes */
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
            padding: 15px 20px; 
            border: 2px solid #edf2f4; 
            border-radius: 12px; 
            font-size: 1.05rem; 
            font-weight: 500;
            letter-spacing: 0.5px;
            transition: all 0.25s ease;
            outline: none;
            background: #ffffff;
            color: #444;
        }

        .login-form input::placeholder {
            font-family: 'Segoe UI', sans-serif;
            font-weight: normal;
            letter-spacing: 0;
            color: #b2bec3;
        }

        .login-form input:focus { 
            border-color: #afba7a;
            box-shadow: 0 0 0 4px rgba(175, 186, 122, 0.15);
            background: #fff;
        }

        .login-form button { 
            margin-top: 10px;
            padding: 16px; 
            background: #afba7a; 
            color: #174029; 
            border: none;
            border-radius: 12px; 
            cursor: pointer; 
            font-weight: 700; 
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .login-form button:hover { 
            background: #9da86d; 
            transform: scale(1.02);
            box-shadow: 0 8px 15px rgba(157, 168, 109, 0.3);
        }

        .login-form button:active {
            transform: scale(0.98);
        }

        .error-msg {
            background: #fff5f5;
            color: #c0392b;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            font-size: 0.9rem;
            border: 1px solid #feb2b2;
            text-align: center;
        }

        .back-link {
            display: inline-block;
            margin-top: 30px;
            color: #a0aec0;
            text-decoration: none;
            font-size: 0.9rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .back-link:hover { 
            color: #afba7a;
            letter-spacing: 0.5px;
        }
    </style>
</head>
<body>

    <div class="container">
        <p class="kaomoji">⊹₊˚‧︵‿₊୨ᰔ୧₊‿︵‧˚₊⊹</p>
        <h2>Welcome Back</h2>
        <p class="kaomoji">⊹₊˚‧︵‿₊୨ᰔ୧₊‿︵‧˚₊⊹</p>

        <?php if ($error): ?>
            <div class="error-msg">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>

        <form class="login-form" method="POST" action="login.php">
            <input type="text" name="username" placeholder="Username" required autocomplete="off">
            <input type="password" name="password" placeholder="Password" required>
            <button type="submit">Sign In</button>
        </form>

        <a href="welcome.php" class="back-link">← Return to Home</a>
    </div>

</body>
</html>