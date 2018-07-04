let alerts = {

    mostrarAlertCarregamento: function () {

        swal({
            title: 'Processando',
            text: 'Por favor, aguarde',
            icon: 'info',
            button: false,
            closeModal: false,
            closeOnEsc: false,
            closeOnClickOutside: false
        });
    },
    mostrarAlertConfirmacao: function (titulo, subtitulo, funcao) {

        swal({
            title: titulo,
            text: subtitulo,
            icon: 'warning',
            closeModal: false,
            closeOnEsc: false,
            closeOnClickOutside: false,
            buttons: {
                confirm: 'Confirmar',
                cancel: 'Cancelar'
            }
        }).then(function (confirmacao) {

            if(confirmacao) {

                funcao();
            }
            else {
            }
        });
    },
    mostrarAlertGenerico: function (titulo, subtitulo) {

        swal({
            title: titulo,
            text: subtitulo,
            icon: 'info',
            closeModal: false,
            closeOnEsc: false,
            closeOnClickOutside: false,
            buttons: {
                confirm: 'Fechar'
            }
        });
    },
    fecharAlert: function () {

        swal.close();
    }
};