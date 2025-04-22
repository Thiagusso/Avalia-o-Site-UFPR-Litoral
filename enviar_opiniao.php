
<?php
$arquivo = 'respostas_opiniao.csv';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $publico = $_POST['publico'] ?? '';
    $avaliacao = $_POST['avaliacao'] ?? '';
    $navegacao = $_POST['navegacao'] ?? '';
    $facilidade_info = $_POST['facilidade_info'] ?? '';
    $sugestao = $_POST['sugestao'] ?? '';
    $consentimento = isset($_POST['consentimento']) ? 'Sim' : 'Não';

    $linha = [
        date('Y-m-d H:i:s'),
        $publico,
        $avaliacao,
        $navegacao,
        $facilidade_info,
        $sugestao,
        $consentimento
    ];

    $fp = fopen($arquivo, 'a');
    fputcsv($fp, $linha, ';');
    fclose($fp);

    echo "<h2 style='font-family: sans-serif;'>Obrigado por sua opinião!</h2>";
    echo "<a href='index.html'>Voltar para o formulário</a>";
} else {
    echo "Acesso inválido.";
}
?>
