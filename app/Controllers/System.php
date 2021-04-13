<?php

namespace App\Controllers;

class System extends BaseController
{
	public function index()
	{
		
		$titre = "Information Systeme";
		return view('Application/System/index' , ['titre'=>$titre]);
	}
	public function update()
	{
		
		$titre = "System Update";
		return view('Application/System/update' , ['titre'=>$titre]);
	}
	// UNLOCK CORE (CETTE PROCEDURE DEBLOQUE L'INSTALLATION D'APPLICATION PROVENANT DE SOURCE INCONNUS)
	public function CORE_UNLOCK_PROCEDURE()
	{
		
		$titre = "CORE/UNLOCK";
		return view('Application/System/CORE_UNLOCK_PROCEDURE' , ['titre'=>$titre]);
	}
    // Addons Scripts
    public function appstore()
	{
		
		$titre = "App Store";
		return view('Application/System/appstore' , ['titre'=>$titre]);
	}
	public function app_view()
	{
		
		$addon_name = "blank_addon.zip";
		$titre = "Addon Package : $addon_name";
		return view('Application/System/appstore_view' , ['titre'=>$titre]);
	}
    public function addon_install()
	{
		return view('Application/System/addons_install');
	}
}