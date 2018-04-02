<?php 
    include "../config.php";

    // Create connection
    $conn = new mysqli($GLOBALS["servername"], $GLOBALS["username"], $GLOBALS["password"], $GLOBALS["db"]);

    class Topics {
        static function getTopics() {
            global $conn;
        
            $sql = "SELECT DISTINCT topic FROM todos";
            
            $result = $conn->query($sql);
            $topics = [];
            while($row = $result->fetch_assoc()) {
                $topics[] = $row["topic"];
            }

           return $topics;
        }

    }
?>