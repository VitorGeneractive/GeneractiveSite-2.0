<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET');
header('Access-Control-Allow-Headers: Content-Type');

// Caminho do arquivo JSON
$jsonFile = 'cms_content.json';

// Verifica se o arquivo existe
if (file_exists($jsonFile)) {
    // Lê o arquivo JSON
    $jsonContent = file_get_contents($jsonFile);
    $data = json_decode($jsonContent, true);
    
    if ($data !== null) {
        echo json_encode(['success' => true, 'data' => $data]);
    } else {
        echo json_encode(['success' => false, 'error' => 'Erro ao ler JSON']);
    }
} else {
    // Arquivo não existe, retorna dados vazios
    echo json_encode(['success' => true, 'data' => []]);
}
?>
