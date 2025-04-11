<?php
require_once "taskmanager.php";
$taskManager = new TaskManager();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = uniqid();
    $name = $_POST["TaskName"];
    $priority = $_POST["prior"];
    $userId = "user1"; 
    $due_date = $_POST["due_date"];
    $task = new Task($id, $name, $priority, $userId, $due_date);
    $taskManager->addTask($task);
}

if (isset($_GET["delete"])) {
    $taskManager->deleteTask($_GET["delete"]);
}

$tasks = $taskManager->getTasks();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Manager</title>
    <style>
    .container {
        display: flex;
    }

    .container1 {
        display: block;
        width: 700px;
        height: 100vh;
        background-color: pink;
        text-align: center;
        margin: auto;
        border-radius: 4px;
    }

    a {
        text-decoration: none;
        color: antiquewhite;
        padding: 6px;
        border-radius: 2px;
        background-color: black;
    }

    .container2 {
        padding: 20px;
        width: 400px;
        height: 150px;
        margin: auto;
        background-color: pink;
        text-align: center;
        border-radius: 4px;
    }

    button {
        border: none;
        padding: 6px;
        background-color: black;
        color: antiquewhite;
        border-radius: 3px;
        margin: 15px;
    }

    select {
        border: none;
        padding: 6px;
        background-color: antiquewhite;
        color: black;
        border-radius: 3px;
    }

    input {
        padding: 5px;
        margin: 3px;
        border: none;
        background-color: antiquewhite;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="container1">
            <h2>Tasks</h2>
            <?php foreach ($tasks as $task): ?>
            <div class="task">
                <strong><?= $task->getname() ?></strong><br>
                Priority: <?= $task->getPriority()." , "?>
                Due: <?= $task->getDueDate()?>
                <a href="?delete=<?= $task->getId() ?>">Delete</a>
            </div>
            <?php endforeach; ?>
        </div>
        <div class="container2">
            <h2> Add Task </h2>
            <form method="post">
                <input type="text" name="TaskName" placeholder="Task name" required>
                <select name="prior" id="prior">
                    <option>High</option>
                    <option>Medium</option>
                    <option>Low</option>
                </select>
                <input type="date" name="due_date" required>
                <button type="submit">Add Task</button>
            </form>
        </div>
    </div>
</body>

</html>
