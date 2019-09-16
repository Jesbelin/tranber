<?php

namespace tranber;

use tranber\services\Conf;
use tranber\services\App;

include '../vendor/autoload.php';

session_start();

$data = [
	'title'    => 'Tranber',
	'site-url' => 'http://localhost/tranber/public/',
	'routes'   => [
		'/'       => 'tranber\controllers\Home',
		'sign-up' => 'tranber\controllers\SignUp',
		'sign-in' => 'tranber\controllers\SignIn',
		'sign-out' => 'tranber\controllers\SignOut',
		'update-profile' => 'tranber\controllers\SignUpdateProfile',
	],
	'database' => [
		'name' => 'tranber',
		'user' => 'root',
		'pass' => '',
		'host' => 'localhost',
	],
];

$conf = Conf::getInstance($data);
// $conf = new Conf($data);

$app = App::getInstance($conf);
// $app = new App($conf);
$app->run();