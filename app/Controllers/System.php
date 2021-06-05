<?php

namespace App\Controllers;

class System extends BaseController
{
	public function __construct()
	{
		$this->System = model('App\Models\SystemModel', false);
	}
	public function index()
	{
		
		$titre = "Information Systeme";
		$app = "System";
		$page = "index";
		$info = $this->System->info();

		return view('Application/System/index' , ['app' => $app, 'page' => $page, 'titre'=>$titre, 'info'=>$info]);
	}
	public function update()
	{
		$app = "System";
		$page = "update";
		$titre = "System Update";
		return view('Application/System/update' , ['app' => $app, 'page' => $page, 'titre'=>$titre]);
	}
	public function permissions()
	{
		$app = "System";
		$page = "permissions";
		$this->User = model('App\Models\UserModel', false);
		$this->Group = model('App\Models\GroupModel', false);
		$this->Role = model('App\Models\RoleModel', false);
		$this->Permission = model('App\Models\PermissionModel', false);
		$titre = "Gestion des Permissions";
		$role_list = $this->Role->list();
		$group_list = $this->Group->list();
		$permission_system = $this->Permission->list_system();
		$permission_other = $this->Permission->list_other();
		return view('Application/System/permissions' , ['app' => $app, 'page' => $page, 'titre'=>$titre, 'role_list'=>$role_list, 'group_list'=>$group_list, 'permission_system'=>$permission_system, 'permission_other'=>$permission_other,]);
	}
	public function add_permission()
	{
		$this->Permission = model('App\Models\PermissionModel', false);
		$permission = $_REQUEST['permission'];
		$permission_name = $_REQUEST['permission_name'];
		$permission_variant = $_REQUEST['permission_variant'];
		$permission_group = $_REQUEST['permission_group'];
		$permission_role = $_REQUEST['permission_statut'];
		$permission_info = $this->Permission->get_permission_info($permission);
		$permission_app = $permission_info['app'];
		$permission_page = $permission_info['page'];
		$this->Permission->create($permission_name, $permission_app, $permission_page, $permission_variant, $permission_group, $permission_role);
		return $this->permissions();
	}
	public function remove_permission()
	{
		$this->Permission = model('App\Models\PermissionModel', false);
		$permission = $_REQUEST['id'];
		$this->Permission->remove($permission);
		return $this->permissions();
	}
	// UNLOCK CORE (CETTE PROCEDURE DEBLOQUE L'INSTALLATION D'APPLICATION PROVENANT DE SOURCE INCONNUS)
	public function CORE_UNLOCK_PROCEDURE()
	{
		$app = "System";
		$page = "CORE_UNLOCK_PROCEDURE";
		$titre = "CORE/UNLOCK";
		return view('Application/System/CORE_UNLOCK_PROCEDURE' , ['titre'=>$titre]);
	}
	public function CORE_UNLOCK_EXECUTE()
	{
		$this->System->unlock();
		return $this->index();
	}
}