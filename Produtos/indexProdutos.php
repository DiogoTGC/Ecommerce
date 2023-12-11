<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Produtos</title>
        <link rel="stylesheet" type="text/css" href="../css/navbar.css" />
    </head>
    <body>
        <div class="topnav">
            <img src="../Images/logo.png" alt="Cabrum" style="width: 5%;" />
            <a href="../Produtos/indexProdutos.php" class="active">Produtos</a>
            <a href="../Pedidos/indexPedidos.php">Pedidos</a>
            <a href="../Carrinho/indexCarrinho.php">Carrinho</a>
        </div>

        <div style="padding:30px;margin-top:50px;">
            <?php
            $categoria = filter_input(INPUT_GET, "id_categoria", FILTER_SANITIZE_SPECIAL_CHARS);

            include_once '../funcoes/banco.php';

            $conn = conectaBanco();

            if ($categoria != null) {
                $sql = "select nm_categoria from categoria where id_categoria = $categoria";
                $resultado = $conn->query($sql);
                $registro = $resultado->fetch(PDO::FETCH_ASSOC);

                $nm_categoria = $registro["nm_categoria"];
                echo "<h2>Produtos: $nm_categoria</h2>";
                
                $sql = "select * from produto where id_categoria = $categoria";
            } else {
                echo "<h2>Todos os produtos</h2>";
                $sql = "select * from produto";
            }
            ?>

            <table border="2px">
                <thead>
                    <th>Identificador</th>
                    <th>Produto</th>
                    <th>Preço (R$)</th>
                    <th>Quantidade</th>
                </thead>
                <tbody>
                    <?php
                    $resultado = $conn->query($sql);

                    while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                            echo "<td>" . $registro["id_produto"] . "</td>";
                            echo "<td>" . $registro["nm_produto"] . "</td>";
                            echo "<td>" . $registro["vl_unitario"] . "</td>";
                            echo "<td>" . $registro["qtd_produto"] . "</td>";
                    ?>
                            <td>
                                <a href="detalheProduto.php?id_produto=<?=$registro["id_produto"];?>">Ver</a>
                                <a href="indexCarrinho.php?id_produto=<?=$registro["id_produto"];?>">Comprar</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </body>
</html>