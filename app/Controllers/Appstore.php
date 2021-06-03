<?php

namespace App\Controllers;

class Appstore extends BaseController
{
	public function __construct()
	{
		$this->Appstore = model('App\Models\AppstoreModel', false);
		$this->AppPage = model('App\Models\AppPageModel', false);
	}
	public function index()
	{
		$app = "Appstore";
		$page = "index";
		$titre = "App Store";
		$list_official = $this->Appstore->list_official();
		$list_homebrew = $this->Appstore->list_homebrew();
		return view('Application/Appstore/index', ['app' => $app, 'page' => $page, 'titre' => $titre, 'list_official' => $list_official, 'list_homebrew' => $list_homebrew]);
	}

	public function install()
	{
		$app_name = $_REQUEST['app_name'];
		$zip_name = "$app_name.zip";
		$version = $_REQUEST['version'];
		$type = $_REQUEST['type'];
		$zip = new \ZipArchive;
		$root = constant("ROOTPATH");
		if ($type == "OFFICIAL")
		{
		$dir = "public/Appstore/Official";
		}
		if ($type == "HOMEBREW")
		{
		$dir = "public/Appstore/Homebrew";
		}
		$dir = "$root$dir";
		$res = $zip->open("$dir/$zip_name");
		if ($res === TRUE) {

			// Unzip path
			$path = "$root/";

			// Extract file
			$zip->extractTo($path);
			$zip->close();
			command('migrate -g addon');
			$this->Appstore->install($app_name, $zip_name, $version, $type);
			return $this->index();
		}
	}
	public function remove()
	{
		$root = constant("ROOTPATH");

		$database = "app/Database/Migrations/Addons/";
		$views = "app/Views/Addons/";
		$controllers = "app/Controllers/Addon_";
		$models = "app/Models/Addon_";
		$app_id = $_REQUEST['id'];
		$app_name = $_REQUEST['app_name'];
		$app_name2 = strtolower($app_name);
		$db1 = \Config\Database::connect('addon');
		$db1->query("DROP TABLE `$app_name2`");
		$db2 = \Config\Database::connect('default');
		$builder = $db2->table('permission');
		$builder->delete(['app' => $app_name]);
		$builder = $db2->table('apppage');
		$builder->delete(['app_name' => $app_name]);
		$builder = $db2->table('migrations');
		$migration = "App\Database\Migrations";
		$builder->delete(['class' => "$migration\\$app_name"]);
		$builder->delete(['class' => "$migration\\$app_name2"]);
		array_map('unlink', glob("$root$database$app_name/*.*"));
		rmdir("$root$database$app_name");
		array_map('unlink', glob("$root$views$app_name/*.*"));
		rmdir("$root$views$app_name");
		unlink("$root$controllers$app_name.php");
		unlink("$root$models$app_name.php");
		$this->Appstore->remove($app_id);
		$this->AppPage->remove($app_name);
		return $this->index();
	}
	public function update()
	{
		$root = constant("ROOTPATH");

		$database = "app/Database/Migrations/Addons/";
		$views = "app/Views/Addons/";
		$controllers = "app/Controllers/Addon_";
		$models = "app/Models/Addon_";
		$app_id = $_REQUEST['id'];
		$app_name = $_REQUEST['app_name'];
		$app_name2 = strtolower($app_name);
		$db1 = \Config\Database::connect('addon');
		$db1->query("DROP TABLE `$app_name2`");
		$db2 = \Config\Database::connect('default');
		$builder = $db2->table('permission');
		$builder->delete(['app' => $app_name]);
		$builder = $db2->table('apppage');
		$builder->delete(['app_name' => $app_name]);
		$builder = $db2->table('migrations');
		$migration = "App\Database\Migrations";
		$builder->delete(['class' => "$migration\\$app_name"]);
		$builder->delete(['class' => "$migration\\$app_name2"]);
		array_map('unlink', glob("$root$database$app_name/*.*"));
		rmdir("$root$database$app_name");
		array_map('unlink', glob("$root$views$app_name/*.*"));
		rmdir("$root$views$app_name");
		unlink("$root$controllers$app_name.php");
		unlink("$root$models$app_name.php");
		$this->Appstore->remove($app_id);
		$this->AppPage->remove($app_name);

		$app_name = $_REQUEST['app_name'];
		$zip_name = "$app_name.zip";
		$version = $_REQUEST['version'];
		$type = $_REQUEST['type'];
		$zip = new \ZipArchive;
		$root = constant("ROOTPATH");
		if ($type == "OFFICIAL")
		{
		$dir = "public/Appstore/Official";
		}
		if ($type == "HOMEBREW")
		{
		$dir = "public/Appstore/Homebrew";
		}
		$dir = "$root$dir";
		$res = $zip->open("$dir/$zip_name");
		if ($res === TRUE) {

			// Unzip path
			$path = "$root/";

			// Extract file
			$zip->extractTo($path);
			$zip->close();
			command('migrate -g addon');
			$this->Appstore->install($app_name, $zip_name, $version, $type);
			return $this->index();
		}
	}
}