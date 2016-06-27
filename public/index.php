<?php
require dirname(__DIR__) . '/vendor/autoload.php';
ini_set('display_errors', 1);
(new Blog\Application())->start();
