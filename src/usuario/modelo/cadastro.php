<?php

    include('../../banco/conexao.php');

    if($conexao){

        $requestData = $_POST;
        $tipousuario = $requestData['tipoUsuario'];
        $senha = base64_encode($requestData['senha']);

        if($tipousuario == 'superiores'){

            if($requestData['nome']  == '' || $requestData['email'] == '' || $requestData['senha'] == '' ){
                
                $dados = array(
                    'mensagem' => 'Há campos vazios que precisam ser preenchidos',
                    'icone' => 'error'
                );
                echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                exit;

            } else {

                $sql = "SELECT * FROM masters WHERE email = ".'"'.$requestData['email'].'"';
                $resultado = mysqli_query($conexao, $sql);
                $linha = mysqli_num_rows($resultado);

                if($linha == 1){

                    $dados = array(
                        'mensagem' => 'Email já cadastrado',
                        'icone' => 'error'
                    );
                    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                    exit;

                } else{

                    $sql = "INSERT INTO masters (nome, email, senha) VALUES (".'"'.$requestData['nome'].'", '.'"'.$requestData['email'].'", '.'"'.$senha.'")';
                    session_start();
                    
                    $_SESSION['login'] = TRUE;
                    $_SESSION['tipoUser'] = $tipousuario;
                    $_SESSION['nome'] = $requestData['nome'];
                    $_SESSION['email'] = $requestData['email'];
                    $_SESSION['senha'] = $senha;
                    $_SESSION['foto'] = 'recursos/img/masters.png';
                    
                }
            }

        } else{

            if($requestData['nome']  == '' || $requestData['rm'] == '' || $requestData['senha'] == '' ){

                $dados = array(
                    'mensagem' => 'Há campos vazios que precisam ser preenchidos',
                    'icone' => 'error'
                );
                echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                exit;

            } else{

                $sql ="SELECT * FROM alunos WHERE rm = $requestData[rm]";
                $resultado = mysqli_query($conexao, $sql);
                $linha = mysqli_num_rows($resultado);
    
                if($linha == 1){
                    $dados = array(
                        'mensagem' => 'RM já cadastrado',
                        'icone' => 'error'
                    );
                    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                    exit;
                
                } else{

                    $sql = "INSERT INTO alunos (nome, rm, senha) VALUES ('$requestData[nome]', '$requestData[rm]', '$senha')";
                    session_start();

                    $_SESSION['login'] = TRUE;
                    $_SESSION['tipoUser'] = $tipousuario;
                    $_SESSION['nome'] = $requestData['nome'];
                    $_SESSION['rm'] = $requestData['rm'];
                    $_SESSION['senha'] = $senha;
                    $_SESSION['foto'] = 'recursos/img/alunos.png';
                    
                }
            }
        }

        $resultado = mysqli_query($conexao, $sql);

        if($resultado){
            $dados = array(
                'mensagem' => "Cadastrado com êxito.",
                'icone' => 'success'
            );
        } else {
            $dados = array(
                'mensagem' => "Não foi possível realizar o cadastro.",
                'icone' => 'error'
            );
        }       

        mysqli_close($conexao);
    }

    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);