angular.module('AtendenteModule').controller('NovoAdministradorController', NovoAdministradorController);

function NovoAdministradorController($http) {

    let nac = this;
    nac['tiposAdministrador'] = [
        {nome: 'Administrador', codigo: 1},
        {nome: 'Atendente', codigo: 2}
    ];
    nac['tipo'] = nac['tiposAdministrador'][0]['codigo'];

    nac.novoAdministrador = function () {

        if(nac['senha'] !== nac['confirmarSenha']) toastr.error('Senhas incompatíveis', 'Erro');
        else {

            alerts.mostrarAlertCarregamento();

            $http({
                method: 'POST',
                url: '../api/v1/atendentes/new',
                data: JSON.stringify({
                    'nome': nac['nome'],
                    'cpf': nac['cpf'].replace(/\./g, '').replace('-', ''),
                    'email': nac['email'],
                    'senha': nac['senha'],
                    'tipo': nac['tipo']
                })
            }).then(function (dados) {

                if(dados['data']) {

                    toastr.success('Usuário cadastrado', 'Sucesso');

                    document.location.href = '#!/administradores';
                }
                else toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }, function () {

                toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }).finally(function () {

                alerts.fecharAlert();
            });
        }
    };
}