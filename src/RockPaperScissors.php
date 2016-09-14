<?php

    class Player
    {
        public $name;
        public $action;

        function __construct($name, $action)
        {
            $this->name = $name;
            $this->action = $action;
        }

        function save()
        {
            $_SESSION['collection'] = $this;
        }

        static function getPlayer(){
            return $_SESSION['collection'];
        }
    }

    class RockPaperScissors
    {
      public $player_1;
      public $player_2;
      public $win_condition;

        function __construct($player_1, $player_2)
        {
            $this->player_1 = $player_1;
            $this->player_2 = $player_2;
            $this->win_condition = 0;
        }

        function compareActions($player_1_action, $player_2_action)
        {
            if (($player_1_action == "rock") && ($player_2_action == "scissors") || ($player_1_action == "scissors") && ($player_2_action == "rock")) {
                if ($player_1_action == "rock") {
                    $this->win_condition = 1;
                } else {
                    $this->win_condition = 2;
                }
            }
            if (($player_1_action == "rock") && ($player_2_action == "paper") || ($player_1_action == "paper") && ($player_2_action == "rock")) {
                if ($player_1_action == "paper") {
                    $this->win_condition = 1;
                } else {
                    $this->win_condition = 2;
                }
            }
            if (($player_1_action == "paper") && ($player_2_action == "scissors") || ($player_1_action == "scissors") && ($player_2_action == "paper")) {
                if ($player_1_action == "scissors") {
                    $this->win_condition = 1;
                } else {
                    $this->win_condition = 2;
                }
            }
            if ($player_1_action == $player_2_action)  {
                    $this->win_condition = 3;
                }

        }

        static function deleteAll()
        {
            $_SESSION['collection'] = "";
        }

        static function getGame()
        {
            return $_SESSION['game'];
        }

        function save()
        {
            $_SESSION['game'] = $this;
        }

    }
?>
