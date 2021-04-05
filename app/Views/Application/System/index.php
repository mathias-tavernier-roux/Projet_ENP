<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-dark mb-4" style="text-align: center;">Informations Systeme</h3>
<div class="row mb-3">
    <div class="col-lg-12 col-xl-12 col-xxl-12">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Changer Des Informations Système</p>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="username"><strong>Changer Le
                                                Nom</strong><br></label><input class="form-control" type="text" id="new_name" placeholder="Nom de L'Entreprise" name="new_name"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col">
                                    <div class="mb-3"><label class="form-label" for="first_name"><strong>Changer
                                                L'Abrégé</strong><br></label><input class="form-control" type="password" id="new_mini_name" placeholder="Nom de L'Entreprise (En Abrégé)" name="new_mini_name"></div>
                                </div>
                            </div>
                            <div class="mb-3"><button class="btn btn-primary btn-sm" type="submit">Mettre a Jour Mes Identifiants</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow d-none d-lg-block mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary fw-bold m-0">Mes Informations Systeme Actuel</h6>
            </div>
            <div class="card-body">
                <h4 class="small fw-bold">Version Systeme ENP :<span class="float-end">B-1.0</span>
                </h4>
                <h4 class="small fw-bold">Version Framework (Code Igniter) :<span class="float-end">4.1.1</span></h4>
                <h4 class="small fw-bold">Nom :<span class="float-end">Association Saint
                        Michel</span></h4>
                <h4 class="small fw-bold">Nom Abrégé<span class="float-end">ASM</span></h4>
                <h4 class="small fw-bold">Etat du Coeur<span class="float-end">Verrouillé /&nbsp;
                        Déverouillé</span></h4>
                <h4 class="small fw-bold">Informations Serveurs PHP</h4><button class="btn btn-primary btn-sm" type="submit">Accéder aux Informations
                    PHP</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>