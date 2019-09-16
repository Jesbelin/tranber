<?php

namespace tranber\views;

use tranber\structures\View;

class Header extends View
{
	public function __construct()
	{
		$this->setTemplate('Header');
	}
}