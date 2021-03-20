$(document).ready(function() {

    $('select').on('change', function() {
        if ($('#rm').css('display') == 'none') {
            $('img').attr('src', 'recursos/img/alunos.png')
            $('#rm').show(490)
            $('#email').hide()
            $('#email').prop('disabled', true)
            $('#rm').prop('disabled', false)
            $('#email').val('')
        } else {
            $('img').attr('src', 'recursos/img/masters.png')
            $('#rm').hide()
            $('#email').show(490)
            $('#email').prop('disabled', false)
            $('#rm').prop('disabled', true)
            $('#rm').val('')
        }
    })

    $('#rm').mask('00000')
    $('.link-cadastro').click(function() {
        $(location).attr('href', 'index.php')
    })
    $('.btn-mostrar-senha').click(function() {
        var amostragem = $('#senha').prop('type')
        if (amostragem == 'password') {
            $('#senha').prop('type', 'text')
            amostragem = $('#senha').prop('type')
        } else {
            $('#senha').prop('type', 'password')
            amostragem = $('#senha').prop('type')
        }
    })
    $('.btn-cadastrar').click(function(e) {
        e.preventDefault()

        var dados = $('#form-cadastro').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'src/usuario/modelo/cadastro.php',
            async: true,
            data: dados,
            success: function(dados) {
                Swal.fire({
                    icon: dados.icone,
                    html: '<h2 style="color:white;">' + dados.mensagem + '</h2>',
                    background: 'rgb(64, 64, 64)'
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