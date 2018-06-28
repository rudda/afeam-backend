angular.module('LoginModule').controller('LoginController', LoginController);

function LoginController($http) {

    let lc = this;
    lc['cpf'] = '';
    lc['senha'] = '';
    lc['mantenhaMeConectado'] = false;
    lc['processandoLogin'] = false;

    lc.login = function () {

        lc['processandoLogin'] = true;

        $http({
            method: 'POST',
            url: '../api/v1/usuarios/login/' + lc['cpf'].replace(/\./g, '').replace('-', '') + '/' + lc['senha'],
        }).then(function (dados) {

            console.log(dados['data']);
            return;

            try {

                if(dados['data']['status'] === 'sucesso') {

                    docCookies.setItem('id', dados['data']['dados']['id'], null, '/');
                    docCookies.setItem('nome', dados['data']['dados']['nome'], null, '/');
                    docCookies.setItem('tipo', dados['data']['dados']['tipo'], null, '/');

                    if(dados['data']['dados']['tipo'] === '1') document.location.href = '../administrador';
                    else document.location.href = '../atendente';
                }
                else if(dados['data']['status'] === 'falha') toastr.error(dados['data']['mensagem'], 'Dados incorretos');
                else toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }
            catch (excecao) {

                toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            lc['processandoLogin'] = false;
        });
    };
}