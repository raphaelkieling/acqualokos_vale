<?php
	include("conexao.php");

	$nome = $_GET['nome'];
	$categoria = $_GET['categoria'];
	$telefone = $_GET['telefone'];
	$empresa = $_GET['empresa'];

	adicionarVale($conexao,$nome,$categoria,$telefone,$empresa);

?>
<?php
	$select = listarVales($conexao);
	while($vales = mysqli_fetch_assoc($select)){
		include("../tabela.php");
	} ?>