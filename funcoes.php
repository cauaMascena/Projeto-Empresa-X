<?php

function lerArquivo($nomeArquivo)
{
    $arquivo = file_get_contents("./empresaX.json");

    $arquivoAr = json_decode($arquivo);

    return $arquivoAr;
}

function buscarFuncionario($funcionarios, $filtro)
{
    $funcionarioFiltro = [];
    foreach ($funcionarios as $funcionario) {
        if (strpos($funcionario->first_name, $filtro) !== false
            ||
           strpos($funcionario->last_name, $filtro) !== false
            ||
           strpos($funcionario->department, $filtro) !== false) {
            $funcionarioFiltro[] = $funcionario;
        }
    }
    return $funcionarioFiltro;
}

function adicionarFuncionario ($nomeArquivo, $novoFuncionario) {

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionario[] = $nomeArquivo;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
}

// function acrescentarFuncionario($funcionarios) {
//    $arquivo = file_put_contents($id, 
//    $first_name, 
//    $last_name,
//    $email, 
//    $gender, 
//    $ip_address);

//     $jsonArray = json_decode($arquivo)
// }

