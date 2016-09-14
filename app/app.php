<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";
    require_once __DIR__."/../src/Player.php";
    session_start();
    $_SESSION['collection'];
    $_SESSION['game'];


    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render("home.html.twig", array("game" => $_SESSION['game']));
    });

      $app->get("/player1", function() use ($app) {
          return $app['twig']->render("player_1.html.twig");
    });

    $app->post("/player2", function() use ($app) {

        $player_1 = new Player($_POST['player1name'], $_POST['player1action']);
        $player_1->save();
        return $app['twig']->render("player_2.html.twig");
    });

    $app->post("/results", function() use ($app) {
        $player_2 = new Player($_POST['player2name'], $_POST['player2action']);
        $player_1 = Player::getPlayer();
        $newGame = new RockPaperScissors($player_1, $player_2);
        $newGame->compareActions($newGame->player_1->action, $newGame->player_2->action);
        $newGame->save();
        return $app['twig']->render("home.html.twig", array("game" => $_SESSION['game']));
    });

    $app->get("/reset", function() use ($app) {
        Player::deleteAllCollection();
        RockPaperScissors::deleteAllGame();
        return $app['twig']->render("home.html.twig", array("game" => $_SESSION['game']));
    });

    $app->get("/player1_with_computer", function() use ($app) {
        return $app['twig']->render("player_1_with_computer.html.twig");
    });

    $app->post("/player1_vs_computer", function() use ($app) {
        $player_1 = new Player($_POST['player1name'], $_POST['player1action']);
        $player_1->save();

        return $app['twig']->render("home.html.twig");
    });

    return $app;
?>
