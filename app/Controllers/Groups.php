<?php

namespace App\Controllers;

use App\Models\GroupModel;

class Groups extends BaseController
{
	public function ___construct()
	{
		$this->load->model('GroupModel');
	}
	public function index()
	{
		session_start();
		$_SESSION['titre'] = "ENP - Groupes";
		$group = new GroupModel();
		$list = $group->list();
		return view('Application/Groups/index',$list);
	}
	public function add()
	{
		$group = new GroupModel();
		$group->create($_REQUEST['name'],$_REQUEST['pole'],$_REQUEST['taille']);
	}
	public function edit()
	{
		
	}
	public function remove()
	{
		
	}
}