$(document).ready(function() {

    // $.ajax({
    //     dataType: 'json',
    //     url: 'src/usuario/modelo/seguranca.php',
    //     success: function(dados) {
    //         if (dados.logado == 'não') {
    //             var boas_ferias = 'sim'
    //         }else {
    //             if (dados.tipo_user == 'alunos') {
    //                 $('.btn-add-e-peps, .btn-add-s-peps').remove()
    //             }
    //             $('.user-name').empty()
    //             $('.user-name').append('Nome: ', dados.nome)
    //             $('.user-rm-cpf').empty()
    //             if (dados.tipo_user == 'alunos') {
    //                 $('.user-rm-cpf').append('RM: ', dados.rm)
    //             } else {
    //                 $('.user-rm-cpf').append('CPF: ', dados.cpf)
    //             }
    //         }
    //     }
    // });

    $('.btn-sair').click(function() {
        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'src/usuario/modelo/logout.php',
            async: true,
        })
        $(location).attr('href', 'index.php')
    })

    $('.btn-estatisticas').click(function() {
        $(location).attr('href', 'menu.php')
    })
    $('.btn-add-e-peps').click(function() {
        $(location).attr('href', 'cadastro-entrada.php')
    })
    $('.btn-add-s-peps').click(function() {
        $(location).attr('href', 'cadastro-saida.php')
    })
    $('.btn-tabela').click(function() {
        $(location).attr('href', 'tabelas.php')
    })

})