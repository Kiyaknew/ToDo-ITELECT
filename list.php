<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: welcome.php');
    exit;
}

$file = 'tasks.json';
$json_data = file_exists($file) ? file_get_contents($file) : '';
$tasks = json_decode($json_data, true);
if (!is_array($tasks)) {
    $tasks = [];
}

if (isset($_POST['add_task']) && !empty(trim($_POST['task']))) {
    $tasks[] = ['text' => htmlspecialchars($_POST['task']), 'done' => false];
    file_put_contents($file, json_encode($tasks));
    header('Location: list.php');
    exit;
}

if (isset($_POST['update_index'])) {
    $index = $_POST['update_index'];
    $tasks[$index]['done'] = isset($_POST['done']);
    file_put_contents($file, json_encode($tasks));
    header('Location: list.php');
    exit;
}

if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($tasks[$index])) {
        array_splice($tasks, $index, 1);
        file_put_contents($file, json_encode($tasks));
    }
    header('Location: list.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Tasks - Ditto</title>
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
            width: 700px; 
            max-width: 95%;
            height: 650px; 
            background: rgba(255, 255, 243, 0.98); 
            padding: 3rem; 
            border-radius: 24px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.2);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255,255,255,0.4);
            display: flex;
            flex-direction: column; 
            position: relative; 
            animation: fadeIn 0.6s ease-out;
        }

        h2 { 
            text-align: center; 
            color: #3d3d3d; 
            margin-top: 0; 
            font-size: 2.4rem; 
            font-weight: 800;
            letter-spacing: -1.5px;
        }
        
        .add-form { 
            display: flex; 
            gap: 12px; 
            margin-bottom: 25px; 
        }

        .add-form input { 
            flex: 1; 
            padding: 15px 20px; 
            border: 2px solid #edf2f4; 
            border-radius: 12px; 
            font-family: 'Trebuchet MS', sans-serif;
            font-size: 1rem; 
            outline: none;
            transition: all 0.25s ease;
        }

        .add-form input:focus { 
            border-color: #afba7a;
            box-shadow: 0 0 0 4px rgba(175, 186, 122, 0.15);
        }

        .add-form button { 
            padding: 0 25px; 
            background: #afba7a; 
            color: #174029; 
            border: none;
            border-radius: 12px; 
            cursor: pointer; 
            font-weight: 700; 
            transition: all 0.3s ease;
        }

        .add-form button:hover { 
            background: #9da86d; 
            transform: translateY(-2px);
        }

        ul { 
            list-style: none; 
            padding: 0; 
            margin: 0 0 60px 0; 
            flex-grow: 1;      
            overflow-y: auto;  
            border-top: 2px solid #f1f2f6;
        }

        li { 
            display: flex; 
            align-items: center; 
            padding: 15px 10px; 
            border-bottom: 1px solid #f1f2f6; 
            transition: background 0.2s;
        }

        li:hover {
            background: rgba(175, 186, 122, 0.05);
        }

        .task-item { 
            display: flex; 
            align-items: center; 
            gap: 15px; 
            flex: 1; 
            cursor: pointer; 
            font-size: 1.1rem; 
        }

        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            accent-color: #afba7a;
            cursor: pointer;
        }

        .completed { 
            text-decoration: line-through; 
            color: #b2bec3; 
        }

        .delete-btn { 
            color: #fab1a0; 
            text-decoration: none; 
            font-weight: bold; 
            font-size: 22px; 
            padding: 5px 12px;
            transition: all 0.2s;
        }

        .delete-btn:hover { 
            color: #d63031;
            transform: scale(1.2);
        }

        .logout-btn {
            position: absolute;
            right: 3rem;   
            bottom: 2rem; 
            background: #dfe6e9;
            color: #636e72;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 10px;
            font-size: 0.9rem;
            font-weight: 700;
            transition: all 0.3s;
        }

        .logout-btn:hover { 
            background: #fab1a0;
            color: #d63031;
        }

        /* Custom Scrollbar for the list */
        ul::-webkit-scrollbar {
            width: 6px;
        }
        ul::-webkit-scrollbar-thumb {
            background: #dfe6e9;
            border-radius: 10px;
        }
    </style>
</head>
<body>

    <div class="container">
        <h2>My Tasks</h2>
        
        <form class="add-form" method="POST" action="list.php">
            <input type="text" name="task" placeholder="+ New Task" required>
            <button type="submit" name="add_task">Add</button>
        </form>

        <ul>
            <?php foreach ($tasks as $index => $task): ?>
                <li>
                    <form method="POST" action="list.php" class="task-item">
                        <input type="hidden" name="update_index" value="<?php echo $index; ?>">
                        <input type="checkbox" name="done" onchange="this.form.submit()" <?php echo $task['done'] ? 'checked' : ''; ?>>
                        <span class="<?php echo $task['done'] ? 'completed' : ''; ?>">
                            <?php echo $task['text']; ?>
                        </span>
                    </form>
                    <a href="list.php?delete=<?php echo $index; ?>" class="delete-btn" onclick="return confirm('Delete this task?')">&times;</a>
                </li>
            <?php endforeach; ?>
        </ul>

        <a href="logout.php" class="logout-btn">Logout</a> 
    </div>

</body>
</html>