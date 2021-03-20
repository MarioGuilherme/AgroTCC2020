$(document).ready(function() {

    $('#tabela-saida').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 25,
        "lengthMenu": [25],
        "language": {
            "url": "recursos/DataTable/dataTables.brazil.json"
        },
        "ajax": {
            "url": 'src/saidas/modelo/list-saida.php',
            "type": "POST"
        },
        "columns": [{
                "data": "id_saida",
                "className": 'text-center'
            },
            {
                "data": "responsavel",
                "className": 'text-center'
            },
            {
                "data": "data_saida",
                "className": 'text-center'
            },
            {
                "data": "quantidade",
                "className": 'text-center'
            },
            {
                "data": "pacotes",
                "className": 'text-center'
            }
        ]
    })

})