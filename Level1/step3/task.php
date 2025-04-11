<?php 
class task{
    private $id;
    private $name;
    private $priority;
    private $due_date;
    private $userId;
    
    public function __construct($id, $name, $priority, $userId, $due_date) {
        $this->id = $id;
        $this->name = $name;
        $this->priority = $priority;
        $this->userId = $userId;
        $this->due_date = $due_date;
    }
    public function getId() { return $this->id; }
    public function getname() { return $this->name; }
    public function getPriority() { return $this->priority; }
    public function getUserId() { return $this->userId; }
    public function getDueDate() { return $this->due_date; }
    public function setTitle($name) { $this->name= $name; }
    public function setPriority($priority) { $this->priority = $priority; }
    public function setDueDate($due_date) { $this->due_date = $due_date; }
}
