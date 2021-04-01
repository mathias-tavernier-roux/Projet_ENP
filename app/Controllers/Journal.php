<?php

namespace App\Controllers;

class Journal extends BaseController
{
	public function index()
	{
		return view('journal/index');
	}
	public function add()
	{
		return view('journal/add');
	}
}
