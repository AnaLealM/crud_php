<?php
	require "./conexao.php";
	$id = $_REQUEST["id"];
	
	try {
 
    $stmt = $conexao->prepare("delete from produtos where id=?");
        $stmt->bindParam(1, $id);
       
        if ($stmt->execute()) {
        	echo "Produto excluido com sucesso";
        }else {
        	echo "Ocorreu um erro ao excluir o produto";
        }

} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
} 
?>
<a href="index.php" class="btn btn-primary">Listar Produtos </a>