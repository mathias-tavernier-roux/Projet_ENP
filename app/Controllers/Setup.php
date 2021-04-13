<?php

namespace App\Controllers;

class Setup extends BaseController
{
	public function index()
	{
		session_start();
		$titre = "Programme d'Installation";
		return view('Application/Setup/index', ['titre'=>$titre]);
	}
	public function install()
	{
		
	}
}