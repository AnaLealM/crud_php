<?php

try {
    $conexao = new PDO("mysql:host=localhost; dbname=crud", "root", "");
} catch (PDOException $erro) {
	echo "ERRO".$erro;
 
}



?>