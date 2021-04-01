<?php

namespace App\Controllers;

class System extends BaseController
{
	public function index()
	{
		return view('System/index');
	}
    // Users System Permissions
    public function sysusers_list()
	{
		return view('System/addons_list');
	}
	public function sysusers_view()
	{
		return view('System/addons_view');
	}
    public function sysusers_set()
	{
		return view('System/addons_set');
	}
    // Addons Scripts
    public function addons_list()
	{
		return view('System/addons_list');
	}
	public function addon_view()
	{
		return view('System/addons_view');
	}
    public function addon_install()
	{
		return view('System/addons_install');
	}
}