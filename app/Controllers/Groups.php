<?php

namespace App\Controllers;

class Groups extends BaseController
{
	public function index()
	{
		return view('Application/Groups/index');
	}
	public function add()
	{
		return view('Application/Groups/add');
	}
	public function edit()
	{
		return view('Application/Groups/edit');
	}
	public function remove()
	{
		return view('Application/Groups/remove');
	}
}