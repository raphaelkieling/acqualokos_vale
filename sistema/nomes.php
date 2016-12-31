<?php
	include("conexao.php");

	$palavra = $_GET['palavra'];
	$select =  listarValesNome($conexao,$palavra);
	while($vales = mysqli_fetch_assoc($select)){?>
		<tr><td class="sug"><?= $vales['nome'] ?></td></tr>	
<?php
     } 
?>
<script>
		$(".sug").click(function(){
			var nome = $(this).text();
			$("#nome").val(nome);
		});
</script>