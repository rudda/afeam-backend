angular.module('AtendenteModule').config(function ($stateProvider, $urlRouterProvider) {

    $stateProvider
        .state({
            name: 'clientes',
            url: '/clientes',
            templateUrl: 'app/templates/clientes.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/clientes.controller.js']);
                }]}
        })
        .state({
            name: 'relatorios',
            url: '/relatorios',
            templateUrl: 'app/templates/relatorios.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/relatorios.controller.js']);
                }]}
        })
        .state({
            name: 'novocliente',
            url: '/novo-cliente',
            templateUrl: 'app/templates/novo-cliente.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/novo-cliente.controller.js']);
                }]}
        })
        .state({
            name: 'editarcliente',
            url: '/editar-cliente/:id',
            templateUrl: 'app/templates/editar-cliente.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/editar-cliente.controller.js']);
                }]}
        })
        .state({
            name: 'meuperfil',
            url: '/meu-perfil',
            templateUrl: 'app/templates/meu-perfil.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/meu-perfil.controller.js']);
                }]}
        });

    $urlRouterProvider.otherwise('/clientes');
});