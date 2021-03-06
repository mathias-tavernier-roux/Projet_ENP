<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?= $titre?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome5-overrides.min.css'); ?>">
</head>

<body class="bg-gradient-primary">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 col-xl-12">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4">Projet ENP<br>Assistant D'Installation<br></h4>
                                    </div>
                                    <form class="user" method="POST" action="/Setup/start_install">
                                        <div>
                                        <h5 style="text-align: center;">Création des Identifiants de Administrateur Systeme</h5>
                                        <input class="form-control form-control-user" type="text" id="admin_login" placeholder="Créez Un Identifiant Administrateur" name="login" required style="padding-bottom: 16px;margin-bottom: 10px;">
                                        <input class="form-control form-control-user" type="password" id="admin_password" placeholder="Créez Un Mot de Passe Administrateur" name="password" required>
                                        </div>
                                        <hr>
                                        <div>
                                        <h5 style="text-align: center;">Informations Lié a L'Entreprise Hebergent L'ENP</h5>
                                        <input class="form-control form-control-user" type="text" id="entreprise" placeholder="Ecrivez Votre Entreprise (En Entier)" name="big_name" required style="padding-bottom: 16px;margin-bottom: 10px;">
                                        <input class="form-control form-control-user" type="text" id="entreprise2" placeholder="Ecrivez Votre Entreprise (En Abrégé)" name="mini_name" required>
                                        </div>
                                        <hr>
                                        <h5 style="text-align: center;">Choix des Paquets A Installer Après L'Installation de L'Application Web</h5>
                                        <div>
                                            <div class="form-check"><input class="form-check-input" type="checkbox" id="formCheck-1" name="Application" value="Install"><label class="form-check-label" for="formCheck-1">Nom de L'Application</label></div>
                                            <p>Description de L'Application</p>
                                        </div>
                                        <hr>
                                        <div class="form-check text-start"><input class="form-check-input" type="checkbox" id="formCheck-2" required><label class="form-check-label" for="Confirmation CGU">J'Accepte Les Conditions Général d'Utilisation et Les Conditions Lié A La Licence De L'Application</label></div>
                                        <p style="margin-bottom: 0px;"><a href="cgu">Accéder au CGU (Conditions General d'Utilisation)</a></p>
                                        <p><a href="cga">Accéder au CLA (Conditions lié a la Licence de l'Application)</a></p><button class="btn btn-primary d-block btn-user w-100" type="submit">Lancer L'Installation</button>
                                        <div class="mb-3">
                                            <div class="custom-control custom-checkbox small"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>
</body>

</html>