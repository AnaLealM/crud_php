<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<form action="adicionarproduto.php" method="post" enctype="multipart/form-data" >
		<div class="form-group">Nome<input class="form-control" type="text" name="nome"></div>
		<div class="form-group">imagem<input class="form-control" type="file" name="imagem"></div>
		<div class="form-group">Descrição<input class="form-control" type="text" name="descricao"></div>
		<div class="form-group">Preço<input class="form-control" type="text" name="preco"></div>
		<button type="submit" class="btn btn-primary">Submit</button>

	</form>
	<a href="index.php" class="btn btn-primary">Listar Produtos </a>

	<?php
	require "./conexao.php";
	$nome = $_REQUEST["nome"];
	$descricao = $_REQUEST["descricao"];
	$preco = $_REQUEST["preco"];
	if ( $nome != "" && $descricao != "" && $preco != "") {
		if($_FILES["imagem"]["error"]>0)
{
    echo "FILE ERROR";
    die();
}else if ($_FILES["imagem"]["name"]){
 	$filename = "uploads/".$_FILES["imagem"]["name"];
move_uploaded_file($_FILES["imagem"]["tmp_name"], $filename);
}
	try {
 
    $stmt = $conexao->prepare("INSERT INTO produtos (nome, descricao, preco, imagem) VALUES (?, ?, ?, ?)");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $preco);
        $stmt->bindParam(4, $filename);
        if ($stmt->execute()) {
        	echo "Produto adicionado com sucesso";
        }else {
        	echo "Ocorreu um erro ao adcionar produto";
        }

} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}	
	}
	?>
</body>
</html>