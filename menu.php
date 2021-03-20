<?php

    session_start();

    if(!isset($_SESSION['login'])){
        header('Location: index.php');
    }else if($_SESSION['tipoUser'] == 'alunos'){
        header('Location: menu.php');
    }else{

        include("src/banco/conexao.php");

        $sqlRacao = "SELECT * FROM racao";
        $consultaRacao = mysqli_query($conexao, $sqlRacao);
        $dadosRacao = mysqli_fetch_assoc($consultaRacao);

        $sqlEntradas = "SELECT SUM(custo) AS custo FROM entradas";
        $consultaEntradas = mysqli_query($conexao, $sqlEntradas);
        $dadosEntradas = mysqli_fetch_assoc($consultaEntradas);
        $custo = number_format($dadosEntradas['custo'], 2, ',', '.');
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
    <link href="assets/css/material-dashboard.css" rel="stylesheet">
    <link href="assets/demo/demo.css" rel="stylesheet">
    <link rel="stylesheet" href="recursos/css/jquery.dataTables.min.css">
</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-color="purple" data-background-color="white" data-image="assets/img/sidebar-1.jpg">
            <div class="logo">
                <a class="simple-text logo-normal">
                    <img class="foto-user" src="<?php echo($_SESSION['foto']) ?>" alt="">
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="nav-item active btn-estatisticas" style="cursor: pointer;">
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
                    <li class="nav-item btn-tabela" style="cursor: pointer;">
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
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="javascript:;">Estatísticas</a>
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
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-info card-header-icon">
                                    <div class="card-icon">
                                        <img src="recursos/img/cifrao.png" style="filter: invert(1); width: 86px !important;">
                                    </div>
                                    <p class="card-category">Gasto com Rações</p>
                                    <h3 class="card-title">
                                        <?php echo('R$'.$custo); ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-success card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">store</i>
                                    </div>
                                    <p class="card-category">Ração em Estoque</p>
                                    <h3 class="card-title">
                                        <?php echo($dadosRacao['quantidadeKG'].' kg | '. $dadosRacao['pacotes'] .' pacotes'); ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-warning card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">content_copy</i>
                                    </div>
                                    <p class="card-category">Última entrada no Estoque</p>
                                    <h3 class="card-title">
                                        <?php

                                            $meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');

                                            $mesAtual = Date('n');
                                            $anoAtual = Date('Y');

                                            $mesRecarga = $meses[$mesAtual - 2];
                                            echo($mesRecarga.' de <small>'.$anoAtual.'</small>');

                                        ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-6 col-sm-6">
                            <div class="card card-stats">
                                <div class="card-header card-header-danger card-header-icon">
                                    <div class="card-icon">
                                        <i class="material-icons">info_outline</i>
                                    </div>
                                    <p class="card-category">Pacotes Estragados</p>
                                    <h3 class="card-title">
                                        <?php echo(ceil($dadosRacao['pacotes'] * 0.02)) ?>
                                    </h3>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-success">
                                    <div class="ct-chart" id="dailySalesChart"></div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Lucro em R$</h4>
                                    <p class="card-category">
                                        <span class="text-success">
                                            <i class="fa fa-long-arrow-up"></i> 15%
                                        </span> de aumento por cuidados
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-warning">
                                    <div class="ct-chart" id="websiteViewsChart"></div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Quantidade Média de Entrada de Ração</h4>
                                    <p class="card-category">Última entrada no Estoque:
                                        <?php 
                                            $meses = array('Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro');

                                            $mesAtual = Date('n');
                                            $anoAtual = Date('Y');

                                            $mesRecarga = $meses[$mesAtual - 2];
                                            echo($mesRecarga.' de '.$anoAtual);
                                        ?>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-chart">
                                <div class="card-header card-header-danger">
                                    <div class="ct-chart" id="completedTasksChart"></div>
                                </div>
                                <div class="card-body">
                                    <h4 class="card-title">Perdas de kg de Rações</h4>
                                    <p class="card-category">Diminuição em nível médio</p>
                                </div>
                                <div class="card-footer">
                                    <div class="stats">
                                        <i class="material-icons">date_range</i> Atualizado ás
                                        <script>
                                            var data = new Date();

                                            var dia = data.getDate();
                                            var hora = data.getHours();
                                            var min = data.getMinutes();
                                            min -= 4

                                            if (min == 1 || min == 2 || min == 3 || min == 4 || min == 5 || min == 6 || min == 7 || min == 8 || min == 9) {
                                                min = '0' + min
                                            }

                                            var str_data = dia + '/11 ás ' + hora + 'h:' + min
                                            document.write(str_data)
                                        </script>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
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
                        <div class="col-lg-6 col-md-12">
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
                                                    Nome
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
    <script src="assets/js/plugins/chartist.min.js"></script>
    <script src="assets/js/plugins/bootstrap-notify.js"></script>
    <script src="assets/js/material-dashboard.js"></script>
    <script src="assets/demo/demo.js"></script>
    <script src="recursos/js/menu.js"></script>
    <script src="src/usuario/controle/menu.js"></script>
    <script src="src/entradas/controle/list-entrada.js"></script>
    <script src="src/saidas/controle/list-saida.js"></script>
    <script src="recursos/js/jquery.dataTables.min.js"></script>
    <script src="recursos/js/dataTables.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</body>

</html>