<?php
header('Content-Type: application/json');
session_start();
require_once '../conexao.class.php'; 

if (!isset($_SESSION['usuario_id'])) {
    echo json_encode(['success' => false, 'error' => 'Usuário não autenticado']);
    exit;
}
if (!isset($_POST['nome']) || empty(trim($_POST['nome']))) {
    echo json_encode(['success' => false, 'error' => 'Nome obrigatório']);
    exit;
}

$conn = Conexao::conectar();

$usuario_id = $_SESSION['usuario_id'];
$nome = trim($_POST['nome']);
$data_hoje = date('Y-m-d');
$grau_sustentabilidade = 0;
$grau_porcentagem = 0.0;
$finalizado = 0;

try {
    $sql = "INSERT INTO avaliacoes (usuario_id, nome_propriedade, data_avaliacao, grau_sustentabilidade, grau_porcentagem, finalizado)
            VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        $usuario_id,
        $nome,
        $data_hoje,
        $grau_sustentabilidade,
        $grau_porcentagem,
        $finalizado
    ]);
    echo json_encode(['success' => true]);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'error' => 'Erro ao salvar avaliação: ' . $e->getMessage()]);
}
?>