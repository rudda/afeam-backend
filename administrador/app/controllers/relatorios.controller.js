angular.module('AtendenteModule').controller('RelatoriosController', RelatoriosController);

function RelatoriosController($http) {

    let rc = this;
    rc['tipos'] = [
        {nome: 'Clientes AFEAM', codigo: 0},
        {nome: 'Clientes em Processo', codigo: 1},
        {nome: 'Clientes Deferidos', codigo: 2},
        {nome: 'Clientes Indeferidos', codigo: 3}
    ];
    rc['tipo'] = rc['tipos'][0]['codigo'];
    rc['meses'] = [
        {nome: 'Janeiro', codigo: '01'},
        {nome: 'Fevereiro', codigo: '02'},
        {nome: 'Março', codigo: '03'},
        {nome: 'Abril', codigo: '04'},
        {nome: 'Maio', codigo: '05'},
        {nome: 'Junho', codigo: '06'},
        {nome: 'Julho', codigo: '07'},
        {nome: 'Agosto', codigo: '08'},
        {nome: 'Setembro', codigo: '09'},
        {nome: 'Outubro', codigo: '10'},
        {nome: 'Novembro', codigo: '11'},
        {nome: 'Dezembro', codigo: '12'}
    ];
    rc['mes'] = rc['meses'][0]['codigo'];
    let dataAtual = new Date();
    rc['ano'] = dataAtual.getFullYear();

    rc.gerarRelatorio = function () {

        if(rc['ano'] === '' || rc['ano'] === undefined || rc['ano'] === null) toastr.error('Informe o ano', 'Campo pendente');
        else {

            alerts.mostrarAlertCarregamento();

            $http({
                method: 'GET',
                url: '../api/v1/relatorios/' + rc['tipo'] + '/' + rc['mes'] + '/' + rc['ano'],
                responseType: 'arraybuffer'
            }).then(function (dados) {

                try {

                    let blob = new Blob([dados['data']], {type: "application/pdf"});
                    let objectUrl = URL.createObjectURL(blob);
                    window.open(objectUrl);

                    toastr.success('Relatório gerado', 'Sucesso');
                }
                catch (excecao) {

                    toastr.error('Não há registros no período selecionado', 'Sem dados');
                }
            }, function () {

                toastr.error('Não há registros no período selecionado', 'Sem dados');
            }).finally(function () {

                alerts.fecharAlert();
            });
        }
    }
}