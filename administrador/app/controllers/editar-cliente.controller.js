angular.module('AtendenteModule').controller('EditarClienteController', EditarClienteController);

function EditarClienteController($http, $stateParams) {

    let ecc = this;
    ecc['cliente'] = {};
    ecc['ufs'] = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
    ecc['situacoesDisponiveis'] = [
        {nome: 'Análise de Documento', codigo: '1'},
        {nome: 'Pesquisa Cadastral', codigo: '2'},
        {nome: 'Visita Técnica', codigo: '3'},
        {nome: 'Assinatura de Contrato', codigo: '4'},
        {nome: 'Liberação', codigo: '5'}
    ];
    ecc['statusDisponiveis'] = [
        {nome: 'Em Processo', codigo: '1'},
        {nome: 'Deferido', codigo: '2'},
        {nome: 'Indeferido', codigo: '3'}
    ];

    ecc.carregarCliente = function () {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'GET',
            url: '../api/v1/clientes/' + $stateParams['id']
        }).then(function (dados) {

            try {

                ecc['cliente'] = dados['data'];
            }
            catch (excecao) {

                toastr.error('Não há clientes/Erro ao processr solicitação', 'Sem clientes/Erro');
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            alerts.fecharAlert();
        });
    };

    ecc.editarCliente = function() {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'POST',
            url: '../api/v1/clientes/update/' + ecc['cliente']['id_cliente'],
            data: JSON.stringify({
                'nome': ecc['cliente']['nome'],
                'cpf': ecc['cliente']['cpf'].replace(/\./g, '').replace('-', ''),
                'telefone': ecc['cliente']['telefone'],
                'situacao': ecc['cliente']['situacao'],
                'status': ecc['cliente']['status'],
                'logradouro': ecc['cliente']['logradouro'],
                'numero': ecc['cliente']['numero'],
                'bairro': ecc['cliente']['bairro'],
                'cidade': ecc['cliente']['cidade'],
                'uf': ecc['cliente']['uf'],
                'obs': ecc['cliente']['obs']
            })
        }).then(function (dados) {

            toastr.success('Edição concluída', 'Sucesso');

            document.location.href = '#!/clientes';

        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            alerts.fecharAlert();
        });
    };

    ecc.carregarCliente();
}