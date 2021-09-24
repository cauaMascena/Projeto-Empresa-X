<?php

function lerArquivo($nomeArquivo)
{
    $arquivo = file_get_contents($nomeArquivo);

    $arquivoAr = json_decode($arquivo);

    return $arquivoAr;
}

function buscarFuncionario($funcionarios, $filtro)
{
    $funcionariosFiltro = [];
    foreach ($funcionarios as $funcionario) {
        if (strpos($funcionario->first_name, $filtro) !== false
            ||
           strpos($funcionario->last_name, $filtro) !== false
            ||
           strpos($funcionario->department, $filtro) !== false
           ) {
            $funcionariosFiltro[] = $funcionario;
        }
    }
    return $funcionariosFiltro;
}

function adicionarFuncionario ($nomeArquivo, $novoFuncionario) {

    $funcionarios = lerArquivo($nomeArquivo);

    $funcionarios[] = $novoFuncionario;

    $json = json_encode($funcionarios);

    file_put_contents($nomeArquivo, $json);
}
function deletarFuncionario ($nomeArquivo, $idFuncionario) {
    $funcionarios  = lerArquivo($nomeArquivo);
foreach ($funcionarios  as $chave => $funcionario) {
    if ($funcionario->id == $idFuncionario) {
        unset($funcionarios[$chave]);
    }
}
$json = json_encode(array_values ($funcionarios));

file_put_contents($nomeArquivo, $json);
}

//Função buscar funcionario por id 

function buscarFuncionarioPorId ($nomeArquivo, $idFuncionario) {

    $funcionarios = lerArquivo($nomeArquivo);

    foreach ($funcionarios as $funcionario) {

        if ($funcionario->id == $idFuncionario) {
            
return $funcionario;
        
        }
    }
}

/*
parametros da função:
1 - usuario vindo do form
2 - senha vindo do form
3 - dados do arquivo json de usuario e senha
*/
function realizarLogin($usuario, $senha, $dados){

    foreach ($dados as $dado) {
        
        if ( $dado->usuario == $usuario && $dado->senha == $senha ) {
            
            //VARIÁVEIS DE SESSÃO:
            $_SESSION["usuario"] = $dado->usuario;
            $_SESSION["id"] = session_id();
            $_SESSION["data_hora"] = date('d/m/Y - h:i:s');

            header('location: home.php');
            exit;

        }
        
    }

    header('location: index.php');

}

/* 
    FUNÇÃO DE VERIFICAÇÃO DE LOGIN:
    VERIFICA SE O USUÁRIO PASSOU PELO PROCESSO DE LOGIN 
*/
function verificarLogin(){

    if( ($_SESSION["id"] != session_id()) || (empty($_SESSION["id"])) ){

        header("location: index.php");

    }

}

/* 
    FUNÇÃO DE FINALIZAÇÃO DE LOGIN:
    EFETUA A AÇÃO DE SAIR DO USUÁRIO DESTRUINDO A SESSÃO 
*/
function finalizarLogin(){

    session_unset();//LIMPA TODAS AS VARIÁVEIS DE SESSÃO
    session_destroy();//DESTROI A SESSÃO ATIVA

    header('location: index.php');

}


// Função editar Funcionario

function editarFuncionario($nomeArquivo, $funcionarioEditado) {

$funcionarios = lerArquivo($nomeArquivo);

foreach ($funcionarios as $chave => $funcionario) {
    if ($funcionario->id == $funcionarioEditado["id"]) {
        $funcionarios[$chave] = $funcionarioEditado;
    }
}
$json = json_encode(array_values($funcionarios));

file_put_contents($nomeArquivo, $json);
}