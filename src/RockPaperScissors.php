<?php

    class Player
    {
        private $name;
        private $action;

        function __construct($name, $action)
        {
            $this->name = $name;
            $this->action = $action;
        }
    }

    class RockPaperScissors
    {
      private $player_1;
      private $player_2;
      private $win_condition;

        function __construct($player_1, $player_2, $win_condition = 0)
        {
            $this->player_1 = $player_1;
            $this->player_2 = $player_2;
            $this->win_condition;
        }

        function compareActions($player_1_action, $player_2_action)
        {

        }

    }
?>
