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
                    echo '    <td>' . $cliente->nome . '</td>';
                    echo '    <td>' . $cliente->email . '</td>';
                    echo '    <td class="right aligned">
                <div class="icons">
                    <i class="edit outline icon"><a href="/ProjetoLandx/update/'.$cliente->Id.'"/a></i>
                    <i class="info circle icon"></i>
                    <i class="x icon"></i>
                </div>
                </td>';
                    echo '</tr>';
                    echo '</tbody>';
                }
                ?>
            </table>

            <div class="adiciona ui animated fade green button teste" onclick="modalInsere()">
                <div class="visible content">
                    <i class="plus icon"></i>
                </div>

                <div class="hidden content">
                    Adicionar
                </div>
            </div>
            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Adicionar um novo cliente
                </div>
                <div class="description">
                    <form class="ui form formulario" method="post" >
                        <div class="two fields">
                            <div class="field">
                                <label>Nome</label>
                                <input name="nome" maxlength="20" type="text" placeholder="Nome">
                            </div>
                            <div class="field">
                                <label>Email</label>
                                <input name="email" maxlength="100" type="email" placeholder="Email">
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
                                <input type="number" step="1" maxlength="20" name="cnpf" placeholder="sem traços ou">
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
                        <div class="ui error message"></div>
                        <div class="ui red deny button">
                            Cancelar
                        </div>
                        <button class="ui positive right labeled icon button" onclick="validaForm()">
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
            function validaForm() {
                $('.ui.form')
                    .form({
                        fields: {
                            nome: {
                                identifier: 'nome',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Por favor digite seu nome'
                                    }
                                ]
                            },
                            email: {
                                identifier: 'email',
                                rules: [
                                    {
                                        type: 'email',
                                        prompt: 'Por favor digite um email válido'
                                    }
                                ]
                            },
                            endereco: {
                                identifier: 'endereco',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Por favor digite seu endereço'
                                    }
                                ]
                            },
                            telefone: {
                                identifier: 'telefone',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Por favor, digite seu numero de telefone'
                                    }
                                ]
                            },
                            cnpf: {
                                identifier: 'cnpf',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Por favor digite seu numero de cpf ou cnpj sem acentos ou pontos'
                                    },
                                ]
                            },
                            respovend: {
                                identifier: 'respovend',
                                rules: [
                                    {
                                        type: 'empty',
                                        prompt: 'Escreva o nome do responsável pela venda'
                                    }
                                ]
                            }
                        }
                    })
                    ;
            }
        </script>



</body>

</html>