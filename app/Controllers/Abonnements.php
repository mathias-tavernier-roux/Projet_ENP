<?php

namespace App\Controllers;

class Abonnements extends BaseController
{
	public function index()
	{
		// définition des données variables du template
		$data['title'] = 'Mes Abonnements';
		 
		// on charge la view qui contient le corps de la page
		$data['contents'] = 'abonnements/index';
	 
		// on charge la page dans le template
		$this->load->view('template', $data);
	}
    public function add()
	{
		// définition des données variables du template
		$data['title'] = '';
		 
		// on charge la view qui contient le corps de la page
		$data['contents'] = 'abonnements/add';
	 
		// on charge la page dans le template
		$this->load->view('template', $data);
	}
	public function abort()
	{
		// définition des données variables du template
		$data['title'] = '';
		 
		// on charge la view qui contient le corps de la page
		$data['contents'] = 'abonnements/abort';
	 
		// on charge la page dans le template
		$this->load->view('template', $data);
	}
}
