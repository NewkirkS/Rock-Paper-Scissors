<?php
    require_once __DIR__. "/../src/RockPaperScissors.php";

    class RockPaperScissorsTest extends PHPUnit_Framework_TestCase
    {
        function test_rock_scissors()
        {
            // Arrange
            $test_Player1 = new Player("Bob", "rock");
            $test_Player2 = new Player("Jim", "scissors");
            $test_RockPaperScissors = new RockPaperScissors($test_Player1, $test_Player2);

            // Act
            $test_RockPaperScissors->compareActions($test_Player1->action, $test_Player2->action);
            $result = $test_RockPaperScissors->win_condition;
            // Assert
            $this->assertEquals(1, $result);
        }

        // function test_rock_paper()
        // {
        //     // Arrange
        //     $test_RockPaperScissors = new RockPaperScissors;
        //     $first_input = "rock";
        //     $second_input = "paper";
        //
        //     // Act
        //     $result = $test_RockPaperScissors->playGame($first_input, $second_input);
        //
        //     // Assert
        //     $this->assertEquals("Player 1", $result);
        // }
        //
        // function test_paper_scissors()
        // {
        //     // Arrange
        //     $test_RockPaperScissors = new RockPaperScissors;
        //     $first_input = "paper";
        //     $second_input = "scissors";
        //
        //     // Act
        //     $result = $test_RockPaperScissors->playGame($first_input, $second_input);
        //
        //     // Assert
        //     $this->assertEquals("Player 1", $result);
        // }
        //
        // function test_tie()
        // {
        //     // Arrange
        //     $test_RockPaperScissors = new RockPaperScissors;
        //     $first_input = "rock";
        //     $second_input = "rock";
        //
        //     // Act
        //     $result = $test_RockPaperScissors->playGame($first_input, $second_input);
        //
        //     // Assert
        //     $this->assertEquals("It's a Tie", $result);
        // }
    }



?>
