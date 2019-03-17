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
    <!-- pagina de informações do cliente-->

    <!-- aqui nessa pagina eu utilizo o mesmo esquema do update eu pego as informacoes e coloco aqui 
        a diferença e que elas vao ficar soltar por aqui-->
    <div class="wrapper">
        <div class="ui list detalhes">
            <div class="item"><i class="user icon"></i>Nome: <?php echo $cliente->nome; ?></div>
            <div class="item"><i class="envelope icon"></i>Email: <?php echo $cliente->email; ?></div>
            <div class="item"><i class="home icon"></i>Endereço de cobrança: <?php echo $cliente->endereco; ?></div>
            <div class="item"><i class="phone icon"></i>Telefone: <?php echo $cliente->telefone; ?></div>
            <div class="item"><i class="address card icon"></i>CPF ou CNPJ: <?php echo $cliente->cnpf; ?></div>
            <div class="item"><i class="address book outline icon"></i>Responsável pela venda: <?php echo $cliente->respovend; ?></div>
            <div class="item"><i class="comment icon"></i>Observaçoes: <?php echo $cliente->outros; ?></div>
            <a  class="ui animated vertical button" href="/ProjetoLandx/">
                <div class="visible content">Voltar</div>
                <div class="hidden content">
                    <i class="left arrow icon"></i>
                </div>
            </a>
        </div>
    </div>
</body>

</html> 