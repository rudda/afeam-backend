angular.module('AtendenteModule').controller('ClientesController', ClientesController);

function ClientesController($http) {

    let cc = this;
    cc['clientes'] = [];
    cc['situacoesDisponiveis'] = [
        {nome: 'Análise de Documento', codigo: '1'},
        {nome: 'Pesquisa Cadastral', codigo: '2'},
        {nome: 'Visita Técnica', codigo: '3'},
        {nome: 'Assinatura de Contrato', codigo: '4'},
        {nome: 'Liberação', codigo: '5'}
    ];
    cc['statusDisponiveis'] = [
        {nome: 'Em Processo', codigo: '1'},
        {nome: 'Deferido', codigo: '2'},
        {nome: 'Indeferido', codigo: '3'}
    ];

    cc.carregarClientes = function () {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'GET',
            url: '../api/v1/clientes'
        }).then(function (dados) {

            console.log(dados['data']);

            try {

                cc['clientes'] = dados['data'];
            }
            catch (excecao) {

                toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
                cc['clientes'] = [];
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            cc['clientes'] = [];
        }).finally(function () {

            alerts.fecharAlert();
        });
    };

    cc.alterarSituacao = function(id, status) {

        console.log(id);
        console.log(status);
    };

    cc.alterarStatus = function(id, status) {

        console.log(id);
        console.log(status);
    };

    cc.carregarSituacao = function (status) {

        switch (status) {

            case '1':
                return 'Análise de Documento';
            case '2':
                return 'Pesquisa Cadastral';
            case '3':
                return 'Visita Técnica';
            case '4':
                return 'Assinatura de Contrato';
            case '5':
                return 'Liberação';
            default:
                return 'Desconhecida';
        }
    };

    cc.carregarStatus = function (status) {

        switch (status) {

            case '1':
                return 'Em processo';
            case '2':
                return 'Deferido';
            case '3':
                return 'Indeferido';
            default:
                return 'Desconhecido';
        }
    };
    
    cc.carregarClientes();
}