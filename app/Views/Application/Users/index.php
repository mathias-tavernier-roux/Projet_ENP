<?php
$session = session();
$this->User = model('App\Models\UserModel', false);
$user = $this->User->info($session->id);
$group = $user['group_id'];
$role = $user['role_id'];
$group_name = $user['group_name'];
$role_name = $user['role_name'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];
$birth = $user['birth'];
?>
<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container-fluid d-block d-sm-block d-md-block d-lg-block d-xl-block d-xxl-block">
<h3 class="text-dark mb-4" style="text-align: center;">Mon Profil</h3>
<div class="row mb-3">
    <div class="col-lg-12">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Changer Mes Informations de Connexion</p>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="/Users/edit_auth">
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="email"><strong>Votre&nbsp;Identifiant Actuel</strong></label><input class="form-control" type="email" id="old_login" placeholder="user" name="old_login" required=""></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="first_name"><strong>Nouveau Mot de Passe</strong><br></label><input class="form-control" type="password" id="first_name" placeholder="Mot de Passe" name="new_password"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="last_name"><strong>Votre Mot de Passe Actuel</strong></label><input class="form-control" type="password" id="old_password" placeholder="Mot de Passe" name="old_password" required=""></div>
                                </div>
                            </div>
                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Mettre a Jour Mes Identifiants</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary fw-bold m-0">Mes Informations</h6>
            </div>
            <div class="card-body">
                <h4 class="small fw-bold">Nom :<span class="float-end"><?=$first_name?></span></h4>
                <h4 class="small fw-bold">Pr??nom :<span class="float-end"><?=$last_name?></span></h4>
                <h4 class="small fw-bold">Date de Naissance :<span class="float-end"><?=$birth?></span></h4>
                <h4 class="small fw-bold">Groupe :<span class="float-end"><?=$group_name?></span></h4>
                <h4 class="small fw-bold">Statut :<span class="float-end"><?=$role_name?></span></h4>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>