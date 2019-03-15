<?php 
defined('BASEPATH') or exit('No direct script acess allowed');
?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Clientes </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
        crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="application/third_party/Semantic/semantic.min.css">
    <script src="application/third_party/Semantic/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="application\third_party\Style.css">
</head>

<body>
    <?php
    echo'<pre>'
    print_r($cliente);
    echo '</pre>'
    ?>

    <div class="wrapper">
        Adicionar um novo cliente
        <form class="ui form formulario" method="post">
            <div class="two fields">
                <div class="field">
                    <label>Nome</label>
                    <input name="nome" maxlength="20" type="text" placeholder="Nome">
                </div>
                <div class="field">
                    <label>Sobrenome</label>
                    <input name="email" maxlength="20" type="text" placeholder="Sobrenome">
                </div>
            </div>
            <div class="field">
                <label>Endereço de cobrança</label>
                <input name="endereco" maxlength="100" type="text" placeholder="Endereço">
            </div>
            <div class="three fields">
                <div class="field">
                    <label>Telefone</label>
                    <input type="text" name="telefone" maxlength="20" placeholder="Tel:">
                </div>
                <div class="five field">
                    <label>CPF</label>
                    <input type="text" maxlength="20" name="cnpf" placeholder="CPF ou CNPJ:">
                </div>
                <div class="field">
                    <label>Responsável pela venda</label>
                    <input type="text" maxlength="20" name="respovend" placeholder="exemplo:Kaian Ferreira">
                </div>
            </div>
            <div class="field">
                <label>Observações</label>
                <input type="text" maxlength="100" name="outros" placeholder="Max 100 caracteres">
            </div>
            <div class="ui red deny button">
                Cancelar
            </div>
            <button class="ui positive right labeled icon button" type="submit">
                Adicionar
                <i class="checkmark icon"></i>
            </button>
        </form>
    </div>
    </div>
    </div>
    <script>

</body >

</html >