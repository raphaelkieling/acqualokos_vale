
<?php include("sistema/conexao.php");?>
<!DOCTYPE html>
<html lang="pt_br">
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="css/sugestao.css">
	<link href="https://fonts.googleapis.com/css?family=Questrial" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/form.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<meta charset="UTF-8">
	<title>Vale Almoço</title>
</head>
</head>
<body>
	<header>
		<div class="header-wallpaper">
			<img src="img/logo_2.png" alt="">
		</div>
	</header>
	<br><br>
	<main class="container">
		<h1 style="margin-top:10px;">Criar vale para o almoço</h1>

		<table>
			<tr>
				<td>Nome:</td>
				<td><input type="text" name="nome" id="nome" placeholder="Nome" onkeyup="procurarNome();"></td>		
			</tr>
			<tr>
				<td></td>
				<td id="pesquisa-focada">
				<div class="sugestao">
					<table class="sugestao-table">
						<legend>Nomes já cadastrados</legend>
					</table>
				</div>
				</td>
			</tr>
			<tr>
				<td>Categoria CNH</td>
				<td><input type="text" name="categoria" id="categoria" placeholder="Categoria do CNH"></td>
			</tr>
			<tr>
				<td>Telefone:</td>
				<td><input type="text" name="telefone" id="telefone" placeholder="Telefone"></td>
			</tr>
			<tr>
				<td>Empresa:</td>
				<td><input type="text" name="empresa" id="empresa" placeholder="Empresa"></td>
			</tr>
			<tr>
				<td colspan="2"><button class="btn btn-big btn-success form-control" id="btn-adicionar">Adicionar</button></td>
			</tr>
		</table>
		<h1 style="margin-top:30px;">Procurar</h1>
		<table class="table table-blue table-hover texto-centralizado" id="data" >
			<tr>
				<td colspan="8">
					<input type="text" id="palavra" class="form-controlado" placeholder="Procurar por nome - data - categoria ou Número do Almoço" onkeyup="procurar();">
				</td>
			</tr>
			<tr>
				<th>Numero Almoço:</th>
				<th>Nome:</th>
				<th>Categoria CNH:</th>
				<th>Telefone:</th>
				<th>Empresa:</th>
				<th>Data:</th>
				<th>Disponibilidade:</th>
				<th>Imprimir:</th>
			</tr>
				<?php
					$select = listarVales($conexao);
					while($vales = mysqli_fetch_assoc($select)){
						include("tabela.php");
					} ?>
		</table>
	</main>
	<script src="js/jquery-3.1.1.js"></script>
	<script>
		$("#btn-adicionar").click(function(){
			var nome = $("#nome").val();
			var categoria = $("#categoria").val();
			var telefone = $("#telefone").val();
			var empresa = $("#empresa").val();
			if(confirm("Tem certeza que deseja cadastrar e imprimir?")){
				$.ajax({
					type:"GET",
					url:"sistema/adicionar.php",
					data:{nome:nome,categoria:categoria,telefone:telefone, empresa:empresa},
					success:function(data){
						$("#nome").val("");
						$("#categoria").val("");
						
						$(".data-remove").remove();
						$("#data").append(data);
					}
				});
			}
		});
		
		function procurar(){
			var palavra = $('#palavra').val();
				$.ajax({
					type:"GET",
					url:"sistema/procurar.php",
					data:{palavra:palavra},
					success:function(data){
						$(".data-remove").remove();
						$("#data").append(data);
					}
				});
		}
		
		function procurarNome(){
			var palavra = $('#nome').val();
			$.ajax({
				type:"GET",
				url:"sistema/nomes.php",
				data:{palavra:palavra},
				success:function(data){
					$(".sug").parent('tr').remove();
					$(".sugestao-table").append(data);
				}
			});
		}
		
		$("#pesquisa-focada").hide();
		
		$("#nome").mouseenter(function(){
			$("#pesquisa-focada").show();
		});
		

		$("#pesquisa-focada").mouseleave(function(){
			$("#pesquisa-focada").hide();
		});

	</script>
</body>
</html>