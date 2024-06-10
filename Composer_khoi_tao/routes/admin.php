<?php

use Quocpa44\ComposerKhoiTao\Controller\Admin\CategoryController;
use Quocpa44\ComposerKhoiTao\Controller\Admin\DashboardController;
use Quocpa44\ComposerKhoiTao\Controller\Admin\UserController;
use Quocpa44\ComposerKhoiTao\Controller\Admin\ProductController;

$router->before('GET|POST', '/admin/*.*', function () {
    if (!is_logged()) {

        header('location: ' . url('login'));
        exit();
    }

    if (!is_admin()) {
        header('location: ' . url());
        exit();
    }
});

$router->mount('/admin', function () use ($router) {
    $router->get('/', DashboardController::class . '@dashboard');

    $router->mount('/users', function () use ($router) {

        $router->get('/',          UserController::class . '@index');
        $router->get('/create',    UserController::class . '@create');
        $router->get('/{id}/show', UserController::class . '@show');
        $router->post('/store',    UserController::class . '@store');

        $router->get('/{id}/edit',    UserController::class . '@edit');
        $router->post('/{id}/update', UserController::class . '@update');
        $router->get('/{id}/delete',  UserController::class . '@delete');
    });
    // CRUD Products
    $router->mount('/products', function () use ($router) {

        $router->get('/',             ProductController::class . '@index');  // Danh sách
        $router->get('/create',       ProductController::class . '@create'); // Show form thêm mới
        $router->post('/store',       ProductController::class . '@store');  // Lưu mới vào DB
        $router->get('/{id}/show',    ProductController::class . '@show');   // Xem chi tiết
        $router->get('/{id}/edit',    ProductController::class . '@edit');   // Show form sửa
        $router->post('/{id}/update', ProductController::class . '@update'); // Lưu sửa vào DB
        $router->get('/{id}/delete',  ProductController::class . '@delete'); // Xóa
    });

    $router->mount('/categories', function () use ($router) {

        $router->get('/',             CategoryController::class . '@index');
        $router->get('/create',       CategoryController::class . '@create');
        $router->post('/store',       CategoryController::class . '@store');
        $router->get('/{id}/edit',    CategoryController::class . '@edit');
        $router->post('/{id}/update', CategoryController::class . '@update');
    });
});
