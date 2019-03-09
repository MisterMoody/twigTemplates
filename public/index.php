<?php

/* 'TWIG' API */
//Call to Autoloader -> Points to Composer 'autoload' File
require_once __DIR__ . '/../vendor/autoload.php';
//Load Templates from 'templates/' Directory PATH
$loader = new Twig_Loader_Filesystem(__DIR__ . '/../templates');
$twig = new Twig_Environment($loader);

$nav = [
  'home' => [
    'href' => '/',    //'../home'
    'caption' => 'Home',
    'status' => 'false'
  ],
  'contact' => [
    'href' => '../contact',
    'caption' => 'Contact',
    'status' => 'false'    
  ]
];

//Global Routing == Render 'Pages/Variables'
if (substr($_SERVER['REQUEST_URI'], 0, 8) == '/contact') {
    $nav['contact']['status'] = 'active';
    echo $twig->render('contact.twig', ['name' => 'ray', 'nav' => $nav]);
} else {
    $nav['home']['status'] = 'active';
    echo $twig->render('home.twig', ['name' => 'ray', 'nav' => $nav]);
}
