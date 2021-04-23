<?php

namespace App\Controllers;

class Users extends BaseController
{
	protected $session;
	public function __construct()
	{
		$this->User = model('App\Models\UserModel', false);
		$this->Group = model('App\Models\GroupModel', false);
		$this->Role = model('App\Models\RoleModel', false);
		$this->Permission = model('App\Models\PermissionModel', false);
		$this->session = \Config\Services::session();
		$this->session->start();
	}
	public function index()
	{
		$titre = "Mon Compte";
		return view('Application/Users/index', ['titre' => $titre,]);
	}
	public function login()
	{
		return view('Application/connect');
	}
	public function connect()
	{
		$login = $_REQUEST['login'];
		$password = $_REQUEST['password'];
		$user = $this->User->connect($login);
		if ($user != false) {
			if (password_verify($password, $user['password'])) {
				$session = session();
				$session->set(["id" => $user['id']]);
				return $this->index();
			} else {
				$auth_error = "ERROR_PASSWORD";
				return view('Application/connect', ['auth_error' => $auth_error]);
			}
		} else {
			$auth_error = "ERROR_LOGIN";
			return view('Application/connect', ['auth_error' => $auth_error]);
		}
	}
	public function disconnect()
	{
		$session = session();
		$session->destroy();
		$auth_error = "DISCONNECTED";
		return view('Application/connect', ['auth_error' => $auth_error]);
	}
	public function list()
	{
		$titre = "Liste des Utilisateurs";
		$app = "Users";
		$page = "list";
		$session = session();
		$user = $this->User->info($session->id);	
		$group = $user['group_id'];
		$role = $user['role_id'];
		if ($group == 1 && $role == 1)
		{
    	$group = "SYSTEM";
    	$role = "ADMIN"; 
		}
		$permission = $this->Permission->get_permission_variant($group, $role);
		$user_list = $this->User->list();
		$group_list = $this->Group->list_limited($permission['variant']);
		$role_list = $this->Role->list();
		return view('Application/Users/list', ['app' => $app, 'page' => $page, 'user_list' => $user_list, 'group_list' => $group_list, 'role_list' => $role_list, 'titre' => $titre]);
	}
	public function add()
	{
		$group_info = $this->Group->find($_REQUEST['group_id']);
		$role_info = $this->Role->find($_REQUEST['role_id']);
		$group_name = $group_info['name'];
		$role_name = $role_info['name'];
		$mdp = $_REQUEST['password'];
		$mdpc = password_hash($mdp, PASSWORD_BCRYPT);
		$this->User->create($_REQUEST['first_name'], $_REQUEST['last_name'], $_REQUEST['group_id'], $_REQUEST['role_id'], $group_name, $role_name, $_REQUEST['birth'], $_REQUEST['login'], $mdpc);
		return $this->list();
	}
	public function edit()
	{
		$group_info = $this->Group->find($_REQUEST['group_id']);
		$role_info = $this->Role->find($_REQUEST['role_id']);
		$group_name = $group_info['name'];
		$role_name = $role_info['name'];
		$this->User->edit($_REQUEST['id'], $_REQUEST['group_id'], $_REQUEST['role_id'], $group_name, $role_name);
		return $this->list();
	}
	public function edit_auth()
	{
		session_start();
		$password = $_REQUEST['password'];
		$user = $this->User->connect($_SESSION['login']);
		if (password_verify($password, $user['password'])) {
			$mdpc = password_hash($_REQUEST['new_password'], PASSWORD_BCRYPT);
			$this->User->edit_auth($_SESSION['id'], $mdpc);
			return $this->disconnect();
		} else {
			return $this->index();
		}
	}
	public function reset()
	{
		$titre = "Mot de Passe Perdu";
		return view('Application/Users/reset', ['titre' => $titre]);
	}
	public function delete()
	{
		$this->User->remove($_REQUEST['id']);
		return $this->list();
	}
}
