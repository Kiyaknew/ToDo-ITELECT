<?php
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
    <title>My Tasks</title>
    <style>
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            background-image: url(bggg.jpg);
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-repeat: no repeat;

            display: flex; 
            justify-content: center; 
            align-items: center; 
            min-height: 100vh;   
            margin: 0;
        }
        
        .container { 
            width: 800px; 
            max-width: 95%;
            height: 600px; 
            background: rgb(255, 255, 243); 
            padding: 2.5rem; 
            border-radius: 12px; 
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column; 
            position: relative; 
        }

        h2 { text-align: center; color: #333; margin-top: 0; font-size: 2rem; }
        
        .add-form { display: flex; gap: 15px; margin-bottom: 25px; }
        .add-form input { flex: 1; padding: 12px; border: 3px solid #6d6262; border-radius: 6px; font-size: 1rem; }
        .add-form button { padding: 12px 25px; background: #afba7a; color: rgb(23, 64, 41); border: 3px solid rgb(86, 107, 95); border-radius: 6px; cursor: pointer; font-weight: bold; }
        .add-form button:hover { background: #9da86d; }
        
        ul { 
            list-style: none; 
            padding: 0; 
            margin: 0 0 50px 0; 
            flex-grow: 1;      
            overflow-y: auto;  
            border-top: 1px solid #eee;
        }

        li { display: flex; align-items: center; justify-content: space-between; padding: 12px; border-bottom: 1px solid #eee; }
        .task-item { display: flex; align-items: center; gap: 15px; flex: 1; cursor: pointer; font-size: 1.1rem; }
        .completed { text-decoration: line-through; color: #888; }
        .delete-btn { color: #c1429d; text-decoration: none; font-weight: bold; font-size: 18px; padding: 5px 10px; }
        .delete-btn:hover { background: #fff5f5; border-radius: 50%; }

        
        .logout-btn {
            position: absolute;
            right: 2.5rem;   
            bottom: 1.5rem; 
            background-color: #f48c8c;
            color: rgb(148, 48, 48);
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 6px;
            font-size: 14px;
            font-weight: bold;
            transition: background 0.3s;
        }
        .logout-btn:hover { background-color: #e688d1; }
    </style>
</head>
<body>

    <div class="container">
        <h2>My Tasks</h2>
        
        <form class="add-form" method="POST" action="list.php">
            <input type="text" name="task" placeholder="+ New Task" required>
            <button type="submit" name="add_task">Add Task</button>
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

        <a href="welcome.php" class="logout-btn">Logout</a> //redirect to welcome.php
    </div>

</body>
</html>