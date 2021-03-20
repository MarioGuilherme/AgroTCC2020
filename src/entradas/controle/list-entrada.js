$(document).ready(function() {

    $('#tabela-entrada').DataTable({
        "processing": true,
        "serverSide": true,
        "pageLength": 25,
        "lengthMenu": [25],
        "language": {
            "url": "recursos/DataTable/dataTables.brazil.json"
        },
        "ajax": {
            "url": 'src/entradas/modelo/list-entrada.php',
            "type": "POST"
        },
        "columns": [{
                "data": "id_entrada",
                "className": 'text-center'
            },
            {
                "data": "responsavel",
                "className": 'text-center'
            },
            {
                "data": "data_entrada",
                "className": 'text-center'
            },
            {
                "data": "quantidade",
                "className": 'text-center'
            },
            {
                "data": "custo",
                "className": 'text-center'
            },
            {
                "data": "pacotes",
                "className": 'text-center'
            }
        ]
    })

})