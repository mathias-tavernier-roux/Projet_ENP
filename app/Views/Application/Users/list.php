<?php
$session = session();
$this->User = model('App\Models\UserModel', false);
$user = $this->User->info($session->id);
$group = $user['group_id'];
$role = $user['role_id'];
$role_hierarchy = array_column($role_list, 'hierarchy', 'id');
$role_user = $role_hierarchy["$role"];
if (!isset($_REQUEST['group_search'])) {
    $_REQUEST['group_search'] = 0;
}
?>
<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<h3 class="text-center text-dark mb-4">Liste des Utilisateurs</h3>
<div class="alert alert-danger text-center d-lg-none" role="alert" style="margin-bottom: 10px;padding-top: 5px;padding-left: 0px;padding-bottom: 5px;padding-right: 0px;"><span><strong>Fonction Uniquement Disponible Sur&nbsp;Ordinateur</strong><br></span></div>
<div class="card-header py-3">
    <p class="text-primary m-0 fw-bold">Liste des Utilisateurs</p>
    <form method="POST">
        <select class="form-select" name="group_search">
            <?php
            if ($group_list != NULL) {
                foreach ($group_list as $group) {
                    if ($group['id'] != 1) {
                        $id = $group['id'];
                        $group_name_list = array_column($group_list, 'name', 'id');
                        $group_variant_list = array_column($group_list, 'link_name', 'id');
                        $role_name_list = array_column($role_list, 'name', 'id');
                        $group = $group_name_list["$id"];
                        $group_variant = $group_variant_list["$id"];
                        if ($group == $group_variant) {
                            $group_perm = "$group";
                        } else {
                            $group_perm = "$group_variant $group ";
                        }
            ?>
                        <option value="<?= $id ?>"><?= "$group_perm" ?></option>
            <?php
                    }
                }
            }
            ?>
        </select>
        <button class="btn btn-primary" type="submit" style="width: 100%;">Rechercher</button>
    </form>
</div>
<div class="card-body">
    <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
        <table class="table my-0" id="dataTable">
            <thead>
                <tr>
                    <th>Nom et Prénom</th>
                    <th>Groupe</th>
                    <th>Statut</th>
                    <th>Date de Naissance</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($user_list != NULL) {
                    foreach ($user_list as $user) {
                        if ($user['id'] != 1) {
                            if ($user['group_id'] == $_REQUEST['group_search']) {
                                $role_id = $user['role_id'];
                                $role_hierarchy = array_column($role_list, 'hierarchy', 'id');
                                $role = $role_hierarchy["$role_id"];
                                if ($role_user < $role) {
                                    $uid = $user['id'];
                                    $nom = $user['first_name'];
                                    $prenom = $user['last_name'];
                                    $group = $user['group_name'];
                                    $statut = $user['role_name'];
                                    $date_naissance = $user['birth'];
                                    $idp = 0
                ?>
                                    <tr>
                                        <td><img class="rounded-circle me-2" width="30" height="30" src="<?php echo base_url("assets/img/avatars/$idp.png"); ?>"><?= $nom ?> <?= $prenom ?></td>
                                        <td><?= $group ?></td>
                                        <td><?= $statut ?></td>
                                        <td><?= $date_naissance ?></td>
                                        <td>
                                            <form method=POST action=/Users/edit>
                                                <input type="hidden" id="id" name="id" value="<?= $uid ?>">
                                                <select name="group_id" id="group_id" class="form-select" style="margin-bottom:10px">
                                                    <?php
                                                    if ($group_list != NULL) {
                                                        foreach ($group_list as $group) {
                                                            if ($group['id'] != 1) {
                                                                $id = $group['id'];
                                                                $group_name_list = array_column($group_list, 'name', 'id');
                                                                $group_variant_list = array_column($group_list, 'link_name', 'id');
                                                                $role_name_list = array_column($role_list, 'name', 'id');
                                                                $group = $group_name_list["$id"];
                                                                $group_variant = $group_variant_list["$id"];
                                                                if ($group == $group_variant) {
                                                                    $group_perm = "$group";
                                                                } else {
                                                                    $group_perm = "$group_variant $group ";
                                                                }
                                                    ?>
                                                                <option value="<?= $id ?>"><?= "$group_perm" ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                                <select name="role_id" id="role_id" class="form-select">
                                                    <?php
                                                    if ($role_list != NULL) {
                                                        foreach ($role_list as $statut) {
                                                            if ($role_user <= $statut['hierarchy']) {
                                                                $id = $statut['id'];
                                                                $nom = $statut['name'];
                                                    ?>
                                                                <option value="<?= $id ?>" selected=""><?= $nom ?></option>
                                                    <?php
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                        </td>
                                        <td>
                                            <button class="btn btn-primary" style="margin-bottom:10px" type="submit">Modifier</button>
                                            </form>
                                            <form method=POST action=/Users/delete><input type="hidden" id="id" name="id" value="<?= $uid ?>"><button class="btn btn-primary" type="submit">Supprimer</button></form>
                                        </td>
                                    </tr>
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
</div>
</div>
<div class="card shadow">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Ajouter Un Utilisateur</p>
    </div>
    <div class="card-body">
        <h5></h5>
        <form method="POST" action="/Users/add">
            <label class="form-label">Nom</label><input name="first_name" id="first_name" class="form-control" type="text">
            <label class="form-label">Prenom</label><input name="last_name" id="last_name" class="form-control" type="text">
            <label class="form-label">Date de Naissance</label><input name="birth" id="birth" class="form-control" type="text">
            <hr><label class="form-label">Login</label><input name="login" id="login" class="form-control" type="text">
            <label class="form-label">Mot de Passe</label><input name="password" id="password" class="form-control" type="text">
            <hr><label class="form-label">Groupe De L'Utilisateur</label>
            <select name="group_id" id="group_id" class="form-select">
                <?php
                if ($group_list != NULL) {
                    foreach ($group_list as $group) {
                        if ($group['id'] != 1) {
                            $id = $group['id'];
                            $group_name_list = array_column($group_list, 'name', 'id');
                            $group_variant_list = array_column($group_list, 'link_name', 'id');
                            $role_name_list = array_column($role_list, 'name', 'id');
                            $group = $group_name_list["$id"];
                            $group_variant = $group_variant_list["$id"];
                            if ($group == $group_variant) {
                                $group_perm = "$group";
                            } else {
                                $group_perm = "$group_variant $group ";
                            }
                ?>
                            <option value="<?= $id ?>"><?= "$group_perm" ?></option>
                <?php
                        }
                    }
                }
                ?>
            </select>
            <label class="form-label">Statut de L'Utilisateur</label>
            <select name="role_id" id="role_id" class="form-select">
                <?php
                if ($role_list != NULL) {
                    foreach ($role_list as $statut) {
                        if ($role_user <= $statut['hierarchy']) {
                            $id = $statut['id'];
                            $nom = $statut['name'];
                ?>
                            <option value="<?= $id ?>" selected=""><?= $nom ?></option>
                <?php
                        }
                    }
                }
                ?>
            </select><button class="btn btn-primary" type="submit" style="width: 100%;">Ajouter Un Compte</button>
        </form>
        <div></div>
    </div>
</div>
</div>
</div>
<?= $this->endSection() ?>