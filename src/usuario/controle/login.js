$(document).ready(function() {

    $('select').on('change', function() {
        if ($('#rm').css('display') == 'none') {
            $('img').attr('src', 'recursos/img/alunos.png')
            $('#rm').show(490)
            $('#nome').hide()
            $('#nome').prop('disabled', true)
            $('#rm').prop('disabled', false)
            $('#nome').val('')
        } else {
            $('img').attr('src', 'recursos/img/masters.png')
            $('#rm').hide()
            $('#nome').show(490)
            $('#nome').prop('disabled', false)
            $('#rm').prop('disabled', true)
            $('#rm').val('')
        }
    })
    $('#rm').mask('00000')
    $('.link-cadastro').click(function() {
        $(location).attr('href', 'cadastro.php')
    })
    $('.btn-mostrar-senha').click(function(e) {
        e.preventDefault()
        var amostragem = $('#senha').prop('type')
        if (amostragem == 'password') {
            $('#senha').prop('type', 'text')
            amostragem = $('#senha').prop('type')
        } else {
            $('#senha').prop('type', 'password')
            amostragem = $('#senha').prop('type')
        }
    })
    $('.btn-entrar').click(function(e) {
        e.preventDefault()

        var dados = $('#form-login').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'src/usuario/modelo/login.php',
            async: true,
            data: dados,
            success: function(dados) {
                Swal.fire({
                    icon: dados.icone,
                    html: '<h2 style="color:white;">' + dados.mensagem + '</h2>',
                    background: 'rgb(64, 64, 64)',
                    confirmButtonText: 'OK'
                })

                if (dados.icone == 'success') {
                    $('.input').val('')
                    setTimeout(() => {
                        $(location).attr('href', 'menu.php')
                    }, 1250);
                }
            }
        });
    })
})