document.addEventListener('DOMContentLoaded', function() {

    const botaoErro = document.getElementById('btn-corrigir-data');

        const textoGirar = document.getElementById('btn-corrigir-data');


    if (botaoErro) {
        botaoErro.addEventListener('click', function() {
            window.location.href = 'index.php';
        });
    }

});



const spanTexto = document.getElementById('texto-girar');
const botao = spanTexto.parentElement; // Pega o botão que envolve o span

botao.addEventListener('mouseover', () => {
    spanTexto.style.transition = "transform 0.5s ease-in-out";
    spanTexto.style.transform = "rotate(360deg)";
});

botao.addEventListener('mouseout', () => {
    spanTexto.style.transform = "rotate(0deg)";
});