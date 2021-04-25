<?php
$session = session();
$this->User = model('App\Models\UserModel', false);
$this->Permission = model('App\Models\PermissionModel', false);
if (!isset($session->id))
{
    redirect()->to('/Users/login');
}
$user = $this->User->info($session->id);
$group = $user['group_id'];
$role = $user['role_id'];
$group_name = $user['group_name'];
$role_name = $user['role_name'];
$first_name = $user['first_name'];
$last_name = $user['last_name'];
if ($first_name == $last_name) {
    $nom = "$first_name";
} else {
    $nom = "$last_name $first_name";
}
$birth = $user['birth'];
if ($group == 1 && $role == 1)
{
    $group = "SYSTEM";
    $role = "ADMIN"; 
}
$permissions = $this->Permission->list_my_perms($group, $role);
if (isset($app))
{
foreach ($permissions as $perm) {
    $app_perm = in_array($app, $perm);
if ($app_perm == true)
    {
    $page_perm = in_array($page, $perm);
    if ($page_perm == true)
        {

        }
    else
        {
            redirect()->to('/Users/index');
        }
    }
else
    {
        redirect()->to('/Users/index');
    }
}}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>ENP - <?=$titre?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/bootstrap/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome-all.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/font-awesome.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/fonts/fontawesome5-overrides.min.css'); ?>">
</head>

<body id="page-top">
    <div id="wrapper">
        <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0">
            <div class="container-fluid d-flex flex-column p-0"><a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><i class="fas fa-folder"></i></div>
                    <div class="sidebar-brand-text mx-3"><span>ASM - ENP</span></div>
                </a>
                <hr class="sidebar-divider my-0">
                <a style="color:white;">Systeme</a>
                <ul class="navbar-nav text-light" id="accordionSidebar">
                <?php
                foreach ($permissions as $perm) {
                $app_perm = in_array('System', $perm);
                if ($app_perm == true)
                {
                    $page_perm = in_array('index', $perm);
                    if ($page_perm == true)
                    {
                ?>
                <li class="nav-item"><a class="nav-link active" href="/System/"></i><span><strong>Informations Systeme</strong></span></a></li>
                <?php
                }}}
                ?>
                <?php
                foreach ($permissions as $perm) {
                    $app_perm = in_array('System', $perm);
                if ($app_perm == true)
                {
                    $page_perm = in_array('appstore-disabled', $perm);
                    if ($page_perm == true)
                    {
                ?>
                <li class="nav-item"><a class="nav-link active" href="/System/appstore"><span><strong>Appstore (Non Disponible)</strong></span></a></li>
                <?php
                }}}
                ?>
                <?php
                foreach ($permissions as $perm) {
                    $app_perm = in_array('System', $perm);
                if ($app_perm == true)
                {
                    $page_perm = in_array('permissions', $perm);
                    if ($page_perm == true)
                    {
                ?>
                <li class="nav-item"><a class="nav-link active" href="/System/permissions"><span><strong>Permissions</strong></span></a></li>
                <?php
                }}}
                ?>
                <?php
                foreach ($permissions as $perm) {
                $app_perm = in_array('Groups', $perm);
                if ($app_perm == true)
                {
                    $page_perm = in_array('index', $perm);
                    if ($page_perm == true)
                    {
                ?>
                <li class="nav-item"><a class="nav-link active" href="/Groups/"><span><strong>Groupes</strong></span></a></li>
                <?php
                }}}
                ?>
                <?php
                foreach ($permissions as $perm) {
                $app_perm = in_array('Statuts', $perm);
                if ($app_perm == true)
                {
                    $page_perm = in_array('index', $perm);
                    if ($page_perm == true)
                    {
                ?>
                <li class="nav-item"><a class="nav-link active" href="/Statuts/"><span><strong>Roles/Statut</strong></span></a></li>
                <?php
                }}}
                ?>
                <?php
                foreach ($permissions as $perm) {
                $app_perm = in_array('Users', $perm);
                if ($app_perm == true)
                {
                    $page_perm = in_array('list', $perm);
                    if ($page_perm == true)
                    {
                ?>
                <li class="nav-item"><a class="nav-link active" href="/Users/list"><span><strong>Utilisateurs</strong></span></a></li>
                <?php
                }}}
                ?>
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
                                <div class="nav-item dropdown no-arrow"><a class="dropdown-toggle nav-link" aria-expanded="false" data-bs-toggle="dropdown" href="#"><span class="d-none d-lg-inline me-2 text-gray-600 small"><?=$nom?></span><img class="border rounded-circle img-profile" src="<?php echo base_url('assets/img/avatars/0.png'); ?>"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-end animated--grow-in">
                                    <a class="dropdown-item" href="/Users/"><i class="fas fa-user fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Gerer Mon Profil</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="/Users/disconnect"><i class="fas fa-sign-out-alt fa-sm fa-fw me-2 text-gray-400"></i>&nbsp;Deconnection</a>
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
    <script src="<?php echo base_url('assets/bootstrap/js/bootstrap.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/theme.js'); ?>"></script>
</body>

</html>