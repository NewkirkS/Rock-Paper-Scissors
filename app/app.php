<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/RockPaperScissors.php";

    session_start();
    if (empty($_SESSION['collection'])) {
        $_SESSION['collection'] = "";
    }

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
        return $app['twig']->render("home.html.twig", array("game" => $_SESSION['collection']));
    });

      $app->get("/player1", function() use ($app) {
          return $app['twig']->render("player_1.html.twig");
    });

    $app->post("/player2", function() use ($app) {
        $player_1 = new Player($_POST['player1name'], $_POST['player1action']);
        $_SESSION['collection'] = $player_1;
        return $app['twig']->render("player_2.html.twig");
    });

    $app->post("/results", function() use ($app) {
        $player_2 = new Player($_POST['player2name'], $_POST['player2action']);
        $newGame = new RockPaperScissors($_SESSION['collection'], $player2);
        Player::deleteAll();
        $newGame->compareActions($newGame->player_1->action, $newGame->player_2->action);
        $_SESSION['collection'] = $newGame;
        return $app['twig']->render("home.html.twig", array("game" => $_SESSION['collection']));
    });




    return $app;
?>
