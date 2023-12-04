<?php
function conectaBanco()
{
  $dsn = "mysql:host=127.0.0.1;dbname=loja";

  $user = "root";
  $passw = "123";

  $variavel = new PDO($dsn, $user, $passw);

  return $variavel;
}