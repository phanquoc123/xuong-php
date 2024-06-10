<?php

session_start();

$_SESSION['user'] ??= [];

require_once __DIR__ . '/vendor/autoload.php';

// DIR nó đạt được đường dẫn tuyệt đối
// không lo dấu chấm 
Dotenv\Dotenv::createImmutable(__DIR__)->load(); // tự động tên đến cái file .env 

require_once __DIR__ . '/routes/index.php';

// cái nào thực sự quan trọng mới để trong này eee