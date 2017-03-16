<?php
require_once '../vendor/autoload.php';
use Slim\App;

$app = new App();

require_once 'Routes/user.php';

$app->run();