<?php

namespace App\Controllers;

class Home extends BaseController
{
	public function index()
	{
		return view('accueil');
	}
	public function connect()
	{
		session_start();
		$_SESSION['titre'] = "ENP - Connect";
		return view('connect');
	}
}
