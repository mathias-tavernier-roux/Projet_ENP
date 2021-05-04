<?php

namespace App\Controllers;

class Appstore extends BaseController
{
	public function __construct()
	{
		$this->Appstore = model('App\Models\AppstoreModel', false);
	}
    public function index()
	{
		$app = "Appstore";
		$page = "index";
		$titre = "App Store";
		$list_official = $this->Appstore->list_official();
		$list_homebrew = $this->Appstore->list_homebrew();
		return view('Application/Appstore/index' , ['app' => $app, 'page' => $page, 'titre'=>$titre, 'list_official'=>$list_official, 'list_homebrew'=>$list_homebrew]);
	}
	public function app_info()
	{
		$app = "Appstore";
		$page = "app_view";
		$addon_name = "blank_addon.zip";
		$titre = "Addon Package : $addon_name";
		return view('Application/Appstore/app_info' , ['app' => $app, 'page' => $page, 'titre'=>$titre]);
	}
    public function app_install()
	{
		return view('Application/System/addons_install');
	}
}