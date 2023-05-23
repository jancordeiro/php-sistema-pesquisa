<?php
	include('conexao.php');	
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE-edge">
  <meta name="viewport" content="width=devide-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" type="text/css" href="style.css">
  <title>Sistema de Pesquisa PHP</title>
</head>
<body>
	<div class="container">
		<h2>Sistema de Pesquisa em PHP</h2><br>
		<form action="">
			<input type="text" placeholder="Pesquise um produto" name="busca">		
			<button type="submit">Pesquisar</button>
		</form><br>
		<div>
			<table width="500px" border="1">
				<tr>
					<th>Produto</th>
					<th>Marca</th>
					<th>Preço</th>
				</tr>
				<?php
				if(!isset($_GET['busca'])) {
					?>
				<tr>
					<td colspan="3">Digita algo para pesquisar...</td>
				</tr>
				<?php
				} else {
					$pesquisa = $mysqli->real_escape_string($_GET['busca']);
					$sql_code = "SELECT * 
						FROM produtos 
						WHERE produto LIKE '%$pesquisa%' 
						OR marca LIKE '%$pesquisa%' 
						OR preco LIKE '%$pesquisa%'";
					
					$sql_query = $mysqli->query($sql_code) or die ("Erro ao consultar " .$mysqli->error);
					
					if($sql_query->num_rows == 0) {
						?>					
					<tr>
						<td colspan="3">Nenhum resultado encontrado :( </td>
					</tr>
					<?php
					} else {
						while($dados = $sql_query->fetch_assoc()) {
							?>
							<tr>
								<td><?php echo $dados['produto']; ?></td>
								<td><?php echo $dados['marca']; ?></td>
								<td>R$ <?php echo $dados['preco']; ?></td>
							</tr>
							<?php
						}
					} ?>
				<?php	
				} ?>
			</table>
		</div>
	</div>
	<br><a href="https://github.com/jancordeiro" class="git" target="_blank"><i class="fa-brands fa-github"></i></a>
</body>
</html>