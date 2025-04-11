<?php
require_once "task.php";
require_once "user.php";

class TaskManager {
    private $tasks = [];
    private $file = "data/tasks.json";

    public function __construct() {
        if (file_exists($this->file)) {
            $data = json_decode(file_get_contents($this->file), true);
            foreach ($data as $taskData) {
                $this->tasks[] = new Task(
                    $taskData['id'],
                    $taskData['name'],
                    $taskData['priority'],
                    $taskData['userId'],
                    $taskData['due_date']
                );
            }
        }
    }

    public function addTask(Task $task) {
        $this->tasks[] = $task;
        $this->saveTasks();
    }

    public function getTasks() {
        return $this->tasks;
    }

    public function deleteTask($id) {
        $this->tasks = array_filter($this->tasks, fn($task) => $task->getId() != $id);
        $this->saveTasks();
    }

    private function saveTasks() {
        $data = array_map(fn($task) => [
            "id" => $task->getId(),
            "name" => $task->getname(),
            "priority" => $task->getPriority(),
            "userId" => $task->getUserId(),
            "due_date" => $task->getDueDate(),
        ], $this->tasks);

        file_put_contents($this->file, json_encode($data, JSON_PRETTY_PRINT));
    }
}
?>
