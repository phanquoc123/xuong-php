<?php
session_start();
require_once __DIR__ .  './vendor/autoload.php';
// echo __DIR__;



Dotenv\Dotenv::createImmutable(__DIR__)->load();
require_once __DIR__ . '/routes/index.php';


// ábadsasd

?>