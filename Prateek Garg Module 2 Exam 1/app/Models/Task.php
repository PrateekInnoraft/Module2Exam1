<?php

// Creating a class named Task in which all the functions are present.

class Task {
    private $conn;

    // Created a constructor
    public function __construct($host, $user, $password, $dbname) {
        $this->conn = new mysqli($host, $user, $password, $dbname);

        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    // Created a public function to display all tasks
    public function getAllTasks() {
        $sql = "SELECT * FROM tasks ORDER BY id DESC";
        $result = $this->conn->query($sql);

        $tasks = array();

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                array_push($tasks, $row);
            }
        }

        return $tasks;
    }

    // Created a function to add tasks
    public function addTask($task) {
        $sql = "INSERT INTO tasks (task) VALUES ('$task')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Created a function to delete tasks
    public function deleteTask($id) {
        $sql = "DELETE FROM tasks WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Created a function to Update tasks
    public function updateTask($id, $newTask) {
        $sql = "UPDATE tasks SET task='$newTask', updated_at=NOW() WHERE id=$id";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            return false;
        }
    }

    // Created the destructor
    public function __destruct() {
        $this->conn->close();
    }
}

?>