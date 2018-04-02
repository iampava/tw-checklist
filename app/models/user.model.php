<?php 
    include_once "../config.php";
    include_once "todo.model.php";

    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);
    
    class User {

        private $isLogged; 
        private $todos;

        public function __construct($token) {
            $this -> todos = [];
            global $conn;
            
            $usernameSql = "SELECT username from tokens WHERE token = '{$token}'";
            $usernameResult =  $conn ->query($usernameSql);

            if($usernameResult -> num_rows === 0) {
                $username = NULL;
                $this -> isLogged = FALSE;
            } else {
                $username = $usernameResult -> fetch_assoc()["username"];
                $this -> isLogged = TRUE;
            }

            $todosSql = '
                    SELECT todos.topic, todos.todo, done_todos.done 
                    FROM todos
                    LEFT JOIN done_todos 
                    ON done_todos.topic=todos.topic 
                    AND done_todos.todo = todos.todo 
                    AND done_todos.username = "' . $username . '"
                ';
            $result = $conn->query($todosSql);

            while($row = $result->fetch_assoc()) {
                $this -> todos[] = new ToDo($row["todo"], $row["topic"], $row["done"]);
            }
        }

        public function getTodos() {
            return $this -> todos;
        }

        public function isLogged() {
            return $this -> isLogged;
        }
    }
?>