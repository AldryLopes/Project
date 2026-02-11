<?php
// 1. Só processa se o formulário for enviado via POST
if ($_SERVER == "POST" && isset($_POST['data_nascimento'])) {
    
    $data_nascimento_raw = $_POST['data_nascimento'];
    $signos = simplexml_load_file("signos.xml");

    if (!$signos) {
        echo "<p style='color: white;'>Erro ao carregar o arquivo de signos.</p>";
        exit;
    }

    $data_nascimento = new DateTime($data_nascimento_raw);
    $signos_encontrado = false;

    foreach ($signos->signo as $signo) {
        $data_inicio = DateTime::createFromFormat('d/m', (string)$signo->dataInicio);
        $data_fim = DateTime::createFromFormat('d/m', (string)$signo->dataFim);

        // Ajusta o ano para o ano de nascimento para comparação correta
        $data_inicio->setDate($data_nascimento->format('Y'), $data_inicio->format('m'), $data_inicio->format('d'));
        $data_fim->setDate($data_nascimento->format('Y'), $data_fim->format('m'), $data_fim->format('d'));

        // Caso especial para signos que viram o ano (ex: Capricórnio)
        if ($data_inicio > $data_fim) {
            $data_fim->modify('+1 year');
        }

        if ($data_nascimento >= $data_inicio && $data_nascimento <= $data_fim) {
            echo "<h1 style='color: #489bcf; text-align: center;'>{$signo->signoNome}</h1>";
            echo "<p style='color: white; text-align: center;'>{$signo->descricao}</p>";
            $signos_encontrado = true;
            break;
        }
    }

    // Só mostra o erro se tentou procurar e não achou
    if (!$signos_encontrado) {
        echo '<p style="color: white; text-align: center;">Signo não identificado. Tente outra data.</p>';
    }
}
?>