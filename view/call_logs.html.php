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
    echo "
        <form method='post' action='search.php' class='flex items-center mb-4'>
        <div class='relative w-full'>
            <div class='absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none'>
                <svg aria-hidden='true' class='w-5 h-5 text-gray-500 dark:text-gray-400' fill='currentColor' viewBox='0 0 20 20' xmlns='http://www.w3.org/2000/svg'><path fill-rule='evenodd' d='M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z' clip-rule='evenodd'></path></svg>
            </div>
            <input type='text' id='simple-search' name='search' class='bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500' placeholder='Search' required>
        </div>
        <button type='submit' class='p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800'>
            <svg class='w-5 h-5' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z'></path></svg>
            <span class='sr-only'>Search</span>
        </button>
        </form>
        ";
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
