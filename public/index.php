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
  'about' => [
    'href' => '../about',
    'caption' => 'About',
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
    echo $twig->render('contact.twig', ['name' => 'mister moody', 'nav' => $nav, 'post' => $_POST]);
} elseif (substr($_SERVER['REQUEST_URI'], 0, 8) == '/about') {
    $nav['about']['status'] = 'active';
    echo $twig->render('about.twig', ['name' => 'mister moody', 'nav' => $nav]);
} else {
    $nav['home']['status'] = 'active';
    echo $twig->render('home.twig', ['name' => 'mister moody', 'nav' => $nav]);
}
