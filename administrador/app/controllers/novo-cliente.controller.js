angular.module('AtendenteModule').controller('NovoClienteController', NovoClienteController);

function NovoClienteController($http) {

    let ncc = this;
    ncc['ufs'] = ['AC', 'AL', 'AP', 'AM', 'BA', 'CE', 'DF', 'ES', 'GO', 'MA', 'MT', 'MS', 'MG', 'PA', 'PB', 'PR', 'PE', 'PI', 'RJ', 'RN', 'RS', 'RO', 'RR', 'SC', 'SP', 'SE', 'TO'];
    ncc['uf'] = ncc['ufs'][0];
    ncc['situacoesDisponiveis'] = [
        {nome: 'Análise de Documento', codigo: '1'},
        {nome: 'Pesquisa Cadastral', codigo: '2'},
        {nome: 'Visita Técnica', codigo: '3'},
        {nome: 'Assinatura de Contrato', codigo: '4'},
        {nome: 'Liberação', codigo: '5'}
    ];
    ncc['statusDisponiveis'] = [
        {nome: 'Em Processo', codigo: '1'},
        {nome: 'Deferido', codigo: '2'},
        {nome: 'Indeferido', codigo: '3'}
    ];
    ncc['situacao'] = ncc['situacoesDisponiveis'][0]['codigo'];
    ncc['status'] = ncc['statusDisponiveis'][0]['codigo'];

    ncc.novoCliente = function () {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'POST',
            url: '../api/v1/clientes/new',
            data: JSON.stringify({
                'nome': ncc['nome'],
                'cpf': ncc['cpf'].replace(/\./g, '').replace('-', ''),
                'telefone': ncc['telefone'],
                'situacao': ncc['situacao'],
                'status': ncc['status'],
                'logradouro': ncc['logradouro'],
                'numero': ncc['numero'],
                'bairro': ncc['bairro'],
                'cidade': ncc['cidade'],
                'uf': ncc['uf'],
                'obs': ncc['observacao']
            })
        }).then(function (dados) {

            if(dados['data']) {

                toastr.success('Cliente cadastrado', 'Sucesso');

                document.location.href = '#!/clientes';
            }
            else toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            alerts.fecharAlert();
        });
    };
}