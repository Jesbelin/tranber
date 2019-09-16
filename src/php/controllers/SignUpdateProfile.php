<?php

namespace tranber\controllers;

use tranber\structures\Controller;
use tranber\views\SignUpdateProfile as SignUpdateProfileView;
use tranber\functions as fn;
use tranber\services\Client;

class SignUpdateProfile extends Controller implements SignUpdateProfileInterface
{
    public function run()
    {
        $client = Client::getInstance();
        $user = $client->getUser();
            $view = new SignUpdateProfileView($user['login'], $user['email']);
            $view->stringify();
    }
}

/*class SignUpdateProfile extends Controller implements SignUpdateProfileInterface
{
	public function run()
	{

					$view = new SignUpdateProfileView;
					$view->stringify();
					$login    = $_POST['login']    ?? null;
					$password = $_POST['password'] ?? null;
					echo $login;
					echo $password;
	}
}*/