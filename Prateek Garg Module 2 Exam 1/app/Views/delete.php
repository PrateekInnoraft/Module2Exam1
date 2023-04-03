<link rel="stylesheet" href="./css/style.css">
<?php
include "Task.php";
// Including the Task.php file and creating an object with the database credentials
$task = new Task("localhost", "Prateek", "Prateek@123", "todo");
// Storing the id in a variable
$id = $_GET["id"];
// Calling the deleteTask function to delete the task and the display the rest of the task to the main page.
if($task->deleteTask($id)) {
    header("Location: index.php");
} else {
    // Error
    echo "Error deleting task";
}
?>