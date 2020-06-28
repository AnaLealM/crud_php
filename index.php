<!DOCTYPE html>
<html lang="pt-br">
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<meta charset="UTF-8">
	<title>CADASTRAMENTO</title>
</head>
<body>
	<h1>teste php</h1>
	
	 <a href="adicionarproduto.php" class="btn btn-primary">Adicionar Produdo </a>
	<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">imagem</th>
      <th scope="col">nome</th>
      <th scope="col">descricao</th>
      <th scope="col">preco</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
	<?php
	require "conexao.php";
	try {
 
    $stmt = $conexao->prepare("SELECT * FROM produtos");

 
        if ($stmt->execute()) {
            while ($rs = $stmt->fetch(PDO::FETCH_OBJ)) {
                echo "<tr>";
                echo "<td>".$rs->id."</td>";
                echo "<td><img src='".$rs->imagem."'/></td>";
                echo "<td>".$rs->nome."</td>";
                echo "<td>".$rs->descricao."</td>";
                echo "<td>".$rs->preco."</td>";
                echo "<td><a href='atualizarproduto.php?id=".$rs->id."'>atualizar</a></td>";
                echo "<td><a href='deletarproduto.php?id=".$rs->id."'>deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "Erro: Não foi possível recuperar os dados do banco de dados";
        }
} catch (PDOException $erro) {
    echo "Erro: ".$erro->getMessage();
}


	?>
</tbody>
</table>
</body>
</html>