<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-center text-dark mb-4">Groupes</h3>
<div class="container-fluid">
    <div class="card shadow" style="margin-bottom: 20px;">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Liste des Groupes</p>
        </div>
        <div class="card-body">
            <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>G-ID</th>
                            <th>Nom Du Groupe</th>
                            <th>Pole</th>
                            <th>Taille</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Passerelle Villa</td>
                            <td>Aix En Provence</td>
                            <td>8</td>
                            <td><button class="btn btn-primary" type="button">Supprimer</button></td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr></tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
    <div class="card shadow">
        <div class="card-header py-3">
            <p class="text-primary m-0 fw-bold">Ajouter Un Groupe</p>
        </div>
        <div class="card-body">
            <h5></h5>
            <form>
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nom du Groupe</th>
                                <th>Pole</th>
                                <th>Taille</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input class="form-control" type="text" style="width: 150px;"></td>
                                <td><input class="form-control" type="text" style="width: 150px;"></td>
                                <td><input class="form-control" type="number" style="width: 100px;"></td>
                                <td><button class="btn btn-primary" type="button">Créer Un Groupe</button></td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr></tr>
                        </tfoot>
                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>