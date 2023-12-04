<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title>Página inicial</title>
        <link rel="stylesheet" type="text/css" href="css/navbar.css" />
    </head>
    <body>
        <div class="topnav">
            <img src="images/logo.png" alt="Cabrum" style="width: 5%;" />
            <a href="Produtos/indexProdutos.php">Produtos</a>
            <a href="Pedidos/indexPedidos.php">Pedidos</a>
            <a href="Carrinho/indexCarrinho.php">Carrinho</a>
        </div>
        <?php
            include_once './funcoes/banco.php';

            $conn = conectaBanco();
            $sql = 'select * from categoria;';
            $resultado = $conn->query($sql);
        ?>

        <div><h2>Procure os produtos pela categoria</h2></div>
        <?php
        $i = 0;

        while ($categoria = $resultado->fetch(PDO::FETCH_ASSOC)) {
            $id_categoria = $categoria["id_categoria"];
            $nm_categoria = $categoria["nm_categoria"];

            if ($i % 5 == 0) {
                echo "<br>";
            }

            echo '<a style="padding:5px" href="Produtos/indexProdutos?id_categoria=' . $id_categoria . '">' . $nm_categoria . '</a>';

            $i += 1;
        }
        ?>

    </body>
</html>