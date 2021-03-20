$(document).ready(function() {
    $('#data_saida').mask('00/00/0000')
    $('.btn-add-saida').click(function(e) {
        e.preventDefault()

        var dados = $('#form-saida').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'src/saidas/modelo/add-saida.php',
            async: true,
            data: dados,
            success: function(dados) {
                Swal.fire({
                    icon: dados.icone,
                    html: '<h2 style="color:white; font-weight:bold;">' + dados.msg + '</h2>',
                    background: 'rgb(64, 64, 64)',
                })
                if (dados.icone == 'success') {
                    $('.btn-add-saida').attr('disabled', true)
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    Swal.fire({
                        icon: dados.icone,
                        html: '<h2 style="color:white; font-weight:bold;"">' + dados.msg + '</h2>',
                        background: 'rgb(64, 64, 64)',
                        showConfirmButton: false
                    })
                }
            }
        });
    })
})