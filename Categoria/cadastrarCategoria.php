<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Categoria</title>
        <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
    </head>
    <body>
        <div class="topnav">
            <img src="../Images/logo.png" alt="Cabrum" style="width: 5%;" />
            <a href="../Produtos/indexProdutos.php">Produtos</a>
            <a href="../Pedidos/indexPedidos.php">Pedidos</a>
            <a href="../Carrinho/indexCarrinho.php">Carrinho</a>
            <a href="../indexAdministrador.php" class="active">Administrador</a>
        </div>

        <div style="padding:30px;margin-top:50px;">
            <h2>Cadastrar Categoria</h2>
            <form action="inserirCategoria.php" method="post">
                <div>Nome da categoria:<input type="text" name="categoria"></div>
                
                <a href="../indexAdministrador.php">Cancelar</a>
                <input type="reset" value="Restaurar">
                <input type="submit" value="Cadastrar">
            </form>
        </div>
    </body>
</html>