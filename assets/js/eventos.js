document.addEventListener('DOMContentLoaded', function() {

    const botaoErro = document.getElementById('btn-corrigir-data');

    if (botaoErro) {
        botaoErro.addEventListener('click', function() {
            window.location.href = 'index.php';
        });
    }

});