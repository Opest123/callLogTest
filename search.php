<?php

include('db.php');

if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM call_headers WHERE callId LIKE '%" . $search . "%' OR it_person LIKE '%" . $search . "%' OR username LIKE '%" . $search . "%' OR date LIKE '%" . $search . "%';";
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

        while ($callDetails = mysqli_fetch_array($callLogsDetailsResults)) {
            if ($callLogs['callId'] == $callDetails['id']) {
                $logDetails[] = [
                    'id' => $callDetails['id'],
                    'callId' => $callDetails['callId'],
                    'date' => $callDetails['date'],
                    'details' => $callDetails['details'],
                    'hours' => $callDetails['hours'],
                    'minutes' => $callDetails['minutes']
                ];
            }
        }
    }

    echo "<table class='w-full text-sm text-left text-gray-500 dark:text-gray-400'>
  <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
    <tr>
      <th scope='col' class='px-6 py-3'>Call Id</th>
      <th scope='col' class='px-6 py-3'>Date</th>
      <th scope='col' class='px-6 py-3'>IT Person</th>
      <th scope='col' class='px-6 py-3'>Username</th>
      <th scope='col' class='px-6 py-3'>Subject</th>
      <th scope='col' class='px-6 py-3'>Details</th>
      <th scope='col' class='px-6 py-3'>Total Hours</th>
      <th scope='col' class='px-6 py-3'>Total Minutes</th>
      <th scope='col' class='px-6 py-3'>Status</th>
    </tr>
  </thead>";
    echo '<tbody>';
    foreach ($logHeaders as $index => $logHeader) {
        echo '<tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">';
        echo '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white" id="callLogHeaderId">' . $logHeader['callId'] . '</td>';
        echo '<td class="px-6 py-4">' . $logHeader['date'] . '</td>';
        echo '<td class="px-6 py-4">' . $logHeader['it_person'] . '</td>';
        echo '<td class="px-6 py-4">' . $logHeader['username'] . '</td>';
        echo '<td class="px-6 py-4">' . $logHeader['subject'] . '</td>';
        echo '<td class="px-6 py-4">' . $logHeader['details'] . '</td>';
        echo '<td class="px-6 py-4" id="hours">' . $logHeader['total_hours'] . '</td>';
        echo '<td class="px-6 py-4" id="minutes">' . $logHeader['total_minutes'] . '</td>';
        echo '<td class="px-6 py-4" id="minutes">' . $logHeader['status'] . '</td>';
        echo '</tr>';
        echo '</tbody>';

        foreach ($logDetails as $logDetail) {
            if ($logDetail['callId'] === $logHeader['callId']) {
                echo "<table class='w-full text-sm text-left text-gray-500 dark:text-gray-400 my-3'>
                      <thead class='text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400'>
                        <tr>
                          <th scope='col' class='px-6 py-3'>Call Id</th>
                          <th scope='col' class='px-6 py-3'>Date</th>
                          <th scope='col' class='px-6 py-3'>Details</th>
                          <th scope='col' class='px-6 py-3'>Hours</th>
                          <th scope='col' class='px-6 py-3'>Minutes</th>
                          <th scope='col' class='px-6 py-3'>Action</th>
                        </tr>
                      </thead>";
                echo '<tbody>';
                echo '<tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-600">';
                echo '<td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">' . $logDetail['callId'] . '</td>';
                echo '<td class="px-6 py-4">' . $logDetail['date'] . '</td>';
                echo '<td class="px-6 py-4">' . $logDetail['details'] . '</td>';
                echo '<td class="px-6 py-4">' . $logDetail['hours'] . '</td>';
                echo '<td class="px-6 py-4">' . $logDetail['minutes'] . '</td>';
                echo "<td class='px-6 py-4'>
                <a href='delete.php?id=$logDetail[id]&hours=$logDetail[hours]&minutes=$logDetail[minutes]&callId=$logDetail[callId] ' class='text-red-600'>
                    Delete
                </a>
                </td>";
            }
        }
    }
    echo '</tbody>';
    echo "</table>";
    echo "</table>";
}
?>