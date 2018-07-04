<!DOCTYPE html>
<html lang="pt-br" class="fullscreen-bg" ng-app="LoginModule">
<head>

    <meta charset="UTF-8">
    <meta name="theme-color" content="#F47A24">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>AFEAM :: Login</title>

    <!-- CSS -->

    <!-- Source Sans -->
    <link href="../assets/css/source-sans.css" rel="stylesheet">

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
<body ng-controller="LoginController as loginController" ng-cloak>

<div id="wrapper">
    <div class="vertical-align-wrap">
        <div class="vertical-align-middle">
            <div class="auth-box ">
                <div class="left">
                    <div class="content">
                        <div class="header">
                            <div class="logo text-center"><img src="../assets/img/logomarca-afeam-login.png" alt="Logomaca AFEAM"></div>
                            <p class="lead">Entre com as suas credenciais</p>
                        </div>
                        <form class="form-auth-small" ng-submit="loginController.login()">

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input id="cpf" class="form-control" type="text" placeholder="CPF" pattern="\d{3}\.\d{3}\.\d{3}-\d{2}" required ng-model="loginController.cpf" mask="999.999.999-99" mask-restrict="reject">
                            </div>

                            <div class="form-group input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                                <input id="senha" class="form-control" type="password" placeholder="Senha" required ng-model="loginController.senha">
                            </div>

                            <div class="form-group clearfix">
                                <label class="fancy-checkbox element-left">
                                    <input id="mantenha-me-conectado" type="checkbox" ng-model="loginController.mantenhaMeConectado">
                                    <span>Mantenha-me conectado</span>
                                </label>
                            </div>

                            <a class="text-success" href="" ng-click="loginController.recuperarSenha()"><i class="fa fa-lock"></i> Recuperar Senha</a>

                            <button type="submit" class="btn btn-success btn-block" ng-disabled="loginController.processandoLogin"><i class="fa fa-spinner fa-spin" ng-if="loginController.processandoLogin"></i> LOGIN </button>

                        </form>
                    </div>
                </div>
                <div class="right">
                    <div class="overlay"></div>
                    <div class="content text">
                        <h1 class="heading">AFEAM</h1>
                        <p>Agência de Fomento do Estado do Amazonas</p>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
</div>

<!-- JavaScript -->

<!-- jQuery -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>

<!-- Bootstrap -->
<script src="../node_modules/bootstrap/dist/js/bootstrap.min.js" type="text/javascript"></script>

<!-- Sweet Alert -->
<script src="../node_modules/sweetalert/dist/sweetalert.min.js" type="text/javascript"></script>

<!-- Toastr -->
<script src="../node_modules/toastr/build/toastr.min.js" type="text/javascript"></script>

<!-- AngularJS -->
<script src="../node_modules/angular/angular.min.js" type="text/javascript"></script>

<script src="../assets/js/cookies.js" type="text/javascript"></script>
<script src="../assets/js/klorofil-common.js" type="text/javascript"></script>
<script src="../assets/js/ngmask.min.js" type="text/javascript"></script>
<script src="../assets/js/alerts.js" type="text/javascript"></script>

<script src="app/modules/login.module.js" type="text/javascript"></script>
<script src="app/controllers/login.controller.js" type="text/javascript"></script>

</body>
</html>