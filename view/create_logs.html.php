<div class="flex justify-between space-x-4 my-5">
    <form method="post" action="create_log_headers.php" class="w-1/2">
        <label class="font-semibold text-xl mb-4">Create Log Headers</label>

        <div class="relative z-0 w-full my-1 group">
            <label>Call Id</label>

            <input type="number" name="callId" id="callId"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder="" required/>
        </div>
        <div class="relative z-0 w-full mb-1 group">
            <label>Date</label>

            <input type="datetime-local" name="date" id="date"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder=" Date" required/>
        </div>
        <div class="relative z-0 w-full mb-1 group">
            <label>IT Person</label>
            <input type="text" name="it_person" id="it_person"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder=" " required/>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Username</label>

            <input type="text" name="user_name" id="user_name"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder=" " required/>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Subject</label>
            <input type="text" name="subject" id="subject"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder=" "/>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Details</label>
            <textarea id="w3review" name="details" rows="4" cols="50"
                      class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1" required>
            </textarea>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Status</label>

            <select name="status" id="status"
                    class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1" required>
                <option value="New">New</option>
                <option value="In Progress">In Progress</option>
                <option value="Completed">Completed</option>
            </select>
        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Log Header
        </button>
    </form>

    <form method="post" action="create_log_details.php" class="w-1/2">
        <label class="font-semibold text-xl mb-4">Create Log Details</label>

        <div class="relative z-0 w-full my-1 group">
            <label>Call Id</label>

            <select name="callId" id="callId"
                    class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1">
                <?php
                if (!empty($logHeaders)) {
                    foreach ($logHeaders as $logHeader) {
                        echo "<option value=$logHeader[callId]>$logHeader[callId]</option>";
                    }
                }
                ?>
            </select>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Date</label>

            <input type="datetime-local" name="date" id="date"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder=" Date" required/>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Details</label>
            <textarea id="w3review" name="details" rows="4" cols="50"
                      class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1" required>
            </textarea>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Hours</label>

            <input type="number" name="hours" id="hours" max="24"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder="" required/>
        </div>

        <div class="relative z-0 w-full mb-1 group">
            <label>Minutes</label>

            <input type="number" name="minutes" id="minutes" max="59"
                   class="block py-2 px-5 px-0 w-full text-sm border-2 border-black rounded-md mt-1"
                   placeholder="" required/>
        </div>

        <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Create Log Details
        </button>
    </form>
</div>
