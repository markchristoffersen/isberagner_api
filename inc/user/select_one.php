<?php
include '../conn.php';
include '../controller/user.php';
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$Database = new Database();
$conn = $Database->getConnection();

$user = new User($conn);

if(isset($_GET['id'])){
    $user_id = $_GET['id'];

    $selected_user = $user->select_one_user($user_id);

    if($selected_user){
        echo json_encode($selected_user);
    }

    /*try{
       $sql = "SELECT * FROM users WHERE id = :id";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':id',$user_id, PDO::PARAM_INT);
       $stmt->execute();
       $user = $stmt->fetch(PDO::FETCH_ASSOC);

       if($user){
        echo $user['id'];
        echo $user['username'];
        echo $user['role'];
        echo $user['password'];
       }else{
        echo "ingen bruger fundet med id" . $user_id;
       }
    
    }catch(PDOException $e){
        echo "Fejl ved forespørgsel: " . $e->getMessage;
    }*/
}
?>