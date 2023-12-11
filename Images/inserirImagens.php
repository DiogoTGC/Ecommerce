<?php
include_once '../funcoes/banco.php';
$conn = conectaBanco();

$id_produto = filter_input(INPUT_POST, "id_produto", FILTER_SANITIZE_SPECIAL_CHARS);
$imagens = $_FILES["imagens"];

mkdir("produtos/" . $id_produto);

for ($cont = 0; $cont < count($imagens["name"]); $cont++) {
    $destino = "produtos/$id_produto/" . $imagens["name"][$cont];

    if (move_uploaded_file($imagens["tmp_name"][$cont], $destino)) {
        $sql = "insert into imagem(url_imagem, id_produto) 
        values ('$destino', $id_produto)";
        $conn->beginTransaction();

        try{
            if ($destino == '' || $destino == null || $id_produto == '' || $id_produto == null) {
                throw new PDOException("Existem campos vazio(s). Complete todos os campos.");
            }
            $conn->exec($sql);
        } catch (PDOException $exc){
            if (str_contains($exc, "vazio")){
            header("location:cadastrarProduto.php");
            
            $conn = null;
            die();
            }
        }

        $conn->commit();
    } else {
        $err = $imagens["error"][$cont];
        
        if ($err == 4) {
            $msgerr = "Selecione uma imagem";
        }
        header("location:./cadastrarImagens.php&msgerr=$msgerr");
    }
    header("location:../indexAdministrador.php");
}