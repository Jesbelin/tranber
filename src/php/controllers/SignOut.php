<?php

namespace tranber\controllers;

use tranber\structures\Controller;
use tranber\views\SignOut as SignOutView;
use tranber\functions as fn;
use tranber\services\Client;

class SignOut extends Controller implements SignOutInterface
{
	public function run()
	{

					$client = Client::getInstance();
					$client->logOut();
		
					$conf    = $this->app->getConf();
					$data    = $conf->getData();
					$siteUrl = $data['site-url'];
					header('Location: '.$siteUrl);
				
	}
}