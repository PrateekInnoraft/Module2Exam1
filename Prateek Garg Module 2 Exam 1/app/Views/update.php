<link rel="stylesheet" href="../css/style.css">
<?php
include "Task.php";
// Including the Task.php file and creating an object with the database credentials
$task = new Task("localhost", "Prateek", "Prateek@123", "todo");

// checking the is and newtask by post method and using these variables to update tasks
if(isset($_POST["id"]) && isset($_POST["newTask"])) {
    $id = $_POST["id"];
    $newTask = $_POST["newTask"];

    if($task->updateTask($id, $newTask)) {
        // Will show the page in which we can alter the task.
        header("Location: index.php");
    } else {
        // Error
        echo "Error updating task";
    }
} else if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $result = $task->getAllTasks();

    // Displaying all the updated tasks
    $selectedTask = null;
    foreach($result as $t) {
        if($t["id"] == $id) {
            $selectedTask = $t;
            break;
        }
    }

    if($selectedTask == null) {
        // Task not found
        echo "Task not found";
    } else {
        ?>

        <form method="post" action="">
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <input type="text" name="newTask" value="<?php echo $selectedTask["task"] ?>">
            <button type="submit">Update</button>
        </form>

        <?php
    }
}
?>
