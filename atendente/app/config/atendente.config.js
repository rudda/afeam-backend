angular.module('AtendenteModule').config(function ($stateProvider, $urlRouterProvider) {

    $stateProvider
        .state({
            name: 'home',
            url: '/home',
            templateUrl: 'app/templates/home.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/home.controller.js']);
                }]}
        })
        .state({
            name: 'entregas',
            url: '/entregas',
            templateUrl: 'app/templates/entregas.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/entregas.controller.js']);
                }]}
        })
        .state({
            name: 'extrato',
            url: '/extrato',
            controller: 'ExtratoController',
            templateUrl: 'app/templates/extrato.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/extrato.controller.js']);
                }]}
        })
        .state({
            name: 'dados',
            url: '/dados',
            controller: 'DadosController',
            templateUrl: 'app/templates/dados.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/dados.controller.js']);
                }]}
        })
        .state({
            name: 'creditos',
            url: '/creditos',
            controller: 'CreditosController',
            templateUrl: 'app/templates/creditos.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/creditos.controller.js']);
                }]}
        })
        .state({
            name: 'contato',
            url: '/contato',
            controller: 'ContatoController',
            templateUrl: 'app/templates/contato.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/contato.controller.js']);
                }]}
        })
        .state({
            name: 'sobre',
            url: '/sobre',
            controller: 'SobreController',
            templateUrl: 'app/templates/sobre.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/sobre.controller.js']);
                }]}
        })
        .state({
            name: 'novoagendamento',
            url: '/novo-agendamento',
            templateUrl: 'app/templates/novo-agendamento.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/novo-agendamento.controller.js']);
                }]}
        })
        .state({
            name: 'associarentregadores',
            url: '/associar-entregadores/:agendamentoId',
            templateUrl: 'app/templates/associar-entregadores.template.html',
            resolve: {
                loader: ['$ocLazyLoad', function($ocLazyLoad) {
                    return $ocLazyLoad.load(['app/controllers/associar-entregadores.controller.js']);
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

    $urlRouterProvider.otherwise('/home');
});