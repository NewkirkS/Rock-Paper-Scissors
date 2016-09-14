<?php
    date_default_timezone_set('America/Los_Angeles');
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Template.php";

    session_start();
    if (empty($_SESSION['collection'])) {
        $_SESSION['collection'] = array();
    }

    use Symfony\Component\Debug\Debug;
    Debug::enable();

    $app = new Silex\Application();

    $app['debug'] = true;

    $app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => __DIR__.'/../views'
    ));

    $app->get("/", function() use ($app) {
      return $app['twig']->render("home.html.twig");
    });


    $app->get("/test", function() use ($app) {
      return 'test variables here';
    });

    return $app;
?>
