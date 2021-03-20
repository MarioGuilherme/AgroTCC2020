<?php

    include('../../banco/conexao.php');

    if($conexao){

        $request = $_POST;

        if($request['nome'] == "" || $request['data_entrada'] == "" ||  $request['quantidade'] == "" || $request['quantidade'] == "" ){
            
            $dados = array(
                'msg' => 'Há campos vazios que precisam ser preenchidos',
                'icone' => 'error'
            );
            echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            exit;

        }else{

            $ano = trim(substr($request['data_entrada'], 7));
            $mes = trim(substr($request['data_entrada'], 4,-6));
            $dia = trim(substr($request['data_entrada'], 0,-9));
            $data_entrada = $ano.'-'.$mes.'-'.$dia;


            $sql = "INSERT INTO entradas (responsavel, data_entrada, quantidade, custo, pacotes) VALUES (".'"'.$request['nome'].'", "'.$data_entrada.'", "'.$request['quantidade'].'", "'.$request['custo'].'", "'.$request['pacotes'].'")';
            

            $resultado = mysqli_query($conexao, $sql);

            if($resultado){

                $sqlRacao = "UPDATE racao SET quantidadeKG = quantidadeKG +".$request['quantidade'].", pacotes = pacotes +".$request['pacotes']. " WHERE id_racao = 1";
                $update = mysqli_query($conexao, $sqlRacao);

                $dados = array(
                    'icone' => 'success',
                    'msg' => 'Entrada cadastrada com êxito, recarregando...'
                );
            }else{
                $dados = array(
                    'icone' => 'error',
                    'msg' => 'Erro ao cadastrar Entrada',
                );
            }

            mysqli_close($conexao);
        }
    }else{
        $dados = array(
            'mensagem' => "Erro [042]" . "<br>" . "Ocorreu um erro interno no servidor 😕",
            'icone' => 'error'
        );
        exit;
    }

    echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);