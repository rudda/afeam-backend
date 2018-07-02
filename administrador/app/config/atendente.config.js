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
            name: 'administradores',
            url: '/administradores',
            templateUrl: 'app/templates/administradores.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/administradores.controller.js']);
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
            name: 'editaradministrador',
            url: '/editar-administrador/:id',
            templateUrl: 'app/templates/editar-administrador.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/editar-administrador.controller.js']);
                }]}
        });

    $urlRouterProvider.otherwise('/clientes');
});