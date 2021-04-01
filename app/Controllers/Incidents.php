<?php

namespace App\Controllers;

class Incidents extends BaseController
{
	public function index()
	// Voir Tout Les Incident Me Concernant
	{
		return view('incidents/index');
	}
		
	// --------------------------------------------------------------------
	// La Procedure Commence Ici En Cas De Panne Rapporté Par Un Jeune
	// --------------------------------------------------------------------

	
	// Demander Une Transaction (Jeune)
	public function report()
	{
		return view('incidents/report');
	}
	// Voir Les Rapports D'Incident (Non Traité) (Educ)
	public function reports_list()
	{
		return view('incidents/report_list');
	}
	// Voir Un Rapport D'Incident (Educ)
	public function report_view()
	{
		return view('incidents/report_view');
	}
	// Confirmer Un Incident (Educ)
	public function report_confirm()
	{
		return view('incidents/report_confirm');
	}
	
	// --------------------------------------------------------------------
	// La Procedure Commence Ici En Cas De D'Incident Remarqué Par Un Educ
	// --------------------------------------------------------------------

	// Ajouter Un Incident (Educ)
	public function incident_add()
	{
		return view('incidents/incident_add');
	}
	// Voir Les Incidents (Non Traité) (Direction)
	public function incident_list()
	{
		return view('incidents/incident_list');
	}
	// Voir Un Incident (Direction)
	public function incident_view()
	{
		return view('incidents/incident_view');
	}

	// --------------------------------------------------------------------
	// La Procedure S'Arrete Ici En Cas De Casse Volontaire ou Fugue
	// --------------------------------------------------------------------

	// Confirmer La Prise de Mesure (Direction)
	public function incident_fix()
	{
		return view('incidents/incident_fix');
	}
	// Lister Les Incidents En Cours de Traitement (Jeune / Educ)
	public function incident_fix_list()
	{
		return view('incidents/incident_fix_list');
	}
	// Voir Les Traitements Concerné Par L'Incident (Jeune / Educ)
	public function incident_fix_view()
	{
		return view('incidents/incident_fix_view');
	}
	// Confirmer Que l'Incident a été corrigé (Jeune / Educ)
	public function incident_fixed()
	{
		return view('incidents/incident_fixed');
	}
}
