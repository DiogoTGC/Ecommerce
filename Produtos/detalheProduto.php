<!DOCTYPE html>
<html lang="pt-br">
    <?php
    $id_produto = filter_input(INPUT_GET, "id_produto", FILTER_SANITIZE_SPECIAL_CHARS);

    include_once '../funcoes/banco.php';
    $conn = conectaBanco();

    if ($id_produto == null) {
        header("location:../index.php");
    }

    $sql = "select * from produto where id_produto = $id_produto";
    $resultado = $conn->query($sql);
    $produto = $resultado->fetch(PDO::FETCH_ASSOC);

    $sql = "select * from imagem where id_produto = $id_produto";
    $imagens = $conn->query($sql);
    ?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cabrum-<?=$produto["nm_produto"];?></title>
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
            <h2><div><?=$produto["nm_produto"];?></div></h2>
            
            <?php
            $i = 0;

            while ($imagem = $imagens->fetch(PDO::FETCH_ASSOC)) {
                $id_imagem = $imagem["id_imagem"];
                $url_imagem = $imagem["url_imagem"];

                if ($i % 5 == 0) {
                    echo "<br>";
                }

                echo '<img style="padding:5px" src="../Images/' . $url_imagem . '">';

                $i += 1;
            }
            ?>

            <table>
                <tr>
                    <td>
                        <div>Dimensões:<?=$produto["dimensoes_produto"];?> Peso:<?=$produto["ps_produto"];?></div>
                        <div>Quantidade em estoque: <?=$produto["qtd_produto"];?> </div>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button>+ Carrinho</button><button>Comprar</button></td>
                </tr>
            </table>
        </div>
    </body>
</html>