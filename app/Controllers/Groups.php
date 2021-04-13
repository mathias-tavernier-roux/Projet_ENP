<?php

namespace App\Controllers;

class Groups extends BaseController
{
	public function __construct()
	{
		$this->Group = model('App\Models\GroupModel', false);
	}
	public function index()
	{
		$titre = "Groupes";
		$list = $this->Group->list();
		return view('Application/Groups/index', ['list'=>$list,'titre'=>$titre]);
	}
	public function add()
	{
		$this->Group->create($_REQUEST['name'],$_REQUEST['pole'],$_REQUEST['taille']);
		return $this->index();
	}
	public function remove()
	{
		$this->Group->remove($_REQUEST['id']);
		return $this->index();
	}
}