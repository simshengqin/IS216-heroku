<?php
if(isset($_GET['body']) && isset($_GET['date']) && isset($_GET['from_id']) && isset($_GET['from_type']) && isset($_GET['seen']) && isset($_GET['time']) && isset($_GET['to_id']) && isset($_GET['to_type']) && isset($_GET['type'])){
    require_once "include/common.php";
    $body = $_GET['body'];
    $date = $_GET['date'];
    $from_id = $_GET['from_id'];
    $from_type = $_GET['from_type'];
    $seen = $_GET['seen'];
    $time = $_GET['time'];
    $to_id = $_GET['to_id'];
    $to_type = $_GET['to_type'];
    $type = $_GET['type'];
    $messageDAO = new messageDAO();
    $status = $messageDAO -> add($body, $date, $from_id, $from_type, $seen, $time, $to_id, $to_type, $type);
    if (!$status) {
        echo "error";
    }
    else {
        echo "success";
    }
    //echo json_encode($messages_output);

}
?>