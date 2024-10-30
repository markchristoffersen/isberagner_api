<?php

class User{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function select_all_user(){
        try{
            $sql = "SELECT * FROM users";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $users = $stmt->fetchALL(PDO::FETCH_ASSOC);

            return $users;  
        }catch (PDOException $e) {
            echo "Fejl ved forespørgsel: " . $e->getMessage();
            return []; // Returner en tom array ved fejl
        }
    }

    public function select_one_user($id){
        try{
            $sql = "SELECT * FROM users WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id,PDO::PARAM_INT);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            return $user;
        }catch(PDOException $e){
            echo "Fejl ved forespørgsel: " . $e->getMessage();
        }
    }
}
?>