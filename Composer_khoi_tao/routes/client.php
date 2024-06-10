<?php

use Quocpa44\ComposerKhoiTao\Controller\Client\AboutController;
use Quocpa44\ComposerKhoiTao\Controller\Client\CartController;
use Quocpa44\ComposerKhoiTao\Controller\Client\ContactController;
use Quocpa44\ComposerKhoiTao\Controller\Client\HomeController;
use Quocpa44\ComposerKhoiTao\Controller\Client\LoginController;
use Quocpa44\ComposerKhoiTao\Controller\Client\OrderController;
use Quocpa44\ComposerKhoiTao\Controller\Client\ProductController;

$router->get('/',                    HomeController::class       . '@index');

$router->get('/about',               AboutController::class      . '@index');
$router->get('/contact',             ContactController::class    . '@index');
$router->post('/contact/store',      ContactController::class    . '@store');

$router->get('/product',             ProductController::class    . '@index');
$router->get('/product/{id}',        ProductController::class    . '@detail');

$router->get('/product/{id}/cate',   ProductController::class    . '@productByCate');

$router->get('/login',               LoginController::class       . '@showFormlogin');
$router->post('/handle-login',       LoginController::class       . '@login');
$router->post('/logout',             LoginController::class       . '@logout');

$router->post('/cart/add',        CartController::class         . '@add');
$router->get('/cart/remove',      CartController::class         . '@remove');
$router->get('/cart/detail',      CartController::class         . '@detail');
$router->get('/cart/quantityDec', CartController::class       . '@quantityDec');
$router->get('/cart/quantityInc', CartController::class       . '@quantityInc');

$router->post('/order/checkout',   OrderController::class         . '@checkout');
