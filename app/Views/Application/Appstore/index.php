<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>

<div class="container-fluid d-block d-sm-block d-md-block d-lg-block d-xl-block d-xxl-block">
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
                            <th>Nom du Fichier Concerné</th>
                            <th>Action</th>
                            <th></th>
                            <th>MD5</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Module de Recherche
                        $dir = '../public/Appstore/official';
                        $dossier = scandir($dir);
                        if ($dossier != NULL) {
                            $app_list = array_column($list_official, 'zip_name');
                            $version_list = array_column($list_official, 'version');
                            $id_list = array_column($list_official, 'id');
                            foreach ($dossier as $app) {
                                $file_info = new SplFileInfo($app);
                                if ($file_info->getExtension() == "zip") {
                                    $app_name = $file_info->getBasename('.zip');
                                    $zip_name = $file_info->getBasename('');
                                    $version = md5_file("$dir/$app");
                                    $type = "OFFICIAL";
                        ?>
                                    <tr>
                                        <td><?= $file_info->getBasename('.zip') ?></td>
                                        <td><?= $file_info->getBasename('') ?></td>
                                        <?php
                                        if (in_array($file_info->getBasename(''), $app_list) == false) {
                                        ?>
                                            <td>
                                                <form method=POST action=/Appstore/install>
                                                    <input type="hidden" id="app_name" name="app_name" value="<?= $file_info->getBasename('.zip') ?>">
                                                    <input type="hidden" id="zip_name" name="zip_name" value="<?= $file_info->getBasename('') ?>">
                                                    <input type="hidden" id="version" name="version" value="<?= $version ?>">
                                                    <input type="hidden" id="type" name="type" value="OFFICIAL">
                                                    <button class="btn btn-primary" type="submit">Installer</button>
                                                </form>
                                            </td>
                                            <td></td>
                                            <td><?= $version ?></td>
                                        <?php
                                        } else {
                                            $this->Appstore = model('App\Models\AppstoreModel', false);
                                            $app_id2 = $this->Appstore->find_id($app_name, $zip_name, $type);
                                            $app_id = $app_id2['id'];
                                            $app_id = array_search($app_id, $id_list);
                                            $app_version = $version_list[$app_id];
                                            $app_id = $id_list[$app_id];
                                        ?>
                                            <td>
                                                <form method=POST action=/Appstore/remove>
                                                    <input type="hidden" id="id" name="id" value="<?=$app_id?>">
                                                    <input type="hidden" id="app_name" name="app_name" value="<?= $file_info->getBasename('.zip') ?>">
                                                    <button class="btn btn-primary" type="submit">Supprimer</button>
                                                </form>
                                            </td>
                                            <?php
                                            if ($app_version != $version) {
                                            ?>
                                                <td>
                                                    <form method=POST action=/Appstore/update>
                                                    <input type="hidden" id="app_name" name="app_name" value="<?= $file_info->getBasename('.zip') ?>">
                                                    <input type="hidden" id="zip_name" name="zip_name" value="<?= $file_info->getBasename('') ?>">
                                                    <input type="hidden" id="version" name="version" value="<?= $version ?>">
                                                    <input type="hidden" id="type" name="type" value="OFFICIAL">
                                                        <input type="hidden" id="id" name="id" value="<?=$app_id?>">
                                                        <button class="btn btn-primary" type="submit">Mettre a Jour</button>
                                                    </form>
                                                </td>
                                                <td><?= $version ?></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td></td>
                                                <td><?= $version ?></td>
                            <?php
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
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
        if ($core_status == 1) {
        ?>
            <!----CAS 1 Coeur Déverouillé --->
            <div class="card-body">
                <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
                    <table class="table my-0" id="dataTable">
                        <thead>
                            <tr>
                                <th>Nom de L'Addon</th>
                                <th>Nom du Fichier Concerné</th>
                                <th>Action</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Module de Recherche
                        $dir = '../public/Appstore/homebrew';
                        $dossier = scandir($dir);
                        if ($dossier != NULL) {
                            $app_list = array_column($list_homebrew, 'zip_name');
                            $version_list = array_column($list_homebrew, 'version');
                            $id_list = array_column($list_homebrew, 'id');
                            foreach ($dossier as $app) {
                                $file_info = new SplFileInfo($app);
                                if ($file_info->getExtension() == "zip") {
                                    $app_name = $file_info->getBasename('.zip');
                                    $zip_name = $file_info->getBasename('');
                                    $version = md5_file("$dir/$app");
                                    $type = "OFFICIAL";
                        ?>
                                    <tr>
                                        <td><?= $file_info->getBasename('.zip') ?></td>
                                        <td><?= $file_info->getBasename('') ?></td>
                                        <?php
                                        if (in_array($file_info->getBasename(''), $app_list) == false) {
                                        ?>
                                            <td>
                                                <form method=POST action=/Appstore/install>
                                                    <input type="hidden" id="app_name" name="app_name" value="<?= $file_info->getBasename('.zip') ?>">
                                                    <input type="hidden" id="zip_name" name="zip_name" value="<?= $file_info->getBasename('') ?>">
                                                    <input type="hidden" id="version" name="version" value="<?= $version ?>">
                                                    <input type="hidden" id="type" name="type" value="HOMEBREW">
                                                    <button class="btn btn-primary" type="submit">Installer</button>
                                                </form>
                                            </td>
                                            <td></td>
                                            <td><?= $version ?></td>
                                        <?php
                                        } else {
                                            $this->Appstore = model('App\Models\AppstoreModel', false);
                                            $app_id2 = $this->Appstore->find_id($app_name, $zip_name, $type);
                                            $app_id = $app_id2['id'];
                                            $app_id = array_search($app_id, $id_list);
                                            $app_version = $version_list[$app_id];
                                            $app_id = $id_list[$app_id];
                                        ?>
                                            <td>
                                                <form method=POST action=/Appstore/remove>
                                                    <input type="hidden" id="app_name" name="app_name" value="<?= $file_info->getBasename('.zip') ?>">
                                                    <input type="hidden" id="id" name="id" value="<?=$app_id?>">
                                                    <button class="btn btn-primary" type="submit">Supprimer</button>
                                                </form>
                                            </td>
                                            <?php
                                            if ($app_version != $version) {
                                            ?>
                                                <td>
                                                    <form method=POST action=/Appstore/update>
                                                        <input type="hidden" id="version" name="version" value="<?= $version ?>">
                                                        <input type="hidden" id="id" name="id" value="<?=$app_id?>">
                                                        <button class="btn btn-primary" type="submit">Mettre a Jour</button>
                                                    </form>
                                                </td>
                                                <td><?= $version ?></td>
                                            <?php
                                            } else {
                                            ?>
                                                <td></td>
                                                <td><?= $version ?></td>
                            <?php
                                            }
                                        }
                                    }
                                }
                            }
                            ?>
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
        <?php
        } else {
        ?>
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
<?= $this->endSection(); ?>