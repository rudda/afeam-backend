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

            try {

                docCookies.setItem('id', dados['data']['id_usuario'], null, '/');
                docCookies.setItem('nome', dados['data']['nome'], null, '/');
                docCookies.setItem('tipo', dados['data']['tipo'], null, '/');

                if(dados['data']['tipo'] === '1') document.location.href = '../administrador';
                else document.location.href = '../atendente';
            }
            catch (excecao) {

                toastr.error('Não foi possível processar sua solicitação/Credenciais incorretas', 'Ocorreu um erro');
            }
        }, function () {

            toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
        }).finally(function () {

            lc['processandoLogin'] = false;
        });
    };

    lc.recuperarSenha = function () {

        if(lc['cpf'] === '' || lc['cpf'] === undefined) {

            toastr.error('Informe o seu CPF para recuperação de senha');
            document.getElementById('cpf').focus();
        }
        else {

            alerts.mostrarAlertCarregamento();

            $http({
                method: 'POST',
                url: '../api/v1/usuarios/recuperar/' + lc['cpf'].replace(/\./g, '').replace('-', ''),
            }).then(function (dados) {

                try {

                    alerts.mostrarAlertGenerico('Recuperação de senha', 'Sua senha é ' + dados['data']['senha']);
                }
                catch (excecao) {

                    toastr.error('Não foi possível processar sua solicitação/CPF inválido', 'Ocorreu um erro');
                }
            }, function () {

                toastr.error('Não foi possível processar sua solicitação', 'Ocorreu um erro');
            }).finally(function () {

                alerts.fecharAlert();
            });
        }
    };
}