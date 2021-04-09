<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-center text-dark mb-4">Role</h3>
<div class="container-fluid">
<div class="card shadow" style="margin-bottom: 20px;">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Liste des Role</p>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>R-ID</th>
                        <th>Nom Du Statut / Role</th>
                        <th>Hierarchie</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $result = NULL;
                    if ($result != NULL) {
                        foreach ($result as $article) {
                            $id = $article['0'];
                            $nom = $article['1'];
                            $h_id = $article['2'];
                    ?>
                    <tr>
                        <td><?=$id?></td>
                        <td><?=$nom?></td>
                        <td><?=$h_id?></td>
                        <td><button class="btn btn-primary" type="button">Supprimer</button></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
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
        <p class="text-primary m-0 fw-bold">Ajouter Un Role</p>
    </div>
    <div class="card-body">
        <h5></h5>
        <form>
            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nom du Role</th>
                            <th>Role</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control" type="text" style="width: 150px;"></td>
                            <td><input class="form-control" type="number" style="width: 100px;">
                            </td>
                            <td><button class="btn btn-primary" type="button">Créer Un Role</button>
                            </td>
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
<?= $this->endSection() ?>