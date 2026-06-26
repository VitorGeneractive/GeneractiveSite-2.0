<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

// Caminho do arquivo JSON
$jsonFile = 'cms_content.json';

// Verifica se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém o JSON enviado
    $jsonInput = file_get_contents('php://input');
    $data = json_decode($jsonInput, true);
    
    if ($data === null) {
        echo json_encode(['success' => false, 'error' => 'JSON inválido']);
        exit;
    }
    
    // Salva no arquivo JSON
    $jsonOutput = json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
    
    if (file_put_contents($jsonFile, $jsonOutput)) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao salvar arquivo']);
    }
} else {
    echo json_encode(['success' => false, 'error' => 'Método não permitido']);
}
?>
