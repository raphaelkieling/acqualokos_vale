<?php
	//cria o banco de dados
	$con = mysqli_connect("localhost","root","");
	$con -> query("CREATE DATABASE IF NOT EXISTS acqualokos_vale");
	$con -> query("USE acqualokos_vales");
	$con -> query("CREATE TABLE IF NOT EXISTS `vales` (`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT ,`nome` varchar(250) NOT NULL,`categoria` varchar(250) NOT NULL,`data` varchar(250) NOT NULL) ENGINE=InnoDB DEFAULT CHARSET=latin1;");

	date_default_timezone_set('America/Sao_Paulo');
	$conexao = mysqli_connect("localhost","root","","acqualokos_vale");

	function listarVales($conexao){
		return mysqli_query($conexao,"select * from vales order by id desc");
	}

	function listarValesProcurado($conexao,$palavra){
		return mysqli_query($conexao,"select * from vales where nome like '%$palavra%' or id like '%$palavra%' or data like '%$palavra%' or nome like '%$palavra%' or categoria like '%$palavra%' or empresa like '%$palavra%'  order by id desc");
	}

	function listarValesNome($conexao,$palavra){
		return mysqli_query($conexao,"select DISTINCT nome from vales where nome like '%$palavra%'");
	}

	function adicionarVale($conexao,$nome,$categoria,$telefone,$empresa){
		$data = date("d/m/Y");
		if(mysqli_query($conexao,"insert into vales(nome,categoria,telefone,empresa,data) values('$nome','$categoria','$telefone','$empresa','$data')")){
			return true;
		}else{
			return false;
		}
	}

	function buscarValeID($conexao,$id){
		return mysqli_query($conexao,"select * from vales where id=$id");
	}

	function deletarVale($conexao,$id){
		return mysqli_query($conexao,"delete from vales where id=$id");
	}
?>