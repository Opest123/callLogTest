<?php

$mysqli = new mysqli('127.0.0.1', 'root', '', 'call_logs', 3306, 'mysql');
$message = '';

if ($mysqli->connect_errno) {
    $_SESSION['error'] = "Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error;
    die();
}
$_SESSION['success'] = "Database connection established";

$sql = "SELECT * FROM call_headers;";
$callLogsHeaderResults = mysqli_query($mysqli, $sql);

$sqlCallDetails = "SELECT * FROM call_details;";
$callLogsDetailsResults = mysqli_query($mysqli, $sqlCallDetails);

$logHeaders = [];
$logDetails = [];

while ($callLogs = mysqli_fetch_array($callLogsHeaderResults)) {
    $logHeaders[] = [
        'callId' => $callLogs['callId'],
        'date' => $callLogs['date'],
        'it_person' => $callLogs['it_person'],
        'username' => $callLogs['username'],
        'subject' => $callLogs['subject'],
        'details' => $callLogs['details'],
        'total_hours' => $callLogs['total_hours'],
        'total_minutes' => $callLogs['total_minutes'],
        'status' => $callLogs['status']
    ];
}

while ($callDetails = mysqli_fetch_array($callLogsDetailsResults)) {
    $logDetails[] = [
        'id' => $callDetails['id'],
        'callId' => $callDetails['callId'],
        'date' => $callDetails['date'],
        'details' => $callDetails['details'],
        'hours' => $callDetails['hours'],
        'minutes' => $callDetails['minutes']
    ];
}
?>