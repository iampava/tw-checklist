<!DOCTYPE html>
<html lang="en">

<?php 
    include_once $_SERVER['DOCUMENT_ROOT'] . "/app/views/components/general.components.php";

    echo Components::createHead();
?>

<body class="home-page">
    <?php 
        echo Components::createHeader(TRUE);
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
                        <input 
                            data-topic=\"{$topic}\" 
                            data-todo=\"{$todo->getTask()}\" 
                            type=\"checkbox\" 
                            id=\"todo{$index}\"
                            ". ($todo -> isDone() ? ' checked ' : '') . "
                            >
                        <label class=\"todo-text\" for=\"todo{$index}\"> {$todo->getTask()}</label>
                    </div>
                    ";
                }
            }

            echo '</section>';
        }
    ?>
    </div>
    <div id="notification"> </div>
    <script src="/public/app.js" type="text/javascript"></script>
</body>

</html>