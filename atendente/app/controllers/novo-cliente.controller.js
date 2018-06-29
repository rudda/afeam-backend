angular.module('AtendenteModule').controller('NovoClienteController', NovoClienteController);

function NovoClienteController() {

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

    };
}