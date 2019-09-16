<?php

namespace tranber\views;

use tranber\structures\View;

class SignUpdateProfile extends View
{
	public function __construct(string $login, string $email)
	{
		$this->setTemplate('HtmlHeader');
		$this->setTemplate('Navbar');
		$this->setTemplate('SignUpdateProfile', [
            'login' => $login,
            'email' => $email,
        ]);
		$this->setTemplate('HtmlFooter');
	}
}