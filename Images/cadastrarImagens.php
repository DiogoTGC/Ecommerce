<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar fotos dos produtos</title>
        <link rel="stylesheet" href="../css/navbar.css">
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
            <?php
            include_once '../funcoes/banco.php';
            $conn = conectaBanco();

            $sql = "select * from produto order by id_produto asc";

            $resultado = $conn->query($sql);
            ?>
            <h2>Cadastrar Imagens</h2>

            <form action="inserirImagens.php" method="post" enctype="multipart/form-data">
                <div>Produto:<select name="id_produto">
                    <?php
                    while ($produto = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        $id_produto = $produto["id_produto"];
                        $nm_produto = $produto["nm_produto"];

                        echo "<option value=$id_produto>$nm_produto</option>";
                    }
                    ?>
                </select></div>
                <div>Enviar imagem:
                    <input type="file" name="imagens[]" multiple="multiple">
                </div>

                <br>

                <a href="../indexAdministrador.php">Cancelar</a>
                <button type="submit">Enviar imagem</button>
            </form>
        </div>
    </body>
</html>