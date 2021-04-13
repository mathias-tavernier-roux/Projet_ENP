<?php

namespace App\Controllers;

class Users extends BaseController
{
	public function __construct()
	{
		$this->User = model('App\Models\UserModel', false);
		$this->Group = model('App\Models\GroupModel', false);
		$this->Role = model('App\Models\RoleModel', false);
	}
	public function index()
	{
		session_start();
		$titre = "Mon Compte";
		return view('Application/Users/index', ['titre'=>$titre]);
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
		$titre = "Liste des Utilisateurs";
		$user_list = $this->User->list();
		$group_list = $this->Group->list();
		$role_list = $this->Role->list();
		return view('Application/Users/list', ['user_list'=>$user_list,'group_list'=>$group_list,'role_list'=>$role_list,'titre'=>$titre]);
	}
	public function add()
	{
		$group_info = $this->Group->find($_REQUEST['group_id']);
		$role_info = $this->Role->find($_REQUEST['role_id']);
		$group_name = $group_info['name'];
		$role_name = $role_info['name'];
		$this->User->create($_REQUEST['first_name'],$_REQUEST['last_name'],$_REQUEST['group_id'],$_REQUEST['role_id'],$group_name,$role_name,$_REQUEST['birth'],$_REQUEST['login'],$_REQUEST['password']);
		return $this->list();
	}
	public function edit()
	{
		$group_info = $this->Group->find($_REQUEST['group_id']);
		$role_info = $this->Role->find($_REQUEST['role_id']);
		$group_name = $group_info['name'];
		$role_name = $role_info['name'];
		$this->User->edit($_REQUEST['id'],$_REQUEST['group_id'],$_REQUEST['role_id'],$group_name,$role_name);
		return $this->list();
	}
	public function reset()
	{
		$titre = "Mot de Passe Perdu";
		return view('Application/Users/reset', ['titre'=>$titre]);
	}
	public function delete()
	{
		$this->User->remove($_REQUEST['id']);
		return $this->list();
	}
}
