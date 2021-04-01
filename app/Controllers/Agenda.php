<?php

namespace App\Controllers;

class Agenda extends BaseController
{
	public function index()
	{
		return view('agenda/index');
	}
	public function add()
	{
		return view('agenda/add');
	}
	public function edit()
	{
		return view('agenda/edit');
	}
	public function abort()
	{
		return view('agenda/abort');
	}
}
