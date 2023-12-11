<?php
$categoria = filter_input(INPUT_POST, "categoria", FILTER_SANITIZE_SPECIAL_CHARS);

include_once '../funcoes/banco.php';
$conn = conectaBanco();

$sql = "insert into categoria(nm_categoria) values ('$categoria')";

$conn->beginTransaction();

try{
    if ($categoria == '' || $categoria == null) {
        throw new PDOException("Existem campos vazio(s). Complete todos os campos.");
    }

    $conn->exec($sql);
} catch (PDOException $exc){
     if (str_contains($exc, "vazio")){
        header("location:cadastrarCategoria.php");
        
        $conn = null;
        die();
     }
}

$conn->commit();
$conn = null;

header("location:../indexAdministrador.php");
