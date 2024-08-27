function exibirMensagem(mensagem, tipo) {
    const alerta = $(`
        <div class="alert alert-${tipo} alert-dismissible fade show" role="alert">
            ${mensagem}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    `);

    $('#mensagens').append(alerta);

    setTimeout(() => {
        alerta.alert('close');
    }, 5000);
}

function mostrarSpinner() {
    $('#spinner').removeClass('d-none');
}

function esconderSpinner() {
    setTimeout(() => {
        $('#spinner').addClass('d-none');
    }, 500);
}