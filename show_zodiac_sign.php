<?php include('layout/header.php');?>

<?php

echo '<body style="background: linear-gradient(135deg, #000f2b 0%, #13576e 50%, #489bcf 100%);
margin: 0; 
display: flex; 
flex-direction: column;
align-items: center; 
font-family: \'Segoe UI\', Tahoma, Geneva, Verdana, sans-serif; 
min-height: 100vh;
justify-content:center;
max-width: 400px; 
width: 90%;




   text-align: justify;   /* Justifica o texto */
    text-justify: inter-word; /* Melhora o espaçamento entre palavras */
    max-width: 80%;        /* Evita que o texto encoste nas bordas do card */
    margin: 0 auto;        /* Centraliza o bloco do parágrafo no meio da tela */
    line-height: 1.6;      /* Melhora a leitura aumentando o espaço entre linhas */

">'
?>

 <?php


$data_nasc_inserida = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");

$data_nascimento = new DateTime($data_nasc_inserida);
$signo_encontrado = false;

foreach ($signos ->signo as $signo) {
    $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
    $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);


    $data_inicio->setDate($data_nascimento->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
    $data_fim->setDate($data_nascimento->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

    $ano = $data_nascimento->format('Y');//INSERIDO PARA TESTAR

    $data_inicio->setDate($ano, $data_inicio->format('m'), $data_inicio->format('d'));//INSERIDO PARA TESTAR
    $data_fim->setDate($ano, $data_fim->format('m'), $data_fim->format('d'));//INSERIDO PARA TESTAR



    if ($data_inicio > $data_fim){
        $data_fim->modify('+1 year');
        
        

        if ($data_nascimento < $data_inicio || $data_nascimento > $data_fim){
             $signo_encontrado = true;
        }
    }

    if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim){
        echo "<h1 style = 'color: #E3B448; fmax-width: 400px'>{$signo->signoNome}</h1>";
        
        echo "<p style = 'color: white; font-size:1.8rem;'>{$signo->descricao}</p>";
        $signo_encontrado = true;

        

    switch ($signo->signoNome) {
    case "ÁRIES":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Coragem, determinação e liderança natural</p>";
        echo "<img src='assets/imgs/aries.jpeg' alt='Descrição da Imagem'>";
        break;

    case "TOURO":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Persistência, sensorialidade, e busca por segurança.</p>";
        echo "<img src='assets/imgs/touro.jpeg' alt='Descrição da Imagem'>";
        break;

    case "GÊMEOS":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Curiosidade, adaptabilidade, e comunicação.</p>";
        echo "<img src='assets/imgs/gemeos.jpeg' alt='Descrição da Imagem'>";
        break;

    case "CÂNCER":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Sensibilidade, instinto protetor, e forte ligação emocional.</p>";
        echo "<img src='assets/imgs/cancer.jpeg' alt='Descrição da Imagem'>";
        break;

    case "LEÃO":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Criatividade, autoconfiança, e brilho próprio.</p>";
        echo "<img src='assets/imgs/leao.jpeg' alt='Descrição da Imagem'>";
        break;

    case "VIRGEM":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Organização, atenção aos detalhes, prestatividade.</p>";
        echo "<img src='assets/imgs/virgem.jpeg' alt='Descrição da Imagem'>";
        break;

    case "LIBRA":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Diplomacia, senso de justiça, e busca pelo equilíbrio.</p>";
        echo "<img src='assets/imgs/libra.jpeg' alt='Descrição da Imagem'>";
        break;

    case "ESCORPIÃO":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Intensidade, transformação, e mistério.</p>";
        echo "<img src='assets/imgs/escorpiao.jpeg' alt='Descrição da Imagem'>";
        break;

    case "SAGITÁRIO":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Otimismo, liberdade, e sede de conhecimento.</p>";
        echo "<img src='assets/imgs/sagitario.jpeg' alt='Descrição da Imagem'>";
        break;

    case "CAPRICÓRNIO":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Ambição, disciplina, e foco no longo prazo.</p>";
        echo "<img src='assets/imgs/capricornio.jpeg' alt='Descrição da Imagem'>";
        break;

    case "AQUÁRIO":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Originalidade, independência e visão de futuro.</p>";
        echo "<img src='assets/imgs/aquario.jpeg' alt='Descrição da Imagem'>";
        break;

    case "PEIXES":
        echo "<p style = 'font-weight:bold; font-size:1.5rem; color: RGB(219, 203, 183); '> Empatia, espiritualidade e sensibilidade artística.</p>";
        echo "<img src='assets/imgs/peixes.jpeg' alt='Descrição da Imagem'>";
        break;



    default:
        echo "Signo inexistente.";
        break;

}



        break;
    }
}    

if (!$signo_encontrado) {
    echo "<h1 style='color: white;'>Sígno não identificado, verifique a data informada</h1>";

 

    
    // Apenas o HTML do botão
    echo "<button id='btn-corrigir-data' style='display: block;  padding: 15px; font-size: 25px; margin-top: 15px; cursor: pointer; width: 400px;border: none;border-radius: 5px;'>Voltar</button>";
    
}

?>

<script src="assets/js/eventos.js"></script>








