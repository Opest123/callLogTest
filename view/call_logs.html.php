<?php
if (isset($_SESSION['error'])) {
    echo "
    <div class='p-4 mb-4 text-sm text-red-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-ted-400' role='alert'>
      <span class='font-medium'>Info alert!</span> $_SESSION[error] 
    </div>
    ";
}
if (isset($_SESSION['success'])) {
    echo "
    <div class='p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-gray-800 dark:text-blue-400' role='alert'>
      <span class='font-medium'>Info alert!</span> $_SESSION[success] 
    </div>
    ";
}

session_destroy()
?>

<header>
    <h1 class="font-bold text-2xl text-center">
        Call Logs
    </h1>
</header>

<?php include "create_logs.html.php"; ?>

<div class="py-5">
    <?php
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
        echo '<td class="px-6 py-4">';
        echo "<form method='post' action='update_call_log_header_status.php' id='update_status-$index'>";
        echo "<input type='hidden' name='callId' value=$logHeader[callId]>";
        echo "<select name='status' id='callLogHeaderstatus-$index' onchange='selChange($index)'
                        class='block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1' required>";
        echo "<option value='New' " . ($logHeader['status'] == 'New' ? "selected='selected'" : '') . ">New</option>";
        echo "<option value='In Progress' " . ($logHeader['status'] == 'In Progress' ? "selected='selected'" : '') . ">In Progress</option>";
        echo "<option value='Completed' " . ($logHeader['status'] == 'Completed' ? "selected='selected'" : '') . ">Completed</option>";
        echo '</select>';
        echo "<button type='submit' hidden></button>";
        echo '</form>';
        echo '</td>';
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
    ?>
</div>
