<?php

namespace tranber\controllers;

use tranber\services\Client;
use tranber\structures\Controller;
use tranber\views\SignIn as SignInView;
use tranber\functions as fn;

class SignIn extends Controller implements SignInInterface
{
	public function run()
	{
		$errors   = [];

		if ($model = $this->app->getModel('Users'))
		{

			$login    = $_POST['login']    ?? null;
			$password = $_POST['password'] ?? null;
			//$email    = $_POST['email']    ?? null;

			//if ($login && $password && $email)

			if ($login && $password){
			$user     = $model->logIn($login, $password);
				if ($user){

					// connecter l'utilisateur (sauvegarder en session)
					//$_SESSION['logged'] = true;
					//$_SESSION['user']   =$user;

					$client = Client::getInstance();
					$client->logIn($user);


					// puis rediriger :
					$conf    = $this->app->getConf();
					$data    = $conf->getData();
					$siteUrl = $data['site-url'];
					header('Location: '.$siteUrl);
					
				}
				else {
					//affiche une erreur
					echo fn\htmlError('Identifiant et/ou mot de passe invalide');
				}
			}
		}	

		$view = new SignInView;
		$view->stringify();
	}
}