<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title><?=$_SESSION['titre']?></title>
    <link rel="stylesheet" href="<?php echo base_url('public/assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('public/assets/fonts/fontawesome5-overrides.min.css'); ?>">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-folder"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>ASM - ENP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <a style="color:white;">Panneau de Configuration</a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active" href="/public/System/appstore"><span><strong>Appstore</strong></span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/public/System/"></i><span><strong>Informations Systeme</strong></span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/public/Groups/"><span><strong>Groupes</strong></span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/public/Statuts/"><span><strong>Roles/Statut</strong></span></a></li>
                    <li class="nav-item"><a class="nav-link active" href="/public/Users/list"><span><strong>Utilisateurs</strong></span></a></li>
                </ul>
                <a style="color:white;">Application</a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item"><a class="nav-link active"></i><span><strong>Aucun Addon Installé</strong></span></a></li>
                </ul>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle me-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="navbar-nav flex-nowrap ms-auto">
                            <div class="d-none d-sm-block topbar-divider"></div>
                            <li class="nav-item dropdown no-arrow">
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small">%Nom de L'Utilisateur%</span><img class="border rounded-circle img-profile" src="<?php echo base_url('public/assets/img/avatars/0.png'); ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="/public/Users/"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Gerer Mon Profil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/public/Users/disconnect"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Deconnection</a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <?= $this->renderSection('content')?>
            <footer class="bg-white sticky-footer">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p class="text-center" style="margin-bottom: 0px;">Licence Attribué à :</p>
                            <p class="text-center">Association Saint Michel</p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-center">Projet ENP : Version - Beta-1.0</p>
                            <p class="text-center">Développé Par<br>Mathias Tavernier-Roux</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div><a class="border rounded d-inline scroll-to-top" href="#page-top"><i class="fas fa-angle-up"></i></a>
    </div>
    <script src="<?php echo base_url('public/assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('public/assets/js/theme.js'); ?>"></script>
</body>

</html>