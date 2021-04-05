<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-dark mb-4" style="text-align: center;">Mon Profil</h3>
<div class="row mb-3">
    <div class="col-lg-4">
        <div class="card mb-3">
            <div class="card-header py-3">
                <p class="text-primary m-0 fw-bold">Changer Ma Photo de Profil</p>
            </div>
            <div class="card-body text-center shadow"><img class="rounded-circle mb-3 mt-4" src="assets/img/avatars/0.png" width="160" height="160">
                <div class="mb-3"><button class="btn btn-primary btn-sm" type="button">Change Photo</button></div>
            </div>
        </div>
    </div>
    <div class="col-lg-8">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Changer Mes Informations de Connexion</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="username"><strong>Nouveau Login</strong></label><input class="form-control" type="text" id="new_login" placeholder="user" name="new_login"></div>
                                </div>
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="email"><strong>Votre&nbsp;Identifiant Actuel</strong></label><input class="form-control" type="email" id="old_login" placeholder="user@ASM.ENP" name="old_login" required=""></div>
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
                <h4 class="small fw-bold">Nom :<span class="float-end">Roux</span></h4>
                <h4 class="small fw-bold">Prénom :<span class="float-end">Mathias</span></h4>
                <h4 class="small fw-bold">Date de Naissance :<span class="float-end">29/06/2002</span></h4>
                <h4 class="small fw-bold">Groupe :<span class="float-end">Studio</span></h4>
                <h4 class="small fw-bold">Statut :<span class="float-end">Jeune</span></h4>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>