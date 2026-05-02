<?php include('layout/header.php');?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Consulta de Signos</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>

 <?php


$data_nasc_inserida = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");

$data_nascimento = new DateTime($data_nasc_inserida);
$data_nascimento->setTime(0, 0, 0);
$signo_encontrado = false;

foreach ($signos ->signo as $signo) {
    $partes_inicio = explode('/', (string)$signo->dataInicio);
    $partes_fim = explode('/', (string)$signo->dataFim);

    $ano_nasc = (int)$data_nascimento->format('Y');
    $mes_nasc = (int)$data_nascimento->format('m');

    $data_inicio = new DateTime();
    $data_inicio->setDate($ano_nasc, (int)$partes_inicio[1], (int)$partes_inicio[0]);
    $data_inicio->setTime(0, 0, 0);

    $data_fim = new DateTime();
    $data_fim->setDate($ano_nasc, (int)$partes_fim[1], (int)$partes_fim[0]);
    $data_fim->setTime(0, 0, 0);

    if ($data_inicio > $data_fim){
        if ($mes_nasc <= (int)$partes_fim[1]) {
            $data_inicio->modify('-1 year');
        } else {
            $data_fim->modify('+1 year');
        }
    }

     if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim){
            $signo_encontrado = true;
            

        
    switch ($signo->signoNome) {
        

    case "ÁRIES":

           echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '> Coragem, determinação e liderança natural</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/aries.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
                    
      
        break;

    case "TOURO":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '> Persistência, sensorialidade, e busca por segurança</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/touro.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
        break;

    case "GÊMEOS":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Curiosidade, adaptabilidade, e comunicação</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/gemeos.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
        break;

    case "CÂNCER":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Sensibilidade, instinto protetor, e forte ligação emocional</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/cancer.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
      
        break;

    case "LEÃO":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Criatividade, autoconfiança, e brilho próprio</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/leao.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
       
        break;

    case "VIRGEM":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Organização, atenção aos detalhes, prestatividade</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/virgem.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
       
        break;

    case "LIBRA":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Diplomacia, senso de justiça, e busca pelo equilíbrio</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/libra.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
       
        break;

    case "ESCORPIÃO":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Intensidade, transformação, e mistério</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/escorpiao.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
       
        break;

    case "SAGITÁRIO":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Otimismo, liberdade, e sede de conhecimento</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/sagitario.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
       
        break;

    case "CAPRICÓRNIO":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Ambição, disciplina, e foco no longo prazo</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/capricornio.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
        
        break;

    case "AQUÁRIO":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Originalidade, independência e visão de futuro</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/aquario.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
        break;

    case "PEIXES":
        echo "<div class='mostrar-signo'>";

        echo "<h1 '>{$signo->signoNome}</h1>";
               echo "<p style = 'font-weight:bold; 
               font-size:1.5rem; color: RGB(219, 203, 183); 
               text-align: justify;
                line-height: 1.6;
                margin-top: 8px;'
               '>Empatia, espiritualidade e sensibilidade artística</p>";

        
        echo "<p style = 'color: white; font-size:1.8rem;
        text-align: justify;
                line-height: 1.5;
                margin-top: 20px;
                  margin-bottom: 15px;'
        >{$signo->descricao}</p>";

        echo "<img src='assets/imgs/peixes.jpeg' alt='Descrição da Imagem'>";


echo "</div>";
        break;



    default:
        echo "Signo inexistente.";
        break;

}



        break;
    }
}    

if (!$signo_encontrado) {

echo "<div class='retornar'>";
echo "<h1 style='color: white; align-items: center; display: flex;
align-items: center;justify-content:center;max-width: 500px; 
'>Sígno inexistente!</h1>";        

  echo "<button id='btn-corrigir-data'>Página Inicial</button>";

echo "</div>";

    
}

?>

<script src="assets/js/eventos.js"></script>








