<?php 
    session_start();

    switch ($_SERVER['REQUEST_METHOD']) { 
        case "GET":
            include_once "../models/user.model.php";
            include_once "../models/topic.model.php";
            include_once "../models/todo.model.php";

            if(!isset($_SESSION["token"])) {
                $loggedUser = new User(NULL);
            } else {
                $loggedUser = new User($_SESSION["token"]);
            }
            
            $topics = Topics::getTopics();
            $todos = $loggedUser -> getTodos();

            if($loggedUser -> isLogged()) {
                include_once "../views/home.view.php";
            } else {
                include_once "../views/home_unauthorized.view.php";
            }
            break;
        case "POST":
            include_once "../models/auth.model.php";
        
            if(isset($_POST["logout_submit"])) {
                Auth::logout();
                
                header("Location: /");
            }
            break;
        default:
            break;
    }
?>