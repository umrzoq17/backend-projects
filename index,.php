<?php 
require_once "Database.php" ;           
    class User{
    private $db;
    private $conn;

    private $table = "people";

    public function __construct() {

$this->db = new Database();

$this->conn = $this->db->getConnection();

    }

    public function addUser($name, $email) {

$stmt = $this->conn->prepare("INSERT INTO {$this->table} (username, email) VALUES (?, ?)");

$stmt->bind_param("ss", $name, $email);

$stmt->execute();

    echo " Yangi foydalanuvchi qo'shildi: $name<br>";

    }

    public function getAllUsers() {

$sql = "SELECT id, username, email FROM {$this->table}";

$result = $this->conn->query($sql);

     if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

    echo " ID: {$row['id']} | {$row['username']} - {$row['email']}<br>";

        }

    } else {

    echo " Ma'lumot topilmadi.<br>";

    }

}

public function deleteUser($id) {
 
$stmt = $this->conn->prepare("DELETE FROM {$this->table} WHERE id = ?");

$stmt->bind_param("i", $id);
  
$stmt->execute() ; 
echo "Foydalanuvchi id o'chirildi <br>" ;     

}

    }


    
?>