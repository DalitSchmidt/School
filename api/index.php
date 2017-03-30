<?php
require_once '../vendor/autoload.php';
use Slim\App;

$app = new App();

require_once 'Routes/user.php';
require_once 'Routes/course.php';

$app->run();