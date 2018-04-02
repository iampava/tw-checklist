<?php 
    include "../config.php";

    // Create connection
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class Auth {
        static function login($username, $password) {
            global $conn;
        
            $sql = "SELECT username, password FROM users WHERE username='{$username}' AND password='{$password}'";
            
            $result = $conn->query($sql);
            
            
            if ($result->num_rows > 0) {
                $token = bin2hex(random_bytes(10));

                $tokenSql = "INSERT INTO tokens (token, username) VALUES ('{$token}', '{$username}')";
                $conn->query($tokenSql);

                return $token;
            } else {
                return FALSE;
            }
        }

        static function logout() {
            session_start();
            
            unset($_SESSION);
            session_destroy();
            session_write_close();
        }

    }
?>