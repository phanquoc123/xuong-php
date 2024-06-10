<?php

use Quocpa44\ComposerKhoiTao\Controller\Client\AboutController;
use Quocpa44\ComposerKhoiTao\Controller\Client\CartController;
use Quocpa44\ComposerKhoiTao\Controller\Client\ContactController;
use Quocpa44\ComposerKhoiTao\Controller\Client\HomeController;
use Quocpa44\ComposerKhoiTao\Controller\Client\LoginController;
use Quocpa44\ComposerKhoiTao\Controller\Client\ProductController;

$router->get('/',               HomeController::class       . '@index');

$router->get('/about',               AboutController::class      . '@index');
$router->get('/contact',             ContactController::class    . '@index');
$router->post('/contact/store',      ContactController::class    . '@store');
$router->get('/product',             ProductController::class    . '@index');
$router->get('/product/{id}',        ProductController::class    . '@detail');
// $router->get('/product/cate',        ProductController::class    . '@productByCate');
    
$router->get('/login',          LoginController::class          . '@showFormlogin');
$router->post('/handle-login',  LoginController::class          . '@login');
$router->post('/logout',        LoginController::class          . '@logout');

<<<<<<< HEAD
$router->get('/product',        ProductController::class    . '@index');
$router->get('/product/{id}',   ProductController::class    . '@detail');

$router->get('/login',          LoginController::class       . '@showFormlogin');
$router->post('/handle-login',  LoginController::class       . '@login');
$router->get('/logout',         LoginController::class       . '@logout');

$router->post('/cart/add',      CartController::class         . '@add');
$router->get('/cart/remove',    CartController::class         . '@remove');
$router->get('/cart/detail',    CartController::class         . '@detail');
=======
$router->mount('/cart',function () use ($router) {
        $router->get('/add',         CartController::class         . '@add');
        $router->get('/quantityDec', CartController::class         . '@quantityDec');
        $router->get('/remove',      CartController::class         . '@remove');
        $router->get('/quantityInc', CartController::class         . '@quantityInc');
        $router->get('/detail',      CartController::class         . '@detail');
    }
);
>>>>>>> e895dc180aa518567bc7642a0e022e219536d003
