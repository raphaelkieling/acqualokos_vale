<?php
	include("conexao.php");
	$palavra = $_GET['palavra'];
	$select =  listarValesProcurado($conexao,$palavra);
	while($vales = mysqli_fetch_assoc($select)){
		include("../tabela.php");
     } ?>