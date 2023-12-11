<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar Produto</title>
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
            <h2>Cadastrar Produto</h2>
            
            <form action="inserirProduto.php" method="post">
                <div>Nome do produto:<input type="text" name="nm_produto"></div>
                <div>Peso do produto:<input type="text" name="ps_produto"></div>
                <div>Unidade de venda:<input type="text" name="unidade_venda"></div>
                <div>Dimensões do produto:<input type="text" name="dimensoes_produto"></div>
                <div>Quantidade do produto:<input type="number" name="qtd_produto"></div>
                <div>Preço unitário:<input type="text" name="vl_unitario"></div>
                <div>Categoria<select name="id_categoria">
                    <?php
                    include_once '../funcoes/banco.php';
                    $conn = conectaBanco();

                    $sql = "select * from categoria order by id_categoria";
                    $resultado = $conn->query($sql);

                    while ($categoria = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        $id_categoria = $categoria["id_categoria"];
                        $nm_categoria = $categoria["nm_categoria"];

                        echo "<option value=" . $id_categoria . ">$nm_categoria</option>";
                    }
                    ?>
                </select></div>
                
                <a href="../indexAdministrador.php">Cancelar</a>
                <input type="reset" value="Restaurar">
                <input type="submit" value="Cadastrar">
            </form>

        </div>
    </body>
</html>