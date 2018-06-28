angular.module('AtendenteModule').controller('AtendenteController', AtendenteController);

function AtendenteController($http) {

    let ac = this;
    ac.notificacoes = [];
    ac.nomeCliente = docCookies.getItem('nome');

    ac.logout = function () {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'GET',
            url: '../dev/api/v1/logout'
        }).then(function (dados) {

            try {

                if(true) { // Corrigir

                    docCookies.removeItem('clienteId', '/');
                    docCookies.removeItem('clienteNome', '/');
                    docCookies.removeItem('clienteLogomarca', '/');
                    docCookies.removeItem('creditosTotais', '/');
                    docCookies.removeItem('creditosDisponiveis', '/');
                    docCookies.removeItem('creditosBloqueados', '/');

                    document.location.href = '../login';
                }
                else if(dados['data']['code'] === 500) toastr.error(dados['data']['message'], 'Ocorreu um erro');
                else toastr.error('Sua solicitação retornou um código desconhecido', 'Ocorreu um erro');
            }
            catch (excecao) {

                toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            alerts.fecharAlert();
        });
    }
}