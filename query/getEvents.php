<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 

include_once '../database/controller.php';
include_once '../query/events.php';
 

$database = new Database();

$db = $database->getConnection();
 

$event = new Events($db);
 

$stmt = $event->read();
$num = $stmt->rowCount();
 

if($num>0){
 
   /* $events=array();
    $events["records"]=array();
 
   
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 

        extract($row);
        $event_item=array(
            "d.id" => $id,
            "d.name" => $name,
            "d.os_id" => $os_id,
            "d.rand_id" => $brand_id,
            "d.fotolink" => $fotolink,
            "d.year" => $year,
            "d.price" => $price
        );
 
        array_push($events["records"], $event_item);
    }
 */
    //echo json_encode($event_arr);
    while($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
    $post[] =  $result;
    }

    echo json_encode($post,JSON_NUMERIC_CHECK);

}
 
else{
    echo json_encode(
        array("message" => "No events found.")
    );
}
?>
