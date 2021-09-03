<?php

function lerArquivo($nomeArquivo)
{
    $arquivo = file_get_contents("./empresaX.json");

    $jsonArray = json_decode($arquivo);

    return $jsonArray;
}

function buscarFuncionario($funcionarios, $id)
{
    $funcionarioFiltro = [];
    foreach ($funcionarios as $funcionario) {
        if ($funcionario->id == $id) {
            $funcionarioFiltro[] = $funcionario;
        }
    }
    return $funcionarioFiltro;
}