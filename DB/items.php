<?php


if (!isset($_SESSION['items']))
    $_SESSION['items'] = array(
        array(
            "id" => '1',
            "name" => 'Monitor Asus',
            "stock" => '5',
            "price" => '1900',
            "date" => date("d.m.y", strtotime("22-10-28")),
        ),
        array(
            "id" => '2',
            "name" => 'Tastatura Logitech',
            "stock" => '3',
            "price" => '1850',
            "date" => date("d.m.y", strtotime("22-10-25")),
        ),
        array(
            "id" => '3',
            "name" => 'Tastatura Razer',
            "stock" => '2',
            "price" => '2000',
            "date" => date("d.m.y", strtotime("22-10-31")),
        ),
        array(
            "id" => '4',
            "name" => 'Monitor BenQ',
            "stock" => '6',
            "price" => '1500',
            "date" => date("d.m.y", strtotime("22-10-19")),
        ),
    );
// print_r($_SESSION['items']);