<?php

namespace App\Controllers;

class Groups extends BaseController
{
	public function __construct()
	{
		$this->Group = model('App\Models\GroupModel', false);
		$this->Permission = model('App\Models\PermissionModel', false);
		$this->User = model('App\Models\UserModel', false);
	}
	public function index()
	{
		$app = "Groups";
		$page = "index";
		$titre = "Groupes";
		$list = $this->Group->list();
		return view('Application/Groups/index', ['app' => $app, 'page' => $page,'list'=>$list,'titre'=>$titre]);
	}
	public function add()
	{
		if ($_REQUEST['name'] == NULL)
		{
			$name = $_REQUEST['link'];
		}
		else
		{
			$name = $_REQUEST['name'];
		}
		$this->Group->create($name,$_REQUEST['pole'],$_REQUEST['taille'],$_REQUEST['link']);
		return $this->index();
	}
	public function remove()
	{
		$this->Group->remove($_REQUEST['id']);
		$this->Permission->clear_group($_REQUEST['id']);
		return $this->index();
	}
}