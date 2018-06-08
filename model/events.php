<?php
class Events {
 
    private $conn;
    private $table_name = "Events";
 
    // object properties
    public $id;
    public $name;
    public $tag;
    public $day;
    public $startingHour;
    public $startingMinute;
    public $endingHour;
    public $endingMinute;
    public $location;
    public $calendarLink;
 
    // constructor with $db as database connection
    public function __construct($db){
        $this->conn = $db;
    }



function read() {
 
    $query = "SELECT *
              FROM Events e
              ORDER BY e.day ASC, e.startingHour ASC, e.startingMinute ASC";
 
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
                name=:name, tag=:tag, day=:day, startingHour=:startingHour, startingMinute=:startingMinute, endingHour=:endingHour, endingMinute=:endingMinute, location=:location, calendarLink=:calendarLink";
 
    // prepare query
    $stmt = $this->conn->prepare($query);
 
    // sanitize
    $this->name=htmlspecialchars(strip_tags($this->name));
    $this->tag=htmlspecialchars(strip_tags($this->tag));
    $this->day=htmlspecialchars(strip_tags($this->day));
    $this->startingHour=htmlspecialchars(strip_tags($this->startingHour));
    $this->startingMinute=htmlspecialchars(strip_tags($this->startingMinute));
    $this->endingHour=htmlspecialchars(strip_tags($this->endingHour));
    $this->endingMinute=htmlspecialchars(strip_tags($this->endingMinute));
    $this->location=htmlspecialchars(strip_tags($this->location));
    $this->calendarLink=htmlspecialchars(strip_tags($this->calendarLink));
 
    // bind values
    $stmt->bindParam(":name", $this->name);
    $stmt->bindParam(":tag", $this->tag);
    $stmt->bindParam(":day", $this->day);
    $stmt->bindParam(":startingHour", $this->startingHour);
    $stmt->bindParam(":startingMinute", $this->startingMinute);
    $stmt->bindParam(":endingHour", $this->endingHour);
    $stmt->bindParam(":endingMinute", $this->endingMinute);
    $stmt->bindParam(":location", $this->location);
    $stmt->bindParam(":calendarLink", $this->calendarLink);
 
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