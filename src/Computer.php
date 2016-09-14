<?php
    class Computer
    {
        public $name = "RoboJammer";
        public $action;

        function chooseFistSlammer()
        {
            $slamJammer = rand(1, 3);
            if ($slamJammer == 1){
                $this->action = "rock";
            } elseif ($slamJammer == 2) {
                $this->action = "paper";
            } else {
                $this->action = "scissors";
            }
        }
    }
 ?>
