
<?php

    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: index.php');
    }else if($_SESSION['tipoUser'] == 'alunos'){
        header('Location: menu.php');
    }

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="recursos/img/racao.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>
        Sistema Web
    </title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport'>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href="assets/css/material-dashboard.css?v=2.1.2" rel="stylesheet">
    <link href="assets/demo/demo.css" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/jquery.dataTables.min.css">
</head>

<body class="">
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
            <div class="logo">
                <a href="" class="simple-text logo-normal">
                    <img class="foto-user" src="<?php echo($_SESSION['foto']) ?>" alt="">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item btn-estatisticas" style="cursor: pointer;">
                        <a class="nav-link">
                            <i class="material-icons">dashboard</i>
                            <p>Estatísticas</p>
                        </a>
                    </li>
                    <?php
                        if($_SESSION['tipoUser'] == 'superiores'){
                            echo("
                            <li class='nav-item btn-add-e-peps' style='cursor: pointer;'>
                                <a class='nav-link'>
                                    <i class='material-icons'>person</i>
                                    <p>Cadastrar Entrada <br> de Ração</p>
                                </a>
                            </li>
                            <li class='nav-item btn-add-s-peps' style='cursor: pointer;'>
                                <a class='nav-link'>
                                    <i class='material-icons'>content_paste</i>
                                    <p>Cadastrar Saída <br> de Ração</p>
                                </a>
                            </li>
                            ");
                        }
                    ?>
                    <li class="nav-item btn-tabela active" style="cursor: pointer;">
                        <a class="nav-link">
                            <i class="material-icons">library_books</i>
                            <p>Visualizar Entradas <br> e Saídas (PEPS)</p>
                        </a>
                    </li>
                    <li class="nav-item btn-sair" style="cursor: pointer;">
                        <a class="nav-link">
                            <i class="material-icons">exit_to_app</i>
                            <p>Sair</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Visualizar Entradas e Saídas</a>
                        <a class="navbar-brand font-weight-bold">
                            <?php echo('Nome: '.$_SESSION['nome']);?>
                        </a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header card-header-primary">
                                    <h4 class="card-title ">Entradas</h4>
                                    <p class="card-category"> Todas as entradas cadastradas do estoque de rações</p>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table" id="tabela-entrada">
                                            <thead class="text-primary tabela">
                                                <th scope="col">
                                                    ID
                                                </th>
                                                <th scope="col">
                                                    Responsável
                                                </th>
                                                <th scope="col">
                                                    Data da Entrada
                                                </th>
                                                <th scope="col">
                                                    Quantidade em KG
                                                </th>
                                                <th scope="col">
                                                    Custo em R$
                                                </th>
                                                <th scope="col">
                                                    Pacotes
                                                </th>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title ">Saídas</h4>
                            <p class="card-category"> Todas as saídas cadastradas do estoque de rações</p>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table" id="tabela-saida">
                                    <thead class="text-primary tabela">
                                        <th scope="col">
                                            ID
                                        </th>
                                        <th scope="col">
                                            Responsável
                                        </th>
                                        <th scope="col">
                                            Data da Saída
                                        </th>
                                        <th scope="col">
                                            Quantidade em KG
                                        </th>
                                        <th scope="col">
                                            Pacotes
                                        </th>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="container-fluid">
            <nav class="float-left">
                <ul>
                    <li>
                        <a>
                            Mário Guilherme de Andrade Rodrigues
                        </a>
                    </li>
                </ul>
            </nav>
            <div class="copyright float-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>
                Técnico em Agropecuária
            </div>
        </div>
    </footer>
    </div>

    <script src="assets/js/core/jquery.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap-material-design.min.js"></script>
    <script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
    <script src="assets/js/plugins/moment.min.js"></script>
    <script src="assets/js/plugins/sweetalert2.js"></script>
    <script src="assets/js/plugins/jquery.validate.min.js"></script>
    <script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
    <script src="assets/js/plugins/bootstrap-selectpicker.js"></script>
    <script src="assets/js/plugins/bootstrap-datetimepicker.min.js"></script>
    <script src="assets/js/plugins/bootstrap-tagsinput.js"></script>
    <script src="assets/js/plugins/jasny-bootstrap.min.js"></script>
    <script src="assets/js/plugins/fullcalendar.min.js"></script>
    <script src="assets/js/plugins/jquery-jvectormap.js"></script>
    <script src="assets/js/plugins/nouislider.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <script src="assets/js/plugins/arrive.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
    <script src="assets/js/plugins/chartist.min.js"></script>
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <script src="assets/js/material-dashboard.js?v=2.1.2" type="text/javascript"></script>
    <script src="assets/demo/demo.js"></script>
    <script src="src/usuario/controle/menu.js"></script>
    <script src="src/entradas/controle/list-entrada.js"></script>
    <script src="src/saidas/controle/list-saida.js"></script>
    <script src="recursos/js/jquery.dataTables.min.js"></script>
    <script src="recursos/js/dataTables.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>