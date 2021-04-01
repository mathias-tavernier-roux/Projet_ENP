<?php

namespace App\Controllers;

class Transactions extends BaseController
{
	public function index()
	// Voir L'Historique de Mes Transactions (Jeune)
	{
		return view('transactions/index');
	}
	// Demander Une Transaction (Jeune)
	public function request()
	{
		return view('transactions/request');
	}
	// Voir Les Requetes De Transaction (Non Traité) (Educ / Direction)
	public function request_list()
	{
		return view('transactions/request_list');
	}
	// Voir Une Requete De Transaction (Educ / Direction)
	public function request_view()
	{
		return view('transactions/request_view');
	}
	// Autoriser Une Requete De Transaction (Educ / Direction)
	public function request_allow()
	{
		return view('transactions/request_view');
	}
	// Ajouter Une Transaction (Educ)
	public function add()
	{
		return view('transactions/add');
	}
	// Justifier La Transaction (Jeune)
	public function justify()
	{
		return view('transactions/justify');
	}
	// Voir Les Justification de Transaction (Non Traité) (Educ)
	public function justify_list()
	{
		return view('transactions/justify_view');
	}
	// Voir La Justification de Transaction (Educ)
	public function justify_view()
	{
		return view('transactions/justify_view');
	}
	// Valider La Justification (Educ)
	public function validation()
	{
		return view('transactions/validation');
	}
	// Voir Les Justifications (A Reverifier) (Comptabilité)
	public function validation_list()
	{
		return view('transactions/validation_list');
	}
	// Voir La Justification (Comptabilité)
	public function validation_view()
	{
		return view('transactions/validation_view');
	}
	// Justification Confirmé (Comptabilité)
	public function confirmation()
	{
		return view('transactions/confirmation');
	}
}
