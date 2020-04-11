<?php 
class DB {
    private $server;
    private $username;
    private $pass;
    private $dbname;
    private $table;
    private $pdo;
    
    public function __construct($server, $username, $pass, $dbname) {
        $this->server = $server;
        $this->username = $username;
        $this->pass = $pass;
        $this->dbname = $dbname;
        $this->table = FALSE;
        $this->pdo = new PDO("mysql: host=$server; dbname=$dbname", $username, $pass);
        
    }
    
    public function setTable($table) {
        $this->table = $table;
    }
        
    public function insert ($data, $table=FALSE) {
        if (!$table && !$this->table) {
            echo "Table is not selected";
            return;
        } else if (!$table && $this->table) {
            $table = $this->table;
        }
        
        $fields = "";
        $values = "";
        foreach ($data as $key => $value) {
            if ($fields == "") {
                $fields .= "$key";
                $values .= "'$value'";
            } else {
                $fields .= ", $key";
                $values .= ", '$value'";
            }
        }
        
        $query = "INSERT INTO $table ($fields) VALUES ($values)";
        $query = $this->pdo->prepare($query);
        $query->execute();
        
    }
    
    public function edit($data, $recordToEdit, $table=FALSE) {
        if (!$table && !$this->table) {
            echo "Table is not selected";
            return;
        } else if (!$table && $this->table) {
            $table = $this->table;
        }
        
        $query = "UPDATE $table SET";
        foreach ($data as $key => $value) {
            $query .= " $key = '$value',";
        }
        $query = substr_replace($query, "", -1, 1);
        $key = array_key_first($recordToEdit);
        $query .= " WHERE $key = '$recordToEdit[$key]'";
        $query = $this->pdo->prepare($query);
        $query->execute();
    }
}

$db = new DB("localhost", "root", "", "edu_db");
$db->setTable("user_tbl");
$array = array('username' => "admin", 'password' => sha1("123"), 'email' => "admin@admin.com", 'age' => 25);
$row = array('username' => "admin");
$db->edit($array, $row);
// $db->insert($array);
?>