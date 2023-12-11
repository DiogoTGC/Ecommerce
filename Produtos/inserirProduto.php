<?php
$nm_produto = filter_input(INPUT_POST, "nm_produto", FILTER_SANITIZE_SPECIAL_CHARS);
$ps_produto = filter_input(INPUT_POST, "ps_produto", FILTER_SANITIZE_SPECIAL_CHARS);
$unidade_venda = filter_input(INPUT_POST, "unidade_venda", FILTER_SANITIZE_SPECIAL_CHARS);
$dimensoes_produto = filter_input(INPUT_POST, "dimensoes_produto", FILTER_SANITIZE_SPECIAL_CHARS);
$qtd_produto = filter_input(INPUT_POST, "qtd_produto", FILTER_SANITIZE_SPECIAL_CHARS);
$vl_unitario = filter_input(INPUT_POST, "vl_unitario", FILTER_SANITIZE_SPECIAL_CHARS);
$id_categoria = filter_input(INPUT_POST, "id_categoria", FILTER_SANITIZE_SPECIAL_CHARS);

include_once '../funcoes/banco.php';
$conn = conectaBanco();

$sql = "insert into produto(nm_produto, ps_produto, unidade_venda, dimensoes_produto, qtd_produto, vl_unitario, id_categoria) 
    values ('$nm_produto', '$ps_produto', '$unidade_venda', '$dimensoes_produto', $qtd_produto, $vl_unitario, $id_categoria)";

$conn->beginTransaction();

try{
    if ($nm_produto == '' || $nm_produto == null || $ps_produto == '' || $ps_produto == null || 
    $unidade_venda == '' || $unidade_venda == null || $dimensoes_produto == '' || $dimensoes_produto == null) {
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
$conn = null;

header("location:../Images/cadastrarImagens.php");