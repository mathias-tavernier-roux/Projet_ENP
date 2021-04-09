<?php

namespace App\Controllers;

class Users extends BaseController
{
	public function index()
	{
		session_start();
		$_SESSION['titre'] = "ENP - CORE/UNLOCK";
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
		session_start();
		$_SESSION['titre'] = "ENP - Liste des Utilisateurs";
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
