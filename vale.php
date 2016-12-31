<?php
	include("sistema/conexao.php");

	$id = $_GET['id'];
?>
	<meta charset="utf-8">
	<title>titulo</title>
	<style type="text/css">
		*{
			margin: 0 auto;
			padding: 0;
			box-sizing: border-box;
			text-align: center;
			font-family: 'Arial',sans-serif;
		}
		h1{
			font-size: 1.2em;
		}
		small{
			font-size: 0.6em;
		}
		body{
			padding: 0.2cm;
			border: solid 1px black;
		}
		@page {
			margin: 0.2cm;
		}
		table{
			width: 100%;
		}
		td,th{
			text-align: left;
		}
		th{
			width: 40%;
		}
		img{
			margin-top: 10px;
		}
	</style>
</head>
<body>
	<?php 
			$select = buscarValeID($conexao,$id);
			while($vale = mysqli_fetch_assoc($select)){
	?>
	<table>
		<tr>
			<td colspan="2"><h1>Vale 01 almoço no Hotel</h1></td>
		</tr>
		<tr>
			<td colspan="2"><small><center>(Apresente juntamente com a CNH no restaurante)</center></small></td>
		</tr>
		<tr>
			<th>Almoço nrº:</th>
			<td><?= $vale['id']?></td>
		</tr>
		<tr>
			<th>Nome:</th>
			<td><?= $vale['nome']?></td>
		</tr>
		<tr>
			<th>Cat. CNH</th>
			<td><?= $vale['categoria']?></td>
		</tr>
		<tr>
			<th>Data:</th>
			<td><?= $vale['data']?></td>
		</tr>
		<tr>
			<td colspan="2"><center><img src="imagem_SISTEMA.png"></center></td>
		</tr>
	</table>
	<?php } ?>
	<script>
		window.print();
	</script>
</body>
</html>