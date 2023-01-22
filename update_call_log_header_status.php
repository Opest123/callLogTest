<?php

include('db.php');

if (isset($_POST['callId']) && isset($_POST['status'])) {
    $callId = $_POST['callId'];
    $status = $_POST['status'];

    $updateCallLogHeaders = "UPDATE `call_headers` SET `status`='" . $status . "' WHERE callId='" . $callId . "'";

    if ($mysqli->query($updateCallLogHeaders) !== TRUE) {
        $_SESSION['error'] = 'Error updating call log headers total_hours and total_minutes';
    }

    $_SESSION['status'] = "Status Updated Successfully";

    header('location:index.php');
} else {
    $_SESSION['error'] = "Error Update Status";

    header('location:index.php');
}
?>