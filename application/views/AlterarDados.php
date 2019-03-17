<?php 
defined('BASEPATH') or exit('No direct script acess allowed');
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Lista de Clientes </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js" integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8=" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="/ProjetoLandx/application/third_party/Semantic/semantic.css">
    <script src="ProjetoLandx/application/third_party/Semantic/semantic.min.js"></script>
    <link rel="stylesheet" type="text/css" media="screen" href="\ProjetoLandx\application\third_party\Style.css">
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
    <!-- essa pagina é apenas um formulario para alterar os dados do usuario

        nos campos que sao preenchidos no cadastro aqui eles sao preenchidos com os dados do banco de dados
        -->
    <div class="formAtualizar">
        <form class="ui form formulario" method="post" action="/ProjetoLandx/Clientes/adicionarCli">
            <div class="two fields">
                <div class="field">
                    <label>Nome</label>
                    <input name="nome" maxlength="20" type="text" placeholder="Nome" value="<?php echo $cliente->nome; ?>">
                </div>
                <div class="field">
                    <label>Email</label>
                    <input name="email" maxlength="100" type="email" placeholder="Email" value="<?php echo $cliente->email; ?>">
                </div>
            </div>
            <div class="field">
                <label>Endereço de cobrança</label>
                <input name="endereco" maxlength="100" type="text" placeholder="Endereço" value="<?php echo $cliente->endereco; ?>">
            </div>
            <div class="three fields">
                <div class="field">
                    <label>Telefone</label>
                    <input type="text" name="telefone" maxlength="20" placeholder="Tel:" value="<?php echo $cliente->telefone; ?>">
                </div>
                <div class="five field">
                    <label>CPF</label>
                    <input type="number" step="1" maxlength="20" name="cnpf" placeholder="sem traços ou" value="<?php echo $cliente->cnpf; ?>">
                </div>
                <div class="field">
                    <label>Responsável pela venda</label>
                    <input type="text" maxlength="20" name="respovend" placeholder="exemplo:Kaian Ferreira" value="<?php echo $cliente->respovend; ?>">
                </div>
            </div>
            <div class="field">
                <label>Observações</label>
                <input type="text" maxlength="100" name="outros" placeholder="Max 100 caracteres" value="<?php echo $cliente->outros; ?>">
                <!-- esse campo em especial é oque utilzamos para diferenciar o metodo de cadastrar com o de atualizar -->
                <!-- metodo de cadastrar nao possui um id e o de atualizar sim assim na hora que formos puxar os dados -->
                <!-- iremos verificar se possui id ou se possui é feito um update no banco e se nao possuir e inserido no banco-->
                <input type="hidden" maxlength="100" name="Id" placeholder="Max 100 caracteres" value="<?php echo $cliente->Id; ?>">
                <div class="ui error message"></div>
                <button class="ui red deny button" href="/">
                    Cancelar
                </button>
                <button class="ui positive right labeled icon button" type="submit">
                    Adicionar
                    <i class="checkmark icon"></i>
                </button>
        </form>
    </div>
    <script>
        //validando o formulario assim que nem o cadastro
        function validaForm() {
            $('.ui.form')
                .form({
                    fields: {
                        nome: {
                            identifier: 'nome',
                            rules: [{
                                type: 'empty',
                                prompt: 'Por favor digite seu nome'
                            }]
                        },
                        email: {
                            identifier: 'email',
                            rules: [{
                                type: 'email',
                                prompt: 'Por favor digite um email válido'
                            }]
                        },
                        endereco: {
                            identifier: 'endereco',
                            rules: [{
                                type: 'empty',
                                prompt: 'Por favor digite seu endereço'
                            }]
                        },
                        telefone: {
                            identifier: 'telefone',
                            rules: [{
                                type: 'empty',
                                prompt: 'Por favor, digite seu numero de telefone'
                            }]
                        },
                        cnpf: {
                            identifier: 'cnpf',
                            rules: [{
                                type: 'empty',
                                prompt: 'Por favor digite seu numero de cpf ou cnpj sem acentos ou pontos'
                            }, ]
                        },
                        respovend: {
                            identifier: 'respovend',
                            rules: [{
                                type: 'empty',
                                prompt: 'Escreva o nome do responsável pela venda'
                            }]
                        }
                    }
                });
        }
    </script>
</body>

</html> 