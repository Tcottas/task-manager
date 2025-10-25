<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");
header("Access-Control-Allow-Methods: GET, POST, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$request_uri = $_SERVER['REQUEST_URI'];

if (strpos($request_uri, '/tasks') !== false) {
    require_once __DIR__ . '/routes/tasks.php';
} else {
    echo json_encode(["success" => false, "message" => "Endpoint não encontrado"]);
}
