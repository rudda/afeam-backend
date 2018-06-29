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
            name: 'detalhesagendamento',
            url: '/detalhes-agendamento/:agendamentoId',
            templateUrl: 'app/templates/detalhes-agendamento.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/detalhes-agendamento.controller.js']);
                }]}
        });

    $urlRouterProvider.otherwise('/clientes');
});