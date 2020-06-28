<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	<?php
	require "./conexao.php";
	$id = $_REQUEST["id"];
	if ( $id != ""){
	try {
 
    $stmt = $conexao->prepare("select * from produtos where id=?");
        $stmt->bindParam(1, $id);
        if ($stmt->execute()) {
        	$rs = $stmt->fetch(PDO::FETCH_OBJ);
        	$produtoId = $rs->id;
        	$produtonome = $rs->nome;
        	$produtodescricao = $rs->descricao;
        	$produtopreco = $rs->preco;
        }else {
        	echo "Ocorreu um erro ao buscar produto";
        	die();
        }

} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
    die();
}	
	}else {
	echo "id vazio";
	die();
}
	?>
	<form action="atualizarproduto.php" method="post" enctype="multipart/form-data" >
		<div class="form-group">Nome<input class="form-control" type="text" name="id" value="<?php echo $produtoId;?>"></div>
		<div class="form-group">imagem<input class="form-control" type="file" name="imagem"></div>
		<div class="form-group">Nome<input class="form-control" type="text" name="nome" value="<?php echo $produtonome;?>"></div>
		<div class="form-group">Descrição<input class="form-control" type="text" name="descricao" value="<?php echo $produtodescricao;?>"></div>
		<div class="form-group">Preço<input class="form-control" type="text" name="preco" value="<?php echo $produtopreco;?>"></div>
		<button type="submit" class="btn btn-primary">Submit</button>

	</form>
	<a href="index.php" class="btn btn-primary">Listar Produtos </a>

	<?php
	$nome = $_REQUEST["nome"];
	$descricao = $_REQUEST["descricao"];
	$preco = $_REQUEST["preco"];
	$id = $_REQUEST["id"];
	if ( $id != "" && $nome != "" && $descricao != "" && $preco != "") {
	if($_FILES["imagem"]["error"]>0)
{
    echo "FILE ERROR";
    die();
}else if ($_FILES["imagem"]["name"]){
 	$filename = "uploads/".$_FILES["imagem"]["name"];
move_uploaded_file($_FILES["imagem"]["tmp_name"], $filename);
}

	try {
 
    $stmt = $conexao->prepare("UPDATE produtos SET nome=?, descricao=?, preco=?, imagem=? WHERE id = ?");
        $stmt->bindParam(1, $nome);
        $stmt->bindParam(2, $descricao);
        $stmt->bindParam(3, $preco);
        $stmt->bindParam(4, $filename);
        $stmt->bindParam(5, $id);
        if ($stmt->execute()) {
        	echo "Produto atualizado com sucesso";
        }else {
        	echo "Ocorreu um erro ao atualizar produto";
        }

} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}	
	}
	?>
</body>
</html>