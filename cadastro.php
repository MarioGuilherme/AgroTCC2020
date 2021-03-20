<!-- <?php
    session_start();

    if(isset($_SESSION['login'])){
        header('Location: menu.php');
    }
?> -->
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Cadastro</title>
    <link rel="stylesheet" href="recursos/css/bootstrap.min.css">
    <link rel="stylesheet" href="recursos/css/cadastro.css">
    <link rel="stylesheet" href="recursos/css/all.min.css">
    <link rel="shortcut icon" href="recursos/img/cadeado.png">
</head>

<body class="text-center">
    <form class="form-signin" id="form-cadastro">

        <h1 class="h3 mb-3 font-weight-normal font-weight-bold">CADASTRO</h1>

        <img class="mb-4" src="recursos/img/masters.png" width="72" height="72">

        <label for="my-select" class="d-flex justify-content-start font-weight-bold">Cadastrar tipo de usuário</label>
        <div class="form-group">
            <select id="my-select" class="form-control" name="tipoUsuario">
                <option value="superiores">Professores/Funcionários</option>
                <option value="alunos">Alunos</option>
            </select>
        </div>

        <input name="nome" type="text" id="nome" class="form-control input" placeholder="Nome Completo">
        <input name="email" type="text" id="email" class="form-control input" placeholder="Email">
        <input name="rm" type="text" id="rm" class="form-control input" placeholder="RM" disabled>

        <div class="container">
            <div class="row">
                <input name="senha" type="password" id="senha" class="form-control input senha mb-2" placeholder="Senha">
                <button type="button" class="btn btn-info btn-mostrar-senha"><i class="fas fa-eye"></i></button>
            </div>
        </div>

        <button class="btn btn-lg btn-success btn-block mt-2 btn-cadastrar" type="submit">Cadastrar</button>
        <span class="link-cadastro mt-4 d-flex justify-content-start text-center">
            Já têm uma conta? Fazer Login
        </span>
        <p class="mt-2 mb-2"> &copy;2020</p>

    </form>

    <script src="recursos/js/jquery-3.5.1.min.js"></script>
    <script src="recursos/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="recursos/js/all.min.js"></script>
    <script src="recursos/libs/jQuery Mask/jquery.mask.js"></script>
    <script src="src/usuario/controle/cadastro.js"></script>
</body>

</html>