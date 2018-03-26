<?php
    include "../../private.php";

    $servername = "iampava.com";
    $username = "iampava_pava";
    $db = "iampava_tw";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $db);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    echo "Connected successfully";


    function getUsers() {
        
        $sql = "SELECT username, password FROM users";
        $result = $conn->query($sql);
    
    
        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
                echo "Username: " . $row["username"]. " - Pass: " . $row["password"]. "<br>";
            }
        } else {
            echo "0 results";
        }
    }

    function checkCredentials($username, $password) {
        global $conn;
        
        $sql = "SELECT username, password FROM users WHERE username='{$username}' AND password='${password}'";
        
        $result = $conn->query($sql);
    
    
        if ($result->num_rows > 0) {
           return TRUE;
        } else {
            RETURN FALSE;
        }
    }

    function closeConnection() {
        global $conn;

        $conn->close();
    }
?> 