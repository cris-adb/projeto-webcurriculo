<?php
// Recebimento e Saneamento dos Dados
$nomeCompleto = $_POST['nome_completo'] ?? 'N/A';
$dataNascimentoISO = $_POST['data_nascimento'] ?? '';
$dataNascimento = 'N/A'; // Valor padrão para caso não haja data

if (!empty($dataNascimentoISO)) {
    // Tentei criar um objeto DateTime a partir do formato YYYY-MM-DD
    $dataObj = DateTime::createFromFormat('Y-m-d', $dataNascimentoISO);
    

    if ($dataObj) {
        // Formatando para o padrão brasileiro DD/MM/YYYY
        $dataNascimento = $dataObj->format('d/m/Y');
    }
}
$idade = $_POST['idade'] ?? 'N/A';
$email = $_POST['email'] ?? 'N/A';
$github = $_POST['github'] ?? 'N/A';
$linkedin = $_POST['linkedin'] ?? 'N/A';

$formacaoNivel = $_POST['formacao_nivel'] ?? 'N/A';
$formacaoInstituicao = $_POST['formacao_instituicao'] ?? 'N/A';
$formacaoPeriodo = $_POST['formacao_periodo'] ?? 'N/A';

// Recebe os arrays de experiência
$profissaoPrincipal = $_POST['profissao_principal'] ?? [];
$cargos = $_POST['cargo'] ?? [];
$periodos = $_POST['periodo'] ?? [];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currículo Gerado</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <link rel="stylesheet" href="../projeto-curriculo-web/estilos/style.css"> 
</head>
<body>

<header class="header-custom no-print">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6">
                <h1 class="display-5 ms-3" style="font-weight: bold;">Currículo Já!</h1>
            </div>
            <div class="col-6 text-end">
                <button onclick="window.print()" class="btn btn-success btn-download-pdf me-2">Download PDF</button>
                <a href="index.php" class="btn btn-warning btn-voltar me-3">Voltar</a>
            </div>
        </div>
    </div>
</header>

<div class="container my-5 cv-body" style="max-width: 850px;">

    <div class="text-center pb-3 mb-4 border-bottom border-secondary">
        <h1 class="display-4" style="color: #737BB2;"><?php echo htmlspecialchars($nomeCompleto); ?></h1>
        <p class="lead mb-1">
            Email: <?php echo htmlspecialchars($email); ?> | Data de Nascimento: <?php echo htmlspecialchars($dataNascimento); ?> (<?php echo htmlspecialchars($idade); ?> anos)
        </p>
        <p>
            GitHub: <a href="<?php echo htmlspecialchars($github); ?>" target="_blank" class="text-dark me-3"><?php echo htmlspecialchars($github); ?></a>
            LinkedIn: <a href="<?php echo htmlspecialchars($linkedin); ?>" target="_blank" class="text-dark"><?php echo htmlspecialchars($linkedin); ?></a>
        </p>
    </div>

    <h3 class="mb-3" style="color: #737373;">Formação Acadêmica</h3>
    <hr>
    <div class="mb-4">
        <p class="mb-1"><strong>Nível de Escolaridade:</strong> <?php echo htmlspecialchars($formacaoNivel); ?></p>
        <p class="mb-1"><strong>Instituição:</strong> <?php echo htmlspecialchars($formacaoInstituicao); ?></p>
        <p class="mb-1"><strong>Período:</strong> <?php echo htmlspecialchars($formacaoPeriodo); ?></p>
    </div>

    <h3 class="mb-3" style="color: #737373;">Experiência Profissional</h3>
    <hr>
    
    <?php if (!empty($cargos)): ?>
        <?php 
        // Usa o array de cargos como base para iterar
        foreach ($cargos as $key => $cargo): 
            $periodo = $periodos[$key] ?? 'Período Não Informado';
            $profissaoBase = $profissaoPrincipal[$key] ?? 'Não classificada';
            
            // Pula entradas completamente vazias
            if (empty($cargo) && empty($periodo)) continue;
        ?>
            <div class="mb-4 ps-3 border-start border-3 border-dark">
                <h4 class="mb-1"><?php echo htmlspecialchars($cargo); ?> (Profissão Base: <?php echo htmlspecialchars($profissaoBase); ?>)</h4>
                <p class="mb-1 text-muted"><?php echo htmlspecialchars($periodo); ?></p>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Nenhuma experiência profissional detalhada.</p>
    <?php endif; ?>

</div>

</body>
</html>