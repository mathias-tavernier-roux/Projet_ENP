<?php

namespace App\Controllers;

class Setup extends BaseController
{
	public function index()
	{
		session_start();
		$_SESSION['titre'] = "ENP - Install Wizard";
		return view('Application/Setup/index');
	}
	public function repair()
	{
		session_start();
		$_SESSION['titre'] = "ENP - Install Wizard";
		return view('Application/Setup/repair');
	}
}