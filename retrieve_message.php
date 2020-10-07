<?php

if(isset($_GET['from_id']) && isset($_GET['from_type']) && isset($_GET['to_id']) && isset($_GET['to_type'])){
    require_once "include\common.php";
    $from_id = $_GET['from_id'];
    $from_type = $_GET['from_type'];
    $to_id = $_GET['to_id'];
    $to_type = $_GET['to_type'];
    //companyDAO is for retrieving the and company image
    $userDAO = new userDAO();
    $companyDAO = new companyDAO();
    $messageDAO = new messageDAO();
    //userDAO and companyDAO are for retrieving the user picture and company picture
    //$userDAO = new userDAO();
   // $companyDAO = new companyDAO();
    //Need to account for messages sent TO the user and received FROM the user
    $messages = $messageDAO->retrieve_message_from_to($from_id, $from_type, $to_id, $to_type);
    //Need to convert to a format that javascript can read!!! As JS cannot read what is message, which is a message object from message.php
    $messages_output = [];
    foreach ($messages as $message) {
        $individual_message = [];
        $individual_message["message_id"] =$message->get_message_id();
        $individual_message["body"] = $message->get_body();
        $individual_message["date"] = $message->get_date();
        $individual_message["from_id"] = $message->get_from_id();
        $individual_message["from_type"] = $message->get_from_type();
        $individual_message["seen"] = $message->get_seen();
        $individual_message["time"] = $message->get_time();
        $individual_message["to_id"] = $message->get_to_id();
        $individual_message["to_type"] = $message->get_to_type();
        $individual_message["type"] = $message->get_type();
        $individual_message["body"] = $message->get_body();
        array_push($messages_output, $individual_message);
    }
    echo json_encode($messages_output);
}
?>