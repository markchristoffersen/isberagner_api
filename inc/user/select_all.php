<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include '../conn.php';
include '../controller/user.php';

$database = new Database();
$conn = $database->getConnection();

$user = new User($conn);
$users = $user->select_all_user();

if($user){
    echo json_encode($users);
}else {
    echo json_encode(["message" => "Ingen brugere fundet."]); // Ingen brugere
}
?>