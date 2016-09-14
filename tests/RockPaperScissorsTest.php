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

        function test_rock_paper()
        {
            // Arrange
            $test_Player1 = new Player("Bob", "rock");
            $test_Player2 = new Player("Jim", "paper");
            $test_RockPaperScissors = new RockPaperScissors($test_Player1, $test_Player2);

            // Act
            $test_RockPaperScissors->compareActions($test_Player1->action, $test_Player2->action);
            $result = $test_RockPaperScissors->win_condition;
            // Assert
            $this->assertEquals(2, $result);
        }

        function test_paper_scissors()
        {
            // Arrange
            $test_Player1 = new Player("Bob", "paper");
            $test_Player2 = new Player("Jim", "scissors");
            $test_RockPaperScissors = new RockPaperScissors($test_Player1, $test_Player2);

            // Act
            $test_RockPaperScissors->compareActions($test_Player1->action, $test_Player2->action);
            $result = $test_RockPaperScissors->win_condition;
            // Assert
            $this->assertEquals(2, $result);
        }

        function test_tie()
        {
            // Arrange
            $test_Player1 = new Player("Bob", "paper");
            $test_Player2 = new Player("Jim", "paper");
            $test_RockPaperScissors = new RockPaperScissors($test_Player1, $test_Player2);

            // Act
            $test_RockPaperScissors->compareActions($test_Player1->action, $test_Player2->action);
            $result = $test_RockPaperScissors->win_condition;
            // Assert
            $this->assertEquals(3, $result);
        }
    }
?>
