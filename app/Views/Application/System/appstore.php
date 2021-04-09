<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<div class="alert alert-danger text-center d-lg-none" role="alert"><span><strong>Fonction Disponible Uniquement Sur&nbsp;Ordinateur</strong></span></div>
                <div class="container-fluid d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
                    <h3 class="text-dark mb-4">App Store</h3>
                    <div class="card shadow" style="margin-bottom: 20px;">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Application Officiels</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nom de L'Addon</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Agenda</td>
                                            <td>Gestionnaire D'Evenements et De Rendez Vous Interne</td>
                                            <td><button class="btn btn-primary" type="button">Ouvrir Le Paquet d'Installation</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Applications Disponible :&nbsp; 1</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card shadow">
                        <div class="card-header py-3">
                            <p class="text-primary m-0 fw-bold">Application Provenant de Sources Inconnus (Voir Manuel de L'Application : Sources Inconnus)</p>
                        </div>
                        <?php
                        $core_status = 1;
                        if($core_status == 1)
                        {
                        ?>
                        <!----CAS 1 Coeur Déverouillé --->
                        <div class="card-body">
                            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                                <table class="table my-0" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>Nom de L'Addon</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Agenda</td>
                                            <td>Gestionnaire D'Evenements et De Rendez Vous Interne</td>
                                            <td><button class="btn btn-primary" type="button">Ouvrir Le Paquet d'Installation</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr></tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-md-6 align-self-center">
                                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Applications Disponible :&nbsp; 1</p>
                                </div>
                            </div>
                        </div>
                        <?php } else {?>
                        <!----CAS 2 Pas de Déverouillage --->
                        <div class="card-body">
                            <h4 class="text-center">Module Désactivé (Nécessite Un Déverrouillage du Cœur)</h4>
                            <p class="text-center">Voir Le Manuel Utilisateur Pour Procéder au Déverrouillage du Cœur de l'Application</p>
                        </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
<?= $this->endSection() ?>