<link rel="stylesheet" href="../css/style.css">
<?php
include "Task.php";
// Including the Task.php file and creating an object with the database credentials
$task = new Task("localhost", "Prateek", "Prateek@123", "todo");
// Storing the new task in a new variable.
if(isset($_POST["task"])) {
    $newTask = $_POST["task"];

    // After adding the task into database displaying it to the index page.
    if($task->addTask($newTask)) {
        header("Location: index.php");
    } else {
        // Error
        echo "Error adding task";
    }
}

// Form for adding a task. 
?>
<form method="post" action="">
    <input type="text" name="task" placeholder="Add task">
    <button type="submit">Add</button>
</form>