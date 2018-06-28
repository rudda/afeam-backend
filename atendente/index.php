<!DOCTYPE html>
<html lang="pt-br" ng-app="AtendenteModule">
<head>

    <meta charset="UTF-8">
    <meta name="theme-color" content="#F47A24">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>AFEAM :: Login</title>

    <!-- CSS -->

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">

    <!-- Linear Icons -->
    <link href="../assets/fontes/linear-icons/linear-icons.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="../node_modules/@fortawesome/fontawesome-free/css/all.css" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Toastr -->
    <link href="../node_modules/toastr/build/toastr.min.css" rel="stylesheet">

    <link href="../assets/css/main.css" rel="stylesheet">

    <!--[if IE]>
    <link href="../assets/img/favicon.ico" rel="shortcut icon">
    <![endif]-->
    <link href="../assets/img/favicon.png" rel="shortcut icon">

</head>
<body ng-controller="AtendenteController as atendenteController" ng-cloak>

<div id="wrapper">

    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="brand">
            <a href="#!/clientes"><img src="../assets/img/logomarca-afeam.png" alt="Logomarca AFEAM" class="img-responsive logo"></a>
        </div>
        <div class="container-fluid">
            <div class="navbar-btn">
                <button type="button" class="btn-toggle-fullwidth"><i class="lnr lnr-arrow-left-circle"></i></button>
            </div>
            <div id="navbar-menu">
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="" class="dropdown-toggle" data-toggle="dropdown"><img src="../assets/img/padrao.png" class="img-circle" alt="Foto de perfil"> <span>{{atendenteController.nomeCliente}}</span> <i class="icon-submenu lnr lnr-chevron-down"></i></a>
                        <ul class="dropdown-menu">
                            <li><a href=""><i class="lnr lnr-user"></i> <span>Minha conta</span></a></li>
                            <li><a href="" ng-click="atendenteController.logout()"><i class="lnr lnr-exit"></i> <span>Sair</span></a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div id="sidebar-nav" class="sidebar">
        <div class="sidebar-scroll">
            <nav>
                <ul class="nav">
                    <li><a ui-sref-active="active" ui-sref="home" href="#!/clientes"><i class="lnr lnr-users"></i> <span>Clientes</span></a></li>
                    <li><a ui-sref-active="active" ui-sref="entregas" href="#!/relatorios"><i class="lnr lnr-history"></i> <span>Relatórios</span></a></li>
                </ul>
            </nav>
        </div>
    </div>

    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <ui-view></ui-view>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- JavaScript -->

<!-- Font Awesome -->
<script src="../node_modules/@fortawesome/fontawesome-free/js/all.js" type="text/javascript"></script>

<!-- jQuery -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>

<!-- jQuery Slim Scroll -->
<script src="../node_modules/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Toastr -->
<script src="../node_modules/toastr/build/toastr.min.js" type="text/javascript"></script>

<!-- AngularJS -->
<script src="../node_modules/angular/angular.min.js" type="text/javascript"></script>

<!-- ui-router -->
<script src="../node_modules/@uirouter/angularjs/release/angular-ui-router.min.js" type="text/javascript"></script>

<!-- OC Lazy Load -->
<script src="../node_modules/oclazyload/dist/ocLazyLoad.min.js" type="text/javascript"></script>

<script src="../assets/js/cookies.js" type="text/javascript"></script>
<script src="../assets/js/klorofil-common.js" type="text/javascript"></script>
<script src="../assets/js/ngmask.min.js" type="text/javascript"></script>
<script src="../assets/js/alerts.js" type="text/javascript"></script>

<script src="app/modules/atendente.module.js" type="text/javascript"></script>
<script src="app/controllers/atendente.controller.js" type="text/javascript"></script>
<script src="app/config/atendente.config.js" type="text/javascript"></script>

</body>
</html>