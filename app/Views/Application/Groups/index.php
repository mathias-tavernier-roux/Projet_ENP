<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container-fluid d-block d-sm-block d-md-block d-lg-block d-xl-block d-xxl-block">
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
                            <th>Nom du Groupe</th>
                            <th>Pole</th>
                            <th>Taille</th>
                            <th></th>
                        </tr>
                    </thead>
                    <?php
                    if ($list != NULL) {
                        foreach ($list as $article) {
                            if ($article['id'] != 1)
                            {
                            $id = $article['id'];
                            $nom = $article['name'];
                            $pole = $article['pole'];
                            $taille = $article['taille'];
                            $link = $article['link_name'];
                            if ($nom == $link)
                            {
                                $name = "$nom";
                            }
                            else
                            {
                                $name = "$link $nom ";
                            }
                    ?>
                            <tr>
                                <td><?= $name ?></td>
                                <td><?= $pole ?></td>
                                <td><?= $taille ?></td>
                                <td><form method=POST action=/Groups/remove><input type="hidden" id="id" name="id" value="<?= $id ?>"><button class="btn btn-primary" type="submit">Supprimer</button></form></td>
                            </tr>
                    <?php
                        }
                    }
                    }
                    ?>
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
            <form method="POST" action="/Groups/add">
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nom du Groupe</th>
                                <th>Variante</th>
                                <th>Pole</th>
                                <th>Taille</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><input required class="form-control" type="text" name="link" style="width: 150px;"></td>
                                <td><input class="form-control" type="text" name="name" style="width: 150px;"></td>
                                <td><input required class="form-control" type="text" name="pole" style="width: 150px;"></td>
                                <td><input required class="form-control" type="text" name="taille" style="width: 100px;"></td>
                                <td><button class="btn btn-primary" type="submit">Créer Un Groupe</button></td>
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
</div>
<?= $this->endSection() ?>