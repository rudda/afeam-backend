angular.module('AtendenteModule').controller('AdministradoresController', AdministradoresController);

function AdministradoresController($http) {

    let cc = this;
    cc['administradores'] = [];

    cc.carregarAdministradores = function () {

        alerts.mostrarAlertCarregamento();

        $http({
            method: 'GET',
            url: '../api/v1/atendentes'
        }).then(function (dados) {

            try {

                cc['administradores'] = dados['data'];
            }
            catch (excecao) {

                toastr.error('Não há administradores/Erro ao processr solicitação', 'Sem administradores/Erro');
                cc['administradores'] = [];
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            cc['administradores'] = [];
        }).finally(function () {

            alerts.fecharAlert();
        });
    };

    cc.excluirUsuario = function (id) {

        alerts.mostrarAlertConfirmacao('Confirmação', 'Deseja excluir este usuário?', function () {

            alerts.mostrarAlertCarregamento();

            $http({
                method: 'POST',
                url: '../api/v1/atendentes/delete/' + id
            }).then(function (dados) {

                toastr.success('Atendente excluído', 'Sucesso');

                cc.carregarAdministradores();

            }, function () {

                toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }).finally(function () {

                alerts.fecharAlert();
            });
        });
    };

    cc.carregarTipo = function (tipo) {

        switch (tipo) {

            case '1':
                return 'Administrador';
            case '2':
                return 'Atendente';
            default:
                return 'Desconhecido';
        }
    };

    cc.carregarAdministradores();
}