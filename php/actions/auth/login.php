<?php
    session_start();

    include  '../database/database.php';

    if(isset($_POST['submit'])){
        
        if(checkCredentials($_POST['username'], $_POST['password'])) {
            $_SESSION['username'] = $_POST['username'];
            closeConnection();            
            header("Location: /php/views/home.php");
        } else {
            closeConnection();
            header("Location: /index.php?invalid_login");
        }
    }
?>