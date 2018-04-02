<!DOCTYPE html>
<html lang="en">

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/views/components/general.components.php";

    echo Components::createHead();
?>

<body class="home-page">
    <?php 
        echo Components::createHeader($loggedUser -> isLogged());
    ?>
    <div id="todos">
        <?php 
    
        foreach($topics as $topic) {
            echo '<section class="topic">';
            echo "<h1 class=\"topic__title\"> {$topic} </h1>";
            
            foreach($todos as $index => $todo) {
                if($todo->isFromTopic($topic)) {
                    echo "
                    <div class=\"topic__todo\">
                        <label class=\"todo-text\" for=\"todo{$index}\"> {$todo->getTask()}</label>
                    </div>
                    ";
                }
            }

            echo '</section>';
        }
    ?>
    </div>
</body>

</html>