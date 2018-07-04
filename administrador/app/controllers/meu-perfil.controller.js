angular.module('AtendenteModule').controller('MeuPerfilController', MeuPerfilController);

function MeuPerfilController($http) {

    let mpc = this;
    mpc['usuario'] = {};

    mpc.carregarUsuario = function () {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'GET',
            url: '../api/v1/atendentes/' + docCookies.getItem('id')
        }).then(function (dados) {

            try {

                mpc['usuario'] = dados['data'];
            }
            catch (excecao) {

                toastr.error('Erro ao carregar seus dados', 'Erro');
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            alerts.fecharAlert();
        });
    };

    mpc.carregarTipo = function (tipo) {

        switch (tipo) {

            case '1':
                return 'Administrador';
            case '2':
                return 'Atendente';
            default:
                return 'Desconhecido';
        }
    };

    mpc.carregarUsuario();
}