<?php

namespace App\Controllers;

class Statuts extends BaseController
{
	public function index()
	{
		return view('Application/Statuts/index');
	}
	public function add()
	{
		return view('Application/Statuts/add');
	}
	public function edit()
	{
		return view('Application/Statuts/edit');
	}
	public function remove()
	{
		return view('Application/Statuts/remove');
	}
}