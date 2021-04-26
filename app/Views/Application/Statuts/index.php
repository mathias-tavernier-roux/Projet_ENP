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
                        <th>Nom Du Statut / Role</th>
                        <th>Description</th>
                        <th>Hierarchie</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    if ($list != NULL) {
                        foreach ($list as $role) {
                            if ($role['id'] != 1)
                            {
                            $id = $role['id'];
                            $nom = $role['name'];
                            $description = $role['description'];
                            $hierarchy = $role['hierarchy'];
                    ?>
                    <tr>
                        <td><?=$nom?></td>
                        <td><?=$description?></td>
                        <td><?=$hierarchy?></td>
                        <td><form method=POST action=/Statuts/remove><input type="hidden" id="id" name="id" value="<?= $id ?>"><button class="btn btn-primary" type="submit">Supprimer</button></form></td>
                    </tr>
                    <?php
                        }}
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
        <form method="POST" action="/Statuts/add">
            <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                <table class="table my-0" id="dataTable">
                    <thead>
                        <tr>
                            <th>Nom du Role</th>
                            <th>Hierarchie</th>
                            <th>Description</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><input class="form-control" type="text" id="name" name="name" style="width: 150px;" required></td>
                            <td><input class="form-control" type="number" id="hierarchy" name="hierarchy" style="width: 150px;" required></td>
                            <td><input class="form-control" type="text" id="description" name="description" style="width: 100px;">
                            </td>
                            <td><button class="btn btn-primary" type="submit">Créer Un Role</button></td>
                            </tr>
                        </form>
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