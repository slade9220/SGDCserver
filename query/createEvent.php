<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
include_once '../database/controller.php';
include_once '../query/events.php';
 
$database = new Database();
$db = $database->getConnection();
 
$event = new Events($db);
 
// get posted data
$data = json_decode(file_get_contents("php://input"));
 
// set product property values
$event->name = $data->name;
$event->tag = $data->tag;
$event->day = $data->day;
$event->startingHour = $data->startingHour;
$event->startingMinute = $data->startingMinute;
$event->endingHour = $data->endingHour;
$event->endingMinute = $data->endingMinute;
$event->location = $data->location;
$event->calendarLink = "link";
$event->description = "description";

//echo json_encode(($event))
 
// create the event

if($event->create()){
    echo '{';
        echo json_encode(($event));
    echo '}';
}
// if unable to create the event
else{
    echo '{';
        echo '"message": "Unable to create event."';
    echo '}';
}


?>
