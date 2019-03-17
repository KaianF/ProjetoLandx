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
    <link rel="stylesheet" type="text/css" media="screen" href="application\third_party\Style.css">
    <script src="https://unpkg.com/ionicons@4.5.5/dist/ionicons.js"></script>
    <link href="https://unpkg.com/ionicons@4.5.5/dist/css/ionicons.min.css" rel="stylesheet">
</head>

<body>
    <!-- 
        Nesse projeto eu utilizei a biblioteca Semantic-Ui, Nela voce possui uma vasta possibilidade de elementos para 
        interface de usuario, usei ela em vez de bootstrap pois e a a que eu tenho mais afinidade.
    -->

    <!-- aqui eu crio wrapper para utilizar a tecnica flex box para alinhamento -->
    <div class="wrapper">
        <div class="lista">
            <h1>Lista de clientes</h1>
            
    <!-- tabela que lista os clientes existentes no banco com os seus respecitvos emails e nome -->
    
            <table  class="ui unstackable table">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th style="display:table-cell;text-align: center;">Ações</th>
                    </tr>
                </thead>

    <!-- Aqui eu estou rendereizando uma lista de objeto com foreach transformando pegando cada elemento
     por vez do array -->
                
                <?php $index = 0;
                foreach ($clientes as $cliente) {
                    echo '<tbody>';
                    echo '<tr>';
                    echo '    <td>' . $cliente->nome . '</td>';
                    echo '    <td>' . $cliente->email . '</td>';
                    echo '    <td class="right aligned">';
                    echo'<div class="icons">';

                    // aqui eu crio os botoes de Atualizar, vizualizar e deletar 
                    echo'<a class="ion-md-create" href="/ProjetoLandx/Clientes/update/' . $cliente->Id . '"></a>';
                    echo'<a class="ion-md-information-circle"href="/ProjetoLandx/Clientes/detalhes/' . $cliente->Id . '"></a>';
                    echo'<a class="ion-md-close" onclick="modalCerteza(' . $cliente->Id . ')"></a>';
                    echo'<a class="x icon"></a>';
                    echo'</div>';
                    echo'</td>';
                    echo "</tr>";
                    echo "</tbody>";
                    //aqui fica o modal para cada item da lista assim não tendo que abrir todos de uma vez
                    // eu coloquei o id da classe como o id do cliente, entao quando chama o metodo para confirmar se 
                    // tens certeza que deseja excluir o cliente, ele aparece um modal dedicado

                    //inicio do modal
                    echo "<div class='confirma ui basic modal certeza " . $cliente->Id . "'>";
                    echo "  <div>";
                    echo "      <div class='description confirma'>";
                    echo "          <h1>Você tem certeza que deseja escluir o cliente " . $cliente->nome . " da sua lista de clientes?</h1>";
                    echo "      </div>";
                    echo "  <div class='ui red deny negative button close'>";
                    echo "      Cancelar";
                    echo "  </div>";
                    echo "  <a class='ui positive right labeled icon button' href='/ProjetoLandx/Clientes/deletar/".$cliente->Id."'>";
                    echo "      Deletar ";
                    echo "      <i class='checkmark icon'></i>";
                    echo "  </a>";
                    echo "</div>";
                    echo "</div>";
                    //fim do modal

                }
                ?>
            </table>
            <!-- botao que abre o modal com um formulario para adicionar -->
            <!-- inicio do botao -->
            <div class="adiciona ui animated fade green button teste" onclick="modalInsere()">
                <div class="visible content">
                    <i class="plus icon"></i>
                </div>

                <div class="hidden content">
                    Adicionar
                </div>
            </div>
            <!-- fim do botao -->
            <!-- inicio do modal com formulario -->
            <div class="ui modal">
                <i class="close icon"></i>
                <div class="header">
                    Adicionar um novo cliente
                </div>
                <div class="description">
                    <form class="ui form formulario" method="post" action="/ProjetoLandx/Clientes/adicionarCli">
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
                        <div class="ui red deny  button">
                            Cancelar
                        </div>
                        <!-- botao confirma, ao clicar chama um script que valida os campos do formulario antes de inserir-->
                        <button class="ui positive right labeled icon button" onclick="validaForm()">
                            Adicionar
                            <i class="checkmark icon"></i>
                        </button>
                    </form>
                </div>
            </div>
            <!-- fim do modal com formulario -->
        </div>
        <script>
            //funcao para abrir o modal de inserçao
            function modalInsere() {
                $('.ui.modal').modal({
                    blurring: true
                }).modal('show')

            }
            //modal para confirmar se tens certeza
            function modalCerteza(id) {
                $(".ui.modal.certeza." + id).modal({
                    blurring: true
                }).modal('toggle').modal({
                    //esse modal possui apenas duas opcoes e tendo que escolher apenas uma das duas nao da pra fechar sem escolher
                    selector: {
                        close: '.close, .actions .button',
                        approve: '.actions .positive, .actions .approve, .actions .ok .ui .positive .right .labeled .icon .button',
                        deny: '.actions .negative, .actions .deny, .actions .cancel'
                    },
                })
            }
            //validando o formulario
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