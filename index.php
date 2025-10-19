<?php
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerador de Currículos Web</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    
    <link rel="stylesheet" href="../projeto-curriculo-web/estilos/style.css"> 
</head>
<body>

<header class="header-custom">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6">
                <h1 class="display-5 ms-3" style="font-weight: bold;">Currículo Já!</h1>
            </div>
            <div class="col-6 text-end">
                <nav class="nav justify-content-end me-3">
                    <a class="nav-link" href="#">Inicio</a>
                    <a class="nav-link" href="#">Modelos</a>
                    <a class="nav-link" href="#">Ajuda</a>
                </nav>
            </div>
        </div>
    </div>
</header>

<div class="container form-container">
    <h2 class="text-black mb-4">Insira seus dados para criar seu currículo</h2>

    <form action="curriculo.php" method="POST" class="row">

        <div class="col-md-5">
            <div class="card-bloco">
                <h4 class="mb-4">Dados Pessoais</h4>
                
                <label for="nome" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="nome" name="nome_completo" required>

                <label for="nascimento" class="form-label mt-3">Data de Nascimento</label>
                <input type="date" class="form-control" id="nascimento" name="data_nascimento" required>
                <input type="hidden" id="idade" name="idade">

                <label for="email" class="form-label mt-3">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
                
                <label for="linkedin" class="form-label mt-3">LinkedIn</label>
                <input type="text" class="form-control" id="linkedin" name="linkedin" autocomplete="no">

                <label for="github" class="form-label mt-3">GitHub</label>
                <input type="text" class="form-control" id="github" name="github" autocomplete="no">
            </div>
        </div>

        <div class="col-md-7">
            
            <div class="card-bloco">
                <h4 class="mb-4">Formação Acadêmica</h4>
                <div class="row g-3">
                    <div class="col-md-4">
                        <label for="nivel_formacao" class="form-label">Nível de Escolaridade</label>
                        <input type="text" class="form-control" id="nivel_formacao" name="formacao_nivel">
                    </div>
                    <div class="col-md-4">
                        <label for="instituicao" class="form-label">Instituição</label>
                        <input type="text" class="form-control" id="instituicao" name="formacao_instituicao">
                    </div>
                    <div class="col-md-4">
                        <label for="periodo_formacao" class="form-label">Período</label>
                        <input type="text" class="form-control" id="periodo_formacao" name="formacao_periodo">
                    </div>
                </div>
            </div>

            <div class="card-bloco">
                <h4 class="mb-4">Experiência Profissional</h4>
                
                <div id="experiencias-container">
                    
                    <div class="experiencia-item mb-4 p-3 border rounded" style="background-color: #f1f1f1; display: none;">
                        <button type="button" class="btn btn-danger btn-sm float-end remover-experiencia">X</button>
                        <h5 class="mb-3">Detalhes da Experiência</h5>
                        
                        <label class="form-label">Profissão Principal</label>
                        <select class="form-select mb-3 profissao-select" name="profissao_principal[]"> 
                            <option value="">Selecione uma opção</option>
                            <option value="Tecnologia">Tecnologia/TI</option>
                            <option value="Administracao">Administração/Negócios</option>
                            <option value="Saude">Saúde</option>
                            <option value="Educacao">Educação</option>
                            <option value="Outra">Outra (Preencher abaixo)</option>
                        </select>
                        
                        <div class="detalhes-experiencia" style="display: none;">
                            <label class="form-label mt-2">Cargo Específico</label>
                            <input type="text" class="form-control mb-3" name="cargo[]" placeholder="Ex: Desenvolvedor Full-Stack">
                            
                            <label class="form-label">Período (Ex: 2018 - 2022 ou 2023 - Atualmente)</label>
                            <input type="text" class="form-control" name="periodo[]">
                        </div>
                    </div>
                    </div>

                <button type="button" class="btn btn-adicionar w-100" id="adicionar-experiencia">
                    + Adicionar Experiência
                </button>
            </div>
        </div>
        
        <div class="col-12 text-center mt-4">
            <button type="submit" class="btn btn-lg btn-adicionar" style="background-color:#D9D9D9; border:2px solid #D9D9D9; color:#000000;">
            Gerar Currículo
            </button>
        </div>
    </form>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../projeto-curriculo-web/script/main.js"></script>

</body>
</html>