<?php

namespace App\Controllers;

class Abonnements extends BaseController
{
	public function index()
	{
		return view('abonnements/index');
	}
    public function add()
	{
		return view('abonnements/add');
	}
	public function abort()
	{
		return view('abonnements/abort');
	}
}
