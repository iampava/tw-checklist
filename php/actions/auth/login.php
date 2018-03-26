<?php
    session_start();

    $username = 'alex';
    $pass = '1234';

    if(isset($_POST['submit'])){
        
        if ($_POST['username'] === $username && $_POST['password'] === $pass) {

            session_set_cookie_params(3600,"/");
            $_SESSION['username'] = $_POST['username'];
            
            header("Location: /php/views/home.php");
        } else {
            header("Location: /index.php?invalid_login");
        }
    }
?>