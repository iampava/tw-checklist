<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TW Checklist</title>
    <base href="/"/>
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Mono" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./style.css" />
</head>

<body>
    <?php
        session_start();
    ?>
    <header>
        <h1> 
            <span class="emoji">🚀</span> 
            TW Checklist 
            <span class="emoji">🚀</span>
            
        </h1>
    </header>
    <!-- <h1> Home </h1>
    <a href="php/actions/auth/logout.php"> Logout </a> -->
    <?php 
        class ToDo {
            private $task;
            private $topic;
        
            public function __construct($task, $topic) {
                $this->task = $task;
                $this->topic = $topic;
            }

            public function isFromTopic($topic) {
                if($this->topic == $topic) {
                    return TRUE;
                } else {
                    return FALSE;
                }
            }

            public function getTask() {
                return $this->task;
            }
        }

        $data = [];
        $topics = [];
        $todos = [];

        $csvFile = file('../files/test.csv');

        foreach ($csvFile as $key => $line) {
            $data[] = str_getcsv($line);
            $topics[$data[$key][0]] = TRUE;

            array_push($todos, new ToDo($data[$key][1], $data[$key][0]));
        }

        foreach($topics as $topicKey => $value) {
            echo '<section class="topic">';
            echo "<h1 class=\"topic__title\"> {$topicKey} </h1>";
            
            foreach($todos as $index => $todo) {
                if($todo->isFromTopic($topicKey)) {
                    echo "
                    <div class=\"topic__todo\">
                        <input type=\"checkbox\" id=\"todo{$index}\" >
                        <label class=\"todo-text\" for=\"todo{$index}\"> {$todo->getTask()}</label>
                    </div>
                    ";
                }
            }

            echo '</section>';
        }
    ?>
    <!-- <section class="topic">
        <h1 class="topic__title"> Logistics </h1>
        <div class="topic__todo">
            <input type="checkbox" id="todo1" >
            <label class="todo-text" for="todo1"> To do 1</label>
        </div>
        <div class="topic__todo">
            <input type="checkbox" id="todo1" >
            <label class="todo-text" for="todo1"> To do 1</label>
        </div>
    </section> -->
</body>

</html>