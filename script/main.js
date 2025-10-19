
$(document).ready(function() {
    
    // =======================================================
    // 1. CÁLCULO AUTOMÁTICO DA IDADE
    // =======================================================
    $('#nascimento').on('change', function() {
        var dataNascimento = $(this).val(); 
        if (dataNascimento) {
            var hoje = new Date();
            var nascimento = new Date(dataNascimento);
            
            var idade = hoje.getFullYear() - nascimento.getFullYear();
            var mes = hoje.getMonth() - nascimento.getMonth();

            if (mes < 0 || (mes === 0 && hoje.getDate() < nascimento.getDate())) {
                idade--;
            }
            $('#idade').val(idade); 
        } else {
            $('#idade').val('');
        }
    });

    // 2. CAMPOS DINÂMICOS (Experiência Profissional)
    
    // 2.1. Configuração Inicial e Modelo
    // Clona o item modelo. Ele JÁ está com display: none no HTML.
    var $modeloExperiencia = $('.experiencia-item').first().clone();
    
    // 2.2. Função de Adicionar Experiência
    $('#adicionar-experiencia').on('click', function() {
        
        // 1. Clona o modelo
        var $novoItem = $modeloExperiencia.clone();
        
        // 2. Limpa os valores e garante que os detalhes estão ocultos
        $novoItem.find('input').val('');
        $novoItem.find('.profissao-select').val(''); // Reseta o select
        $novoItem.find('.detalhes-experiencia').hide(); // Garante que os detalhes estão ocultos

        // 3. Torna o novo item visível e adiciona
        $novoItem.show(); 
        $('#experiencias-container').append($novoItem);
    });
    
    // 2.3. Função de Remover Experiência (Delegação de eventos)
    $('#experiencias-container').on('click', '.remover-experiencia', function() {
        $(this).closest('.experiencia-item').remove();
    });
    
    // 2.4. Lógica de Seleção de Profissão (Mostra campos Cargo/Período) - DELEGAÇÃO!
    // Usei o #experiencias-container para escutar eventos de mudança nos .profissao-select
    $('#experiencias-container').on('change', '.profissao-select', function() {
        var $itemPai = $(this).closest('.experiencia-item');
        var $detalhes = $itemPai.find('.detalhes-experiencia');

        if ($(this).val()) { 
            $detalhes.slideDown(); 
        } else {
            $detalhes.slideUp(); 
        }
    });
    
});