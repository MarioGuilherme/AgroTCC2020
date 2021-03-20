<?php

    include('../../banco/conexao.php');

    if($conexao){
    
        $requestData = $_POST;
        $tipousuario = $requestData['tipoUsuario'];
        $senha = base64_encode($requestData['senha']);
        
        if($tipousuario == 'superiores'){

            if($requestData['nome']  == '' || $requestData['senha'] == ''){

                $dados = array(
                    'mensagem' => 'Há campos vazios que precisam ser preenchidos',
                    'icone' => 'error'
                );
                echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                exit;  
                
            } else{

                $sql = "SELECT * FROM masters WHERE nome = ".'"'.$requestData['nome'].'"';
                $resultado = mysqli_query($conexao, $sql);
                $nomes = mysqli_num_rows($resultado);

                if($nomes == 0 ){
                    $dados = array(
                        'mensagem' => 'Nenhuma conta encontrada',
                        'icone' => 'error'
                    );

                    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                    exit;
                }else{

                    $sql = "SELECT * FROM masters WHERE nome = ".'"'.$requestData['nome'].'"'. " AND senha = ".'"'.$senha.'"' ;
                    $resultado = mysqli_query($conexao, $sql);
                    $contas = mysqli_num_rows($resultado);

                    if($contas > 0){

                        $informacoes = mysqli_fetch_assoc($resultado);

                        session_start(); 

                        $_SESSION['login'] = TRUE;
                        $_SESSION['tipoUser'] = $tipousuario;
                        $_SESSION['nome'] = $informacoes['nome'];
                        $_SESSION['email'] = $informacoes['email'];
                        $_SESSION['senha'] = $senha;
                        $_SESSION['foto'] = 'recursos/img/masters.png';
    
                        $dados = array(
                            'mensagem' => 'Login efetuado, redirecionando...',
                            'icone' => 'success'
                        );
    
                        echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                        exit;

                    }else{
                        $dados = array(
                            'mensagem' => 'Credênciais Incorretas',
                            'icone' => 'error',
                            'sql' => $sql
                        );
                    }

                }
            }
            
        } else {

            if($requestData['rm']  == '' || $requestData['senha'] == ''){

                $dados = array(
                    'mensagem' => 'Há campos vazios que precisam ser preenchidos',
                    'icone' => 'error'
                );
                echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                exit;  
                
            } else{

                $sql = "SELECT * FROM alunos WHERE rm = ".'"'.$requestData['rm'].'"';
                $resultado = mysqli_query($conexao, $sql);
                $alunos = mysqli_num_rows($resultado);

                if($alunos == 0){
                    $dados = array(
                        'mensagem' => 'Nenhuma conta encontrada',
                        'icone' => 'error'
                    );

                    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                    exit;
                    

                } else{

                    $sql = "SELECT * FROM alunos WHERE rm = ".'"'.$requestData['rm'].'"'." AND senha = ".'"'.$senha.'"';
                    $resultado = mysqli_query($conexao, $sql);
                    $contas = mysqli_num_rows($resultado);

                    if($contas > 0){
                        
                        $informacoes = mysqli_fetch_assoc($resultado);
                        session_start(); 

                        $_SESSION['login'] = TRUE;
                        $_SESSION['tipoUser'] = $tipousuario;
                        $_SESSION['nome'] = $informacoes['nome'];
                        $_SESSION['rm'] = $informacoes['rm'];
                        $_SESSION['senha'] = $senha;
                        $_SESSION['foto'] = 'recursos/img/alunos.png';
                       
                        $dados = array(
                            'mensagem' => 'Login efetuado, redirecionando...',
                            'icone' => 'success'
                        );
                        
                        echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                        exit;

                    } else {

                        $dados = array(
                            'mensagem' => 'Credênciais Incorretas',
                            'icone' => 'error',
                            $sql,
                            $contas
                        );
                        echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
                        exit;
                    }                    
                }
            }
        }
        mysqli_close($conexao);
    } else{
        $dados = array(
            'mensagem' => "Erro [042]" . "<br>" . "Ocorreu um erro interno no servidor 😕",
            'icone' => 'error'
        );
        echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
        exit;  
    }

    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);