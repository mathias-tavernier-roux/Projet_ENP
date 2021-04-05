<?php

namespace App\Controllers;

class System extends BaseController
{
	public function index()
	{
		session_start();
		$_SESSION['titre'] = "ENP - Information Systeme";
		return view('Application/System/index');
	}
	public function update()
	{
		session_start();
		$_SESSION['titre'] = "ENP - System Update";
		return view('Application/System/update');
	}
	// UNLOCK CORE (CETTE PROCEDURE DEBLOQUE L'INSTALLATION D'APPLICATION PROVENANT DE SOURCE INCONNUS)
	public function CORE_UNLOCK_PROCEDURE()
	{
		session_start();
		$_SESSION['titre'] = "ENP - CORE/UNLOCK";
		return view('Application/System/CORE_UNLOCK_PROCEDURE');
	}
    // Addons Scripts
    public function appstore()
	{
		session_start();
		$_SESSION['titre'] = "ENP - App Store";
		return view('Application/System/appstore');
	}
	public function app_view()
	{
		session_start();
		$addon_name = "blank_addon.zip";
		$_SESSION['titre'] = "ENP - Addon Package : $addon_name";
		return view('Application/System/appstore_view');
	}
    public function addon_install()
	{
		return view('Application/System/addons_install');
	}
}