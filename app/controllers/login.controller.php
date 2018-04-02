<?php 
    session_start();

    switch ($_SERVER['REQUEST_METHOD']) { 
        case "GET":
            if(isset($_SESSION["token"])) {
                header("Location: /home");
            } else if(isset($_SESSION["login_fail"])) {
                unset($_SESSION["login_fail"]);
                include_once "../views/login_fail.view.php";
            } else {
                include_once "../views/login.view.php";
            }
            break;
        case "POST":
            include_once "../models/auth.model.php";
        
            if(isset($_POST["login_submit"])) {
                $loginToken = Auth::login($_POST["username"], $_POST["password"]);

                if($loginToken) {
                    $_SESSION["token"] = $loginToken;
                    header("Location: /home");
                } else {
                    $_SESSION["login_fail"] = TRUE;
                    header("Location: /");
                }
            }
            break;
        default:
            break;
    }
?>