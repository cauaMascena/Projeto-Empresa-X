<?php

require("./funcoes.php");

$funcionarios = lerArquivo("./dados/empresaX.json");

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
    <div class="content">
        <h1>Tabela de Funcionários</h1>
        <p style="text-align: center;">
            A empresa conta com <em><?= count($funcionarios) ?></em> funcionários
        </p>
        <form method="GET" class="search-form">
            <div class="input-group" style="flex: 1">
                <label>Pesquisar por nome</label>
                <input type="search" name="filtro" placeholder="Buscar Funcionário" value="<?php isset($_GET["filtro"]) ? $_GET["filtro"] : " " ?>">
            </div>
            <button class="material-icons">
                Buscar Funcionário
            </button>
        </form>
        <button id="btnAddFuncionario"> Acrescentar Funcionário!</button>
        <div class="modal-form">
            <form id="form-funcionario" action="acoes.php" method="POST">
                <h1>Adicionar funcionário</h1>
                <input type="text" placeholder="Digite o id" name="id" />
                <input type="text" placeholder="Digite o primeiro nome" name="first_name" />
                <input type="text" placeholder="Digite o sobrenome" name="last_name" />
                <input type="text" placeholder="Digite o e-mail" name="email" />
                <input type="text" placeholder="Digite o sexo" name="gender" />
                <input type="text" placeholder="Digite o IP" name="ip_address" />
                <input type="text" placeholder="Digite o país" name="country" />
                <input type="text" placeholder="Digite o departamento" name="department" />
                <button>Salvar</button>
            </form>
        </div>
        <table>
            <tr>
                <th>Id</th>
                <th>Primeiro Nome</th>
                <th>Segundo Nome</th>
                <th>Email</th>
                <th>Gênero</th>
                <th>Endereço IP</th>
                <th>País</th>
                <th>Departamento</th>
                <th>editar</th>
                <th>deletar</th>
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
                    <th><button onclick="editar(<?= $funcionario-> id ?>)">&#9998;</button></th>
                    <th><button onclick="deletar(<?= $funcionario->id ?>)">&#10006;</button></th>
                </tr>
            <?php
            endforeach
            ?>

        </table>
    </div>
</body>

</html>