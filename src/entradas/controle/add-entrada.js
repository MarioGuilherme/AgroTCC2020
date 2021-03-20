$(document).ready(function() {
    $('.btn-add-entrada').click(function(e) {

        e.preventDefault();

        var dados = $('#form-entrada').serialize();

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: 'src/entradas/modelo/add-entrada.php',
            async: true,
            data: dados,
            success: function(dados) {
                Swal.fire({
                    icon: dados.icone,
                    html: '<h2 style="color:white; font-weight:bold;">' + dados.msg + '</h2>',
                    background: 'rgb(64, 64, 64)',
                })
                if (dados.icone == 'success') {
                    $('.btn-add-entrada').attr('disabled', true)
                    setTimeout(() => {
                        location.reload();
                    }, 2000);
                    Swal.fire({
                        icon: dados.icone,
                        html: '<h2 style="color:white; font-weight:bold;"">' + dados.msg + '</h2>',
                        background: 'rgb(64, 64, 64)',
                    })
                }
            }
        });
    })
})