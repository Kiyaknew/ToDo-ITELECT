<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Ditto</title>
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
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .container { 
            width: 500px; 
            max-width: 90%;
            background: rgba(255, 255, 243, 0.98); 
            padding: 4rem 3rem; 
            border-radius: 24px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            text-align: center;
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.4);
            animation: fadeIn 0.6s ease-out;
        }

        .kaomoji {
            color: #afba7a;
            font-size: 0.8rem;
            letter-spacing: 2px;
            opacity: 0.7;
            margin-bottom: 1rem;
        }

        h1 { 
            color: #3d3d3d; 
            margin: 0.5rem 0; 
            font-size: 3rem;
            font-weight: 800;
            letter-spacing: -2px;
        }

        h2 {
            color: #7f8c8d;
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 2rem;
        }

        .credits {
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid #edf2f4;
            font-size: 0.9rem;
            color: #95a5a6;
            line-height: 1.6;
        }

        .btn-login {
            display: inline-block;
            margin-top: 10px;
            padding: 16px 40px; 
            background: #afba7a; 
            color: #174029; 
            text-decoration: none;
            border-radius: 12px; 
            font-weight: 700; 
            font-size: 1.1rem;
            transition: all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            box-shadow: 0 8px 15px rgba(175, 186, 122, 0.2);
        }

        .btn-login:hover { 
            background: #9da86d; 
            transform: scale(1.05);
            box-shadow: 0 12px 20px rgba(157, 168, 109, 0.3);
        }

        .btn-login:active {
            transform: scale(0.98);
        }
    </style>
</head>
<body>

    <div class="container">
        <p class="kaomoji">⊹₊˚‧︵‿₊୨ᰔ୧₊‿︵‧˚₊⊹</p>
        <h1>Welcome to Ditto!</h1>
        <h2>Your trusty To Do List companion</h2>
        
        <a href="login.php" class="btn-login">Get Started</a>

        <div class="credits">
            Created by:<br>
            <strong>Erika Dirilo, Mika Madrigal, and Zeane Capuy</strong>
        </div>
    </div>

</body>
</html>