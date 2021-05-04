<?= $this->extend('templates/default') ?>
<?= $this->section('content') ?>
<div class="alert alert-danger text-center d-lg-none" role="alert"><span><strong>Fonction Disponible Uniquement Sur&nbsp;Ordinateur</strong></span></div>
                <div class="container-fluid d-none d-sm-none d-md-none d-lg-block d-xl-block d-xxl-block">
<h3 class="text-dark mb-4">Permissions</h3>
<div class="card shadow" style="margin-bottom: 20px;">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Liste des Permissions Disponible</p>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Nom de La Permission</th>
                        <th>Application</th>
                        <th>Page</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($permission_system != NULL) {
                        foreach ($permission_system as $permission) {
                            $id = $permission['id'];
                            $name = $permission['name'];
                            $app = $permission['app'];
                            $page = $permission['page'];
                    ?>
                            <tr>
                                <td><?= $name ?></td>
                                <td><?= $app ?></td>
                                <td><?= $page ?></td>
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
<div class="card shadow" style="margin-bottom: 20px;">
    <div class="card-header py-3">
        <p class="text-primary m-0 fw-bold">Liste des Permissions Ajouté</p>
    </div>
    <div class="card-body">
        <div class="table-responsive table mt-2" id="dataTable-1" role="grid" aria-describedby="dataTable_info">
            <table class="table my-0" id="dataTable">
                <thead>
                    <tr>
                        <th>Nom de La Permission</th>
                        <th>Application</th>
                        <th>Page</th>
                        <th>Variante</th>
                        <th>Groupe</th>
                        <th>Role</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($permission_other != NULL) {
                        foreach ($permission_other as $permission) {
                            $id = $permission['id'];
                            $name = $permission['name'];
                            $app = $permission['app'];
                            $page = $permission['page'];
                            $variant = $permission['variant'];
                            $group_id = $permission['group'];
                            $role_id = $permission['role'];
                            $group_name_list = array_column($group_list, 'name', 'id');
                            $group_variant_list = array_column($group_list, 'link_name', 'id');
                            $role_name_list = array_column($role_list, 'name', 'id');
                            $group = $group_name_list["$group_id"];
                            $group_variant = $group_variant_list["$group_id"];
                            $role = $role_name_list["$role_id"];
                            if ($group == $group_variant) {
                                $group_perm = "$group";
                            } else {
                                $group_perm = "$group_variant $group ";
                            }
                    ?>
                            <tr>
                                <td><?= $name ?></td>
                                <td><?= $app ?></td>
                                <td><?= $page ?></td>
                                <td><?= $variant ?></td>
                                <td><?= "$group_perm" ?></td>
                                <td><?= $role ?></td>
                                <td>
                                    <form method=POST action=/System/remove_permission><input type="hidden" id="id" name="id" value="<?= $id ?>"><button class="btn btn-primary" type="submit">Supprimer</button></form>
                                </td>
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
        <p class="text-primary m-0 fw-bold">Ajouter Une Permission</p>
    </div>
    <div class="card-body">
        <h5></h5>
        <form method="POST" action="/System/add_permission">
            <label class="form-label">Nommez Votre Permission</label>
            <input name="permission_name" id="permission_name" class="form-control" type="text" required>
            <label class="form-label">Choisir La Permission Sur Lequel Se Base Votre Permission</label>
            <select class="form-select" name="permission" id="permission" required>
                <?php
                foreach ($permission_system as $permission) {
                    $id = $permission['id'];
                    $name = $permission['name'];
                    $app = $permission['app'];
                    $page = $permission['page'];
                ?>
                    <option value="<?= $id ?>"><?= $name ?> | <?= $app ?> | <?= $page ?></option>
                <?php
                }
                ?>
            </select>
            <hr><label class="form-label">Variante (Laissez vide si aucune variante est requise)</label>
            <input name="permission_variant" id="permission_variant" class="form-control" type="text">
            <hr><label class="form-label">Groupe Concerné Par Cette Permission</label>
            <select name="permission_group" id="permission_group" class="form-select" required>
                <?php
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
                ?>
            </select><label class="form-label">Statut Concerné Par Cette Permission</label>
            <select name="permission_statut" id="permission_statut" class="form-select" required>
                <?php
                foreach ($role_list as $role) {
                    if ($role['id'] != 1) {
                        $id = $role['id'];
                        $nom = $role['name'];
                ?>
                        <option value="<?= $id ?>"><?= $nom ?></option>
                <?php
                    }
                }
                ?>
            </select><button class="btn btn-primary" type="submit" style="width: 100%;">Ajouter Une Permission</button>
        </form>
        <div></div>
    </div>
</div>
<?= $this->endSection() ?>