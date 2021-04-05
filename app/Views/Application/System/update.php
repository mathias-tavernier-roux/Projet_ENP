<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-dark mb-4" style="text-align: center;">Mises A Jour Systeme</h3>
<div class="row mb-3">
    <div class="col-lg-12 col-xl-12 col-xxl-12">
        <div class="row">
            <div class="col">
                <div class="card shadow mb-3">
                    <div class="card-header py-3">
                        <p class="text-primary m-0 fw-bold">Mise a Jour Via Le Serveur en Ligne</p>
                    </div>
                    <div class="card-body">
                        <p>Fonction Indisponible : Impossible de Contacter Le Serveur de Mises a Jour</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card shadow d-none d-lg-block mb-4">
            <div class="card-header py-3">
                <h6 class="text-primary fw-bold m-0">Mes Informations Systeme Actuel</h6>
            </div>
            <div class="card-body">
                <p>La Mise a Jour Hors Ligne Permet d'Installer les Mises a Jours Du Coeur Depuis Un Paquet<p>
                <h4 class="small fw-bold">Envoyez Un Fichier de Mise a Jour Valide</h4><button class="btn btn-primary btn-sm" type="submit">Televerser</button>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>