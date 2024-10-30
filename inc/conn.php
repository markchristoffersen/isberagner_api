<?php

class Database{
    
    private $host = 'localhost';   // Din serveradresse
    private $db_name = 'is_beragner'; // Navn på din database
    private $username = 'remote';    // Dit brugernavn
    private $password = 'Kode1234!'; // Din adgangskode
    public $conn_db;

    public function getConnection() {
        try {
            // Indsæt porten i DSN-strengen
            $this->conn_db = new PDO("mysql:host={$this->host};port=3306;dbname={$this->db_name}", $this->username, $this->password);
            $this->conn_db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "Forbindelsen til databasen blev oprettet"; // Til testformål
        } catch (PDOException $exception) {
            echo "Fejl ved forbindelse: " . $exception->getMessage();
        }
        return $this->conn_db;
    }
}
    


?>
