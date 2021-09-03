<?php

require("./funcoes.php");

$funcionarios = lerArquivo("empresaX.json");

if (isset($_GET["buscarFuncionario"])) {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["buscarFuncionario"]);
}

?>


    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="style.css">
        <title>Empresa X</title>
    </head>

    <body>
        <form>
         <div>
         <input type="number" name="buscarFuncionario" placeholder="Buscar Funcionário" value="<?php isset($_GET[" buscarFuncionario "]) ? $_GET["buscarFuncionario "] : " " ?>">
            <button>Buscar</button>
            </div>
            <h1>Tabela de Funcionários</h1>

            <table border="30" background-color="red">

                <tr>
                    <th>Id</th>
                    <th>Primeiro Nome</th>
                    <th>Segundo Nome</th>
                    <th>Email</th>
                    <th>Gênero</th>
                    <th>Endereço IP</th>
                    <th>País</th>
                    <th>Departamento</th>
                </tr>
                <?php
            foreach ($funcionarios as $funcionario) :
            ?>
                    <tr>
                        <th>
                            <?= $funcionario->id ?>
                        </th>
                        <th>
                            <?= $funcionario->first_name ?>
                        </th>
                        <th>
                            <?= $funcionario->last_name ?>
                        </th>
                        <th>
                            <?= $funcionario->email ?>
                        </th>
                        <th>
                            <?= $funcionario->gender ?>
                        </th>
                        <th>
                            <?= $funcionario->ip_address ?>
                        </th>
                        <th>
                            <?= $funcionario->country ?>
                        </th>
                        <th>
                            <?= $funcionario->department ?>
                        </th>
                    </tr>

                    <?php
            endforeach
            ?>

            </table>
        </form>
    </body>

    </html>