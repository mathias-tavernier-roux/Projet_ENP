<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-center text-dark mb-4">Liste des Utilisateurs</h3>
<div class="alert alert-danger text-center d-lg-none" role="alert" style="margin-bottom: 10px;padding-top: 5px;padding-left: 0px;padding-bottom: 5px;padding-right: 0px;"><span><strong>Fonction Uniquement Disponible Sur&nbsp;Ordinateur</strong><br></span></div>
<div class="container-fluid d-none d-lg-block">
    <div class="card shadow" style="margin-bottom: 20px;">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Liste des Utilisateurs</p>
        </div>
        <div class="card-body">
            <h5>Rechercher Par Groupe et Par Statut</h5>
            <form><select class="form-select">
                    <option value="ALL" selected="">Groupe</option>
                    <option value="STUDIO">STUDIO</option>
                </select><select class="form-select">
                    <option value="ALL" selected="">Statut</option>
                    <option value="EDUC">EDUC</option>
                </select></form>
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>U-ID</th>
                            <th>Nom et Prénom</th>
                            <th>Groupe</th>
                            <th>Statut</th>
                            <th>Date de Naissance</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td><img class="rounded-circle me-2" width="30" height="30" src="/assets/img/avatars/0.png">Mathias Tavernier-Roux</td>
                            <td>Studio</td>
                            <td>Jeune Majeur</td>
                            <td>29/06/2002</td>
                            <td><button class="btn btn-primary" type="button">Supprimer</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p id="dataTable_info" class="dataTables_info" role="status" aria-live="polite">Liste %STATUT% dans Le Groupe&nbsp;%GROUPE%<br></p>
                </div>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Ajouter Un Utilisateur</p>
        </div>
        <div class="card-body">
            <h5></h5>
            <form><label class="form-label">Nom</label><input class="form-control" type="text"><label class="form-label">Prenom</label><input class="form-control" type="text"><label class="form-label">Date de Naissance</label><input class="form-control" type="text">
                <hr><label class="form-label">Login</label><input class="form-control" type="text"><label class="form-label">Mot de Passe</label><input class="form-control" type="text"><label class="form-label">Confirmation Mot de Passe</label><input class="form-control" type="text">
                <hr><label class="form-label">Groupe De L'Utilisateur</label><select class="form-select">
                    <option value="Groupe" selected="">Groupe</option>
                </select><label class="form-label">Statut de L'Utilisateur</label><select class="form-select">
                    <option value="Statut">Statut</option>
                </select><button class="btn btn-primary" type="submit" style="width: 100%;">Ajouter Un Compte</button>
            </form>
            <div></div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection() ?>