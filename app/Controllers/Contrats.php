<?php

namespace App\Controllers;

class Contrats extends BaseController
{
	public function index()
	{
		return view('contrats/index');
	}
	public function add()
	{
		return view('contrats/add');
	}
	public function abort()
	{
		return view('contrats/abort');
	}
}
