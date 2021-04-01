<?php

namespace App\Controllers;

class Users extends BaseController
{
	public function index()
	{
		return view('users/index');
	}
	public function add()
	{
		return view('users/add');
	}
	public function edit()
	{
		return view('users/edit');
	}
	public function reset()
	{
		return view('users/reset');
	}
	public function delete()
	{
		return view('users/delete');
	}
}
