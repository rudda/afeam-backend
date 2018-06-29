angular.module('AtendenteModule').controller('AtendenteController', AtendenteController);

function AtendenteController() {

    let ac = this;
    ac.nomeCliente = docCookies.getItem('nome');

    ac.logout = function () {

        docCookies.removeItem('id', '/');
        docCookies.removeItem('nome', '/');
        docCookies.removeItem('tipo', '/');

        document.location.href = '../login';
    }
}