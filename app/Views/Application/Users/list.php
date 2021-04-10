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
                                $uid = $user['id'];
                                $nom = $user['first_name'];
                                $prenom = $user['last_name'];
                                $group = $user['group_name'];
                                $statut = $user['role_name'];
                                $date_naissance = $user['birth'];
                                $idp = 0
                        ?>
                                <tr>
                                    <td><img class="rounded-circle me-2" width="30" height="30" src="<?php echo base_url("public/assets/img/avatars/$idp.png"); ?>"><?= $nom ?> <?= $prenom ?></td>
                                    <td><?= $group ?></td>
                                    <td><?= $statut ?></td>
                                    <td><?= $date_naissance ?></td>
                                    <td>
                                        <form method=POST action=/public/Users/edit>
                                        <input type="hidden" id="id" name="id" value="<?= $uid ?>">
                                            <select name="group_id" id="group_id" class="form-select" style="margin-bottom:10px">
                                                <?php
                                                if ($group_list != NULL) {
                                                    foreach ($group_list as $group) {
                                                        $id = $group['id'];
                                                        $nom = $group['name'];
                                                ?>
                                                        <option value="<?= $id ?>" selected=""><?= $nom ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                            <select name="role_id" id="role_id" class="form-select">
                                                <?php
                                                if ($role_list != NULL) {
                                                    foreach ($role_list as $statut) {
                                                        $id = $statut['id'];
                                                        $nom = $statut['name'];
                                                ?>
                                                        <option value="<?= $id ?>" selected=""><?= $nom ?></option>
                                                <?php
                                                    }
                                                }
                                                ?>
                                            </select>
                                    </td>
                                    <td>
                                        <button class="btn btn-primary" style="margin-bottom:10px"type="submit">Modifier</button>
                                        </form>
                                        <form method=POST action=/public/Users/delete><input type="hidden" id="id" name="id" value="<?= $uid ?>"><button class="btn btn-primary" type="submit">Supprimer</button></form>
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
            <p class="text-primary m-0 fw-bold">Ajouter Un Utilisateur</p>
        </div>
        <div class="card-body">
            <h5></h5>
            <form method="POST" action="/public/Users/add">
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
                            $id = $group['id'];
                            $nom = $group['name'];
                    ?>
                            <option value="<?= $id ?>" selected=""><?= $nom ?></option>
                    <?php
                        }
                    }
                    ?>
                </select><label class="form-label">Statut de L'Utilisateur</label>
                <select name="role_id" id="role_id" class="form-select">
                    <?php
                    if ($role_list != NULL) {
                        foreach ($role_list as $statut) {
                            $id = $statut['id'];
                            $nom = $statut['name'];
                    ?>
                            <option value="<?= $id ?>" selected=""><?= $nom ?></option>
                    <?php
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