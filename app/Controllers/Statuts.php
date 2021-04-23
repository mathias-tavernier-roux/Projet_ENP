<?php

namespace App\Controllers;

class Statuts extends BaseController
{
	public function __construct()
	{
		$this->Role = model('App\Models\RoleModel', false);
		$this->Permission = model('App\Models\PermissionModel', false);
	}
	public function index()
	{
		$app = "Statuts";
		$page = "index";
		$titre = "Roles/Statut";
		$list = $this->Role->list();
		return view('Application/Statuts/index', ['app' => $app, 'page' => $page,'list'=>$list,'titre'=>$titre]);
	}
	public function add()
	{
		$this->Role->create($_REQUEST['name'],$_REQUEST['description']);
		return $this->index();
	}
	public function remove()
	{
		$this->Role->remove($_REQUEST['id']);
		$this->Permission->clear_role($_REQUEST['id']);
		return $this->index();
	}
}