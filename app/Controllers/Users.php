<?php

namespace App\Controllers;

class Users extends BaseController
{
	public function index()
	{
		return view('Application/Users/index');
	}
	public function connect()
	{
		return view('Application/Users/connect');
	}
	public function disconnect()
	{
		return view('Application/Users/disconnect');
	}
	public function list()
	{
		return view('Application/Users/list');
	}
	public function add()
	{
		return view('Application/Users/add');
	}
	public function edit()
	{
		return view('Application/Users/edit');
	}
	public function reset()
	{
		return view('Application/Users/reset');
	}
	public function delete()
	{
		return view('Application/Users/delete');
	}
}
