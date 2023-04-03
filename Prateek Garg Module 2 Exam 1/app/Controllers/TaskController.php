<?php
namespace app\Controllers;
use \core\View;   
use app\Models\Users;
class TaskController {
    private $task;

    public function __construct($task) {
        $this->task = $task;
    }

    // Index action used to render onto the index file of views.
    public function index() {
        $tasks = $this->task->getAllTasks();
        require_once 'app/Views/index.php';
    }

    // Function used to add the tasks.
    public function add() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $task = $_POST['task'];
            $newTask = $this->task->addTask($task);
            if ($newTask) {
                echo json_encode($newTask);
            } else {
                echo json_encode(array('error' => 'Unable to add task'));
            }
        } else {
            require_once 'app/Views/add.php';
        }
    }

    // Function used to update the tasks
    public function update() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $newTask = $_POST['new_task'];
            $updatedTask = $this->task->updateTask($id, $newTask);
            if ($updatedTask) {
                echo json_encode($updatedTask);
            } else {
                echo json_encode(array('error' => 'Unable to update task'));
            }
        } else {
            $id = $_GET['id'];
            $task = $this->task->getTaskById($id);
            require_once 'app/Views/update.php';
        }
    }

    // Function used to delete the tasks.
    public function delete() {
        $id = $_POST['id'];
        $result = $this->task->deleteTask($id);
        if ($result) {
            echo json_encode(array('success' => 'Task deleted successfully'));
        } else {
            echo json_encode(array('error' => 'Unable to delete task'));
        }
    }
}
