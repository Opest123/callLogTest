<?php

include('db.php');

if (isset($_GET['id']) && isset($_GET['hours']) && isset($_GET['minutes']) && isset($_GET['callId'])) {
    $id = $_GET['id'];
    $callId = $_GET['callId'];
    $hours = $_GET['hours'];
    $minutes = $_GET['minutes'];

    $updateCallLogHeaders = "UPDATE `call_headers` SET `total_hours`=`total_hours`-'" . $hours . "', `total_minutes`=`total_minutes`-'" . $minutes . "' WHERE callId='" . $callId . "'";

    if ($mysqli->query($updateCallLogHeaders) !== TRUE) {
        $_SESSION['error'] = 'Error updating call log headers total_hours and total_minutes';
    }

    $sql = "DELETE FROM `call_details` WHERE id='$id'";

    $data = mysqli_query($mysqli, $sql);

    if ($data) {
        $_SESSION['status'] = "Data Deleted Successfully";

        header('location:index.php');
    } else {
        $_SESSION['status'] = "Data Not Deleted";

        header('location:index.php');
    }
} else {
    $_SESSION['error'] = "Error Deleting Data";

    header('location:index.php');
}

?>