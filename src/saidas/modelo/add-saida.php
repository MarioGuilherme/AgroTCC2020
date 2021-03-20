<?php

    include('../../banco/conexao.php');

    if($conexao){

        $request = $_POST;

        if($request['nome'] == "" || $request['data_saida'] == "" ||  $request['quantidade'] == "" || $request['pacotes'] == ""){
            
            $dados = array(
                'msg' => 'Há campos vazios que precisam ser preenchidos',
                'icone' => 'error'
            );
            echo json_encode($dados, JSON_UNESCAPED_SLASHES|JSON_UNESCAPED_UNICODE);
            exit;

        }else{

            $ano = substr($request['data_saida'], 6);
            $mes = substr($request['data_saida'], 3,-5);
            $dia = substr($request['data_saida'], 0,-8);
            $data_saida = $ano.'-'.$mes.'-'.$dia;


            $sql = "INSERT INTO saidas (responsavel, data_saida, quantidade, pacotes) VALUES (".'"'.$request['nome'].'", "'.$data_saida.'", "'.$request['quantidade'].'", "'.$request['pacotes'].'")';

            $resultado = mysqli_query($conexao, $sql);

            if($resultado){

                $sqlRacao = "UPDATE racao SET quantidadeKG = quantidadeKG -".$request['quantidade'].", pacotes = pacotes -".$request['pacotes']. " WHERE id_racao = 1";
                $update = mysqli_query($conexao, $sqlRacao);

                $dados = array(
                    'icone' => 'success',
                    'msg' => 'Saída cadastrada com êxito, recarregando...'
                );
            }else{
                $dados = array(
                    'icone' => 'error',
                    'msg' => 'Erro ao cadastrar Saída'
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