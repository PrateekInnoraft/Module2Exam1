<link rel="stylesheet" href="./css/style.css">
<?php
include "Task.php";
// Including the Task.php file and creating an object with the database credentials
$task = new Task("localhost", "Prateek", "Prateek@123", "todo");
?>
<header>
    Prateek's Todo List
</header>

<main>
    <ul class="task-list">
        <?php
        // Storing the tasks in a variable and dispalying them.
            $tasks = $task->getAllTasks();

            if (count($tasks) > 0) {
                echo "<ul>";
                foreach($tasks as $t) {
                    // After the each task delete add and update link is attached.
                    echo "<li>".$t["task"]." <a href='delete.php?id=".$t["id"]."'>Delete</a><a href='add.php?id=".$t["id"]."'>Add</a><a href='update.php?id=".$t["id"]."'>Update</a></li>";
                }
            // Adding a task separately
                echo "<a href='add.php?id=".$t["id"]."'>Add</a>";
                echo "</ul>";
            } else {
                // If no tasks present then displaying the add option.
                echo "<a href='add.php?id=".$t["id"]."'>Add</a>";
            }
        ?>
        </ul>
</main>