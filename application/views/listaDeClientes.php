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
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="application/third_party/Semantic/semantic.min.css">
    <script src="application/third_party/Semantic/semantic.min.js"></script>
</head>

<body>
    <div class="wrapper">
        <div class="lista">
            <h1>Lista de clientes</h1>
            <table class="ui unstackable table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <?php $index = 0;
                foreach ($clientes as $cliente) {
                    echo '<tbody>';
                    echo '<tr>';
                    echo '    <td>' . $cliente->Nome . '</td>';
                    echo '    <td>' . $cliente->email . '</td>';
                    echo '    <td class="right aligned">
                <div class="icons">
                    <i class="edit outline icon"></i>
                    <i class="info circle icon"></i>
                    <i class="x icon"></i>
                </div>
                </td>';
                    echo '</tr>';
                    echo '</tbody>';
                    $index++;
                }
                ?>
            </table>

            <div tabindex="0" class="ui animated fade green button" style="width:10vh;" onclick="modalInsere()">
                <div class="visible content"><i class="plus icon"></i></div>
                <div class="hidden content" style="font-size: 12px;">
                    Adicionar cliente
                </div>
            </div>
        </div>
    <div class="ui modal">
        <i class="close icon"></i>
        <div class="header">
            Adicionar um novo cliente
        </div>
        <div class="description">
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
        function modalInsere() {
            $('.ui.modal').modal({
                    blurring: true
                })
                .modal('show')

        }
    </script>
    <style>
        * {
            padding: 0;
            margin: 0;
        }

        .lista  {
            width: 75%;
            height: 500px;
        }
        table{
            overflow-x: scroll;
            height: 200px;
        }

        .icons {
            display: flex;
            font-size: 20px;
            cursor: pointer;
        }

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
        }

        .formulario {
            margin: 40px;
        }
    </style>


</body>

</html> 