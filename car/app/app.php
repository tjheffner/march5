<?php
    require_once __DIR__."/../vendor/autoload.php";
    require_once __DIR__."/../src/Car.php";

    session_start();
    if (empty($_SESSION['list_of_cars'])) {
        $_SESSION['list_of_cars'] = array();
    }
    //session info goes here

    $app = new Silex\Application();

    $app->register(new Silex\Provider\TwigServiceProvider(), array (
        'twig.path' => __DIR__.'/../views'
    ));
    //twig goes here

    $app->get("/", function() use ($app) {
        return $app['twig']->render('cars.twig', array('cars' => Car::getAll()));
    });

    $app->post("/car_results", function() use ($app) {
        $car = new Car($_POST['model'], $_POST['price'], $_POST['miles']);
        $car->save();

        return $app['twig']->render('car_results.twig', array('newcar' => $car));

    });

    $app->post("/search", function() use ($app) {
        $cars_matching_search = array();

        foreach (Car::getAll() as $car) {
            if ($car->worthBuying($_POST['max_price'])) {
                array_push($cars_matching_search, $car);
            }
        }
        return $app['twig']->render('search.twig', array('searchcars' => $cars_matching_search));
    });


    $app->post("/delete", function() use ($app) {
        return $app['twig']->render('delete.twig', array('cars' => Car::deleteAll()));
    });


    return $app;
?>
