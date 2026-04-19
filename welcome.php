<!DOCTYPE html>
<head>
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
            width: 500px;
            max-width: 90%;
            background: rgb(255, 255, 243);
            padding: 3.5rem;
            border-radius: 12px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            text-align: center;
            border: 1px solid #eee;
        }

        h1 {
            color: #333;
            margin-top: 0;
            margin-bottom: 1.5rem;
            font-size: 2.5rem;
        }

        p {
            color: #555;
            margin-bottom: 2.5rem;
            font-size: 1.1rem;
            line-height: 1.5;
        }

        .btn-login {
            display: inline-block;
            text-decoration: none;
            padding: 15px 40px;
            background: #afba7a;
            color: rgb(23, 64, 41);
            border: 3px solid rgb(86, 107, 95);
            border-radius: 6px;
            cursor: pointer;
            font-weight: bold;
            font-size: 1.2rem;
            transition: none;
            transform: none;
        }

        .btn-login:hover {
            background: #9da86d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Welcome to Ditto!</h1>
        <h2>Your trusty To Do List companion</h2>
        <p>Created by: Erika Dirilo, Mika Madrigal, and Zeane Capuy</p>
        <a href="login.php" class="btn-login">Login</a>
    </div>
</body>
</html>