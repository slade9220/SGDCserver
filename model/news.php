<?php
class News{
 
    private $conn;
    private $table_name = "News";
 
    // object properties
    public $id;
    public $name;
    public $text;
    public $data;
    
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



function read() {
 
    $query = "SELECT *
              FROM News n
              ORDER BY n.data ASC ";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();



    return $stmt;
}

function create() {
 
    // query to insert record
    $query = "INSERT INTO
                " . $this->table_name . "
            SET
                name=:name, text=:text, data=:data";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->text=htmlspecialchars(strip_tags($this->text));
    $this->data=htmlspecialchars(strip_tags($this->data));

 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":text", $this->text);
    $stmt->bindParam(":data", $this->data);
    
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

function delete(){
 
    // delete query
    $query = "DELETE FROM " . $this->table_name . " WHERE id = ?";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->id=htmlspecialchars(strip_tags($this->id));
 
    // bind id of record to delete
    $stmt->bindParam(1, $this->id);
 
    // execute query
    if($stmt->execute()){
        return true;
    }
 
    return false;
     
}

}

?>