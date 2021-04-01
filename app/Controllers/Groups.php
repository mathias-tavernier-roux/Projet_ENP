<?php

namespace App\Controllers;

class Groups extends BaseController
{
	public function index()
	{
		return view('groups/index');
	}
	public function add()
	{
		return view('groups/add');
	}
	public function edit()
	{
		return view('groups/edit');
	}
	public function remove()
	{
		return view('groups/remove');
	}
}