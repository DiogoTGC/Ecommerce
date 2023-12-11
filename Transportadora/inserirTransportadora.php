<?php
$nm_transportadora = filter_input(INPUT_POST, "nm_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$cnpj_transportadora = filter_input(INPUT_POST, "cnpj_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$cep_transportadora = filter_input(INPUT_POST, "cep_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$cidade_transportadora = filter_input(INPUT_POST, "cidade_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$estado_transportadora = filter_input(INPUT_POST, "estado_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$endereco_transportadora = filter_input(INPUT_POST, "endereco_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$bairro_transportadora = filter_input(INPUT_POST, "bairro_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);
$num_endereco_transportadora = filter_input(INPUT_POST, "num_endereco_transportadora", FILTER_SANITIZE_SPECIAL_CHARS);

include_once '../funcoes/banco.php';
$conn = conectaBanco();

$sql = 
"insert into transportadora(nm_transportadora, cnpj_transportadora, cep_transportadora, cidade_transportadora, estado_transportadora, endereco_transportadora, bairro_transportadora, num_endereco_transportadora) 
values ('$nm_transportadora', '$cnpj_transportadora', '$cep_transportadora', '$cidade_transportadora', '$estado_transportadora', '$endereco_transportadora', '$bairro_transportadora', '$num_endereco_transportadora')";

$cadastro = [$nm_transportadora, $cnpj_transportadora, $cep_transportadora, $cidade_transportadora, $estado_transportadora, 
$endereco_transportadora, $bairro_transportadora, $num_endereco_transportadora];

$conn->beginTransaction();

try{
    foreach ($cadastro as $campo) {
        if ($campo == null || $campo == "") {
            throw new PDOException("Existem campos vazio(s). Complete todos os campos.");
        }
    }
    
    $conn->exec($sql);
} catch (PDOException $exc){
        if (str_contains($exc, "vazio")){
        header("location:cadastrarTransportadora.php");
        
        $conn = null;
        die();
        }
}

$conn->commit();
$conn = null;

header("location:../indexAdministrador.php");