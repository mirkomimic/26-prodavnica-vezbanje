<?php


if (!isset($_SESSION['items']))
    $_SESSION['items'] = array(
        array(
            "id" => 1,
            "name" => 'Monitor Asus',
            "stock" => 5,
            "price" => 19000,
            "date" => "22-10-29",
        ),
        array(
            "id" => 2,
            "name" => 'Tastatura Logitech',
            "stock" => 3,
            "price" => 18500,
            "date" => "22-10-25",
        ),
        array(
            "id" => 3,
            "name" => 'Tastatura Razer',
            "stock" => 2,
            "price" => 20000,
            "date" => "22-10-31",
        ),
        array(
            "id" => 4,
            "name" => 'Monitor BenQ',
            "stock" => 6,
            "price" => 15000,
            "date" => "22-10-18"
        ),
    );
// print_r($_SESSION['items']);