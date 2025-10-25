<?php
require_once __DIR__ . '/../models/Task.php';

class TaskController {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function list() {
        $task = new Task($this->db);
        $stmt = $task->getAll();
        $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode(["success" => true, "data" => $tasks]);
    }

    public function create($data) {
        $task = new Task($this->db);
        $task->title = $data['title'] ?? '';
        $task->completed = $data['completed'] ?? 0;
        $success = $task->create();
        echo json_encode(["success" => $success]);
    }

    public function delete($id) {
        $task = new Task($this->db);
        $task->id = $id;
        $success = $task->delete();
        echo json_encode(["success" => $success]);
    }
}
