<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../controllers/TaskController.php';

$database = new Database();
$db = $database->getConnection();

$controller = new TaskController($db);

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {
    case 'GET':
        $controller->list();
        break;

    case 'POST':
        $data = json_decode(file_get_contents("php://input"), true);
        $controller->create($data);
        break;

    case 'DELETE':
        parse_str($_SERVER['QUERY_STRING'], $query);
        $controller->delete($query['id'] ?? null);
        break;

    default:
        echo json_encode(["success" => false, "message" => "Método não permitido"]);
}
