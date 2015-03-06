<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/cd.php";

    $app = new Silex\Application();

    //twig goes here
    $app->register(new Silex\Provider\TwigServiceProvider(), array('twig.path' => __DIR__.'/../views'));

    $app->get("/", function() use ($app) {
        return $app['twig']->render('main.twig');
    });

    $app->get("/new_cd", function() use($app) {
        return $app['twig']->render('new_cd.twig');
    });

    return $app;
?>
