<?php

namespace App\Controllers;

class Setup extends BaseController
{
	public function index()
	{
		$titre = "Programme d'Installation";
		return view('Application/Setup/index', ['titre'=>$titre]);
	}
	public function start_install()
	{
		$install = $this->install($_REQUEST['login'],$_REQUEST['password'],$_REQUEST['big_name'],$_REQUEST['mini_name']);
		if ($install == "SUCCESS")
		{
			$titre = "Installation Terminé";
			return view('Application/Setup/success' , ['titre'=>$titre]);
		}
		else
		{
			$titre = "Echec de L'Installation";
			return view('Application/Setup/failed' , ['titre'=>$titre]);
		}
	}
	public function install($login,$password,$big_name,$little_name)
	{
		command('migrate -g system');
		command('migrate -g default');
		$db = db_connect();
		$builder = $db->table('group');
		$data = [
            'name' => "SYSTEM",
            'pole'    => "SYSTEM",
            'taille'    => 1,
        ];
		$builder->insert($data);
		$builder = $db->table('role');
		$data = [
            'name' => "ADMIN",
            'description'    => "Administrateur Systeme",
        ];
		$builder->insert($data);
		$builder = $db->table('user');
		$mdpc = password_hash($password, PASSWORD_BCRYPT);
		$data = [
            'first_name' => "ADMIN",
            'last_name' => "ADMIN",
            'birth'    => "00/00/00",
            'login'    => $login,
            'password' => $mdpc,
            'group_id' => 1,
            'role_id'  => 1,
            'group_name' => "SYSTEM",
            'role_name'  => "ADMIN",
        ];
		$builder->insert($data);
		$builder = $db->table('system');	
		$data = [
            'complete_name' => $big_name,
            'little_name'    => $little_name,
        ];
		$builder->insert($data);
		return "SUCCESS";
	}
}