<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" type="text/css" href="../css/navbar.css">
    </head>
    <body>
        <div class="topnav">
            <img src="../images/logo.png" alt="Cabrum" style="width: 5%;" />
            <a href="../Produtos/indexProdutos.php">Produtos</a>
            <a href="../Pedidos/indexPedidos.php">Pedidos</a>
            <a href="../Carrinho/indexCarrinho.php">Carrinho</a>
            <a href="../indexAdministrador.php" class="active">Administrador</a>
        </div>
        
        <div style="padding:30px;margin-top:50px;">
            <h2>Cadastrar Transportadora</h2>

            <form action="inserirTransportadora.php" method="post">
                <div>Transportadora:<input type="text" name="nm_transportadora"></div>
                <div>CNPJ:<input type="text" name="cnpj_transportadora"></div>
                <div>CEP:<input type="text" name="cep_transportadora"></div>
                <div>Cidade:<input type="text" name="cidade_transportadora"></div>
                <div>Estado:<input type="text" name="estado_transportadora"></div>
                <div>Endereço:<input type="text" name="endereco_transportadora"></div>
                <div>Bairro:<input type="text" name="bairro_transportadora"></div>
                <div>Número do endereço:<input type="text" name="num_endereco_transportadora"></div>

                <a href="../indexAdministrador.php">Cancelar</a>
                <input type="reset" value="Restaurar">
                <input type="submit" value="Cadastrar">
            </form>

        </div>
    </body>
</html>