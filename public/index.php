<?php

session_start();

require_once __DIR__ . '/../app/Router.php';
require_once __DIR__ . '/../app/Controller/HomeController.php';
require_once __DIR__ . '/../app/Controller/ProductController.php';
require_once __DIR__ . '/../app/Controller/CartController.php';

$router = new Router();

/* ROUTES */
$router->get('/', [HomeController::class, 'index']);
$router->get('/produits', [ProductController::class, 'index']);
$router->get('/produit/{id}', [ProductController::class, 'show']);

/* DISPATCH */
$uri = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

$router->dispatch($uri, $method);


//nouvelle  routes pour cartcontroller
$router->get('/panier', [CartController::class, 'index']);
$router->post('/panier/ajouter', [CartController::class, 'add']);
$router->post('/panier/supprimer', [CartController::class, 'remove']);
$router->post('/panier/modifier', [CartController::class, 'update']);
