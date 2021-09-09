<?php

require("./funcoes.php");

$funcionarios = lerArquivo("empresaX.json");

if (isset($_GET["filtro"]) && $_GET["filtro"] != "") {
    $funcionarios = buscarFuncionario($funcionarios, $_GET["filtro"]);
}

?>


    <!DOCTYPE html>
    <html lang="pt-BR">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://kit.fontawesome.com/a757f2d5f7.js" crossorigin="anonymous"></script>
    <script src="./script.js" defer></script>
        <link rel="stylesheet" href="style.css">
        <title>Empresa X</title>
    </head>

    <body>
        <form>
         <div class="content">
         <input type="search" name="filtro" placeholder="Buscar Funcionário" value="<?php isset($_GET["filtro"]) ? $_GET["filtro"] : " " ?>">
            <button>Buscar</button>
            </div>
            <h1>Tabela de Funcionários</h1>
            <p>A empresa conta com <em><?= count($funcionarios) ?></em> funcionários</p>
            <table background-color="red">
            <form method="GET" class="search-form">
      <div class="input-group" style="flex: 1">
        <label>Pesquisar por nome</label>
        <input type="search" placeholder="Digite o nome" name="filtro" value="<?= isset($_GET["filtro"]) ? $_GET["filtro"] : "" ?>" />
      </div>

            <button id="btnAddFuncionario"> Acrescentar  Funcionário!</button>
            </form>
            <div class="formularioAcrescentarFuncionario">
                <form id="form-funcionario" action="acoes.php" method="$_POST">
                    <h1>Adicionar funcionário</h1>
                    <input type="text" name="first_name" placeholder="Digite o primeiro nome">
                    <input type="text" name="last_name" placeholder="Digite o segundo Nome">
                    <input type="text" name="email" placeholder="Digite o email">
                    <input type="text" name="gender" placeholder="Digite o gênero">
                    <input type="text" name="ip_address" placeholder="Digite o endereço">
                    <input type="text" name="country" placeholder="Digite o país">
                    <input type="text" name="department" placeholder="Digite o departamento">
                   <button>Salvar</button>
                    <br></br>
                </form>
            </div>

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