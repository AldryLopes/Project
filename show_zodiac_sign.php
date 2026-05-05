<?php include('layout/header.php'); ?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Consulta de Signos</title>
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<?php
if (!isset($_POST['data_nascimento'])) {
echo "Por favor, insira uma data.";
exit;
}

$data_nasc_inserida = $_POST['data_nascimento'];
$signos = simplexml_load_file("signos.xml");

$data_nascimento = new DateTime($data_nasc_inserida);
$data_nascimento->setTime(0, 0, 0);
$ano_nasc = (int)$data_nascimento->format('Y');

$signo_encontrado = null;

foreach ($signos->signo as $signo) {
// Extrai dia e mês do XML (formato d/m)
$dia_mes_inicio = explode('/', (string)$signo->dataInicio);
$dia_mes_fim = explode('/', (string)$signo->dataFim);

// Cria objetos de data baseados no ano de nascimento do usuário
$data_inicio = new DateTime();
$data_inicio->setDate($ano_nasc, (int)$dia_mes_inicio[1], (int)$dia_mes_inicio[0]);
$data_inicio->setTime(0, 0, 0);

$data_fim = new DateTime();
$data_fim->setDate($ano_nasc, (int)$dia_mes_fim[1], (int)$dia_mes_fim[0]);
$data_fim->setTime(0, 0, 0);

// Ajuste para signos que cruzam o ano (Ex: Capricórnio 22/12 a 19/01)
if ($data_inicio > $data_fim) {
if ($data_nascimento >= $data_inicio) {
$data_fim->modify('+1 year');
} else {
$data_inicio->modify('-1 year');
}
}

if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
$signo_encontrado = $signo;
break;
}
}

if ($signo_encontrado) {
$nome = (string)$signo_encontrado->signoNome;
$descricao = (string)$signo_encontrado->descricao;
// Definição de frases e imagens baseadas no nome
$frases = [
"ÁRIES" => "Coragem, determinação e liderança natural",
"TOURO" => "Persistência, sensorialidade, e busca por segurança",
"GÊMEOS" => "Curiosidade, adaptabilidade, e comunicação",
"CÂNCER" => "Sensibilidade, instinto protetor, e forte ligação emocional",
"LEÃO" => "Criatividade, autoconfiança, e brilho próprio",
"VIRGEM" => "Organização, atenção aos detalhes, prestatividade",
"LIBRA" => "Diplomacia, senso de justiça, e busca pelo equilíbrio",
"ESCORPIÃO" => "Intensidade, transformação, e mistério",
"SAGITÁRIO" => "Otimismo, liberdade, e sede de conhecimento",
"CAPRICÓRNIO" => "Ambição, disciplina, e foco no longo prazo",
"AQUÁRIO" => "Originalidade, independência e visão de futuro",
"PEIXES" => "Empatia, espiritualidade e sensibilidade artística"
];

$imagem = strtolower(str_replace(['Á', 'Ê', 'Õ', 'Í'], ['A', 'E', 'O', 'I'], $nome)) . ".jpeg";

echo "<div class='mostrar-signo'>";
echo "<h1>{$nome}</h1>";
echo "<p class='subtitulo-signo'>{$frases[$nome]}</p>";
echo "<p class='descricao-signo'>{$descricao}</p>";
echo "<img src='assets/imgs/{$imagem}' alt='{$nome}'>";
echo "</div>";
} else {
echo "<div class='retornar'>";
echo "<h1>Signo inexistente!</h1>";
echo "<button onclick=\"window.location.href='index.php'\" id='btn-corrigir-data'>Página Inicial</button>";
echo "</div>";
}
?>
<script src="assets/js/eventos.js"></script>
</body>
</html>