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

        // // $first_car = new Car("2014 Porsche 911", 114991, 7864);
        // // $second_car = new Car("2011 Ford F450", 55995, 14241);
        // // $third_car = new Car("2013 Lexus RX 350", 44700, 20000);
        // // $fourth_car = new Car("Mercedes Benz CLS550", 39900, 37979);
        //
        // $cars = array();
        //
        // $list_of_cars = array();
        // foreach ($cars as $car) {
        //     if ($car->worthBuying($_POST["price"])) {
        //         array_push($list_of_cars, $car);
        //     }
        // }
        return $app['twig']->render('car_results.twig', array('newcar' => $car));

    });

    $app->post("/delete", function() use ($app) {
        return $app['twig']->render('delete.twig', array('cars' => Car::deleteAll()));
    });

    return $app;
?>
