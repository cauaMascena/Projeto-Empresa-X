<?php

require ("./funcoes.php");

$funcionario = $_GET['id'];

$funcionario = buscarFuncionarioPorId("./dados/empresaX.json", $funcionario);

// echo '<pre>';
// var_dump($funcionario);
// echo '<pre>';

?>
<!DOCTYPE html>
<html lang="pt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles-global.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="./script.js" defer></script>
    <link rel="stylesheet" href="styleEdicao.css">
    <title>Empresa X</title>
</head>

<body>
    <div class="container-form">
        <form id="form-funcionario" action="acaoEditar.php" method="POST">
            <?php
            if (!$funcionario) echo "<h1>Funcionário não encontrado</h1>";
            else {
            ?>
            <div class="container-edit">
                <h1>Editar funcionário</h1>
                <input type="hidden" placeholder="Digite o id" name="id" value="<?= $funcionario->id ?>"/>
                <input type="text" placeholder="Digite o primeiro nome" name="first_name" value="<?= $funcionario-> first_name ?>"/>
                <input type="text" placeholder="Digite o sobrenome" name="last_name" value="<?= $funcionario-> last_name ?>"/>
                <input type="text" placeholder="Digite o e-mail" name="email" value="<?= $funcionario-> email ?>"/>
                <input type="text" placeholder="Digite o sexo" name="gender" value="<?= $funcionario-> gender ?>"/>
                <input type="text" placeholder="Digite o IP" name="ip_address" value="<?= $funcionario-> ip_address ?>"/>
                <input type="text" placeholder="Digite o país" name="country" value="<?= $funcionario-> country ?>"/>
                <input type="text" placeholder="Digite o departamento" name="department" value="<?= $funcionario-> department ?>"/>
                <button>Salvar</button>
                </div>
                
            <?php } ?>
        </form>
    </div>
</body>

</html>