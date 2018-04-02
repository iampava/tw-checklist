<?php 
    class ToDo {
        private $task;
        private $topic;
        private $done;

        public function __construct($task, $topic, $done) {
            $this-> task = $task;
            $this-> topic = $topic;
            $this -> done = $done;
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

        public function isDone(){
            return $this -> done;
        }
    }
?>