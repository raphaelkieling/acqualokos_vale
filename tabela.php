<?php 
	$data = date("d/m/Y");

?>
	<tr class="data-remove" id="<?= $vales['id']; ?>">
				<td><?= $vales['id']; ?></td>
				<td><?= $vales['nome']; ?></td>
				<td><?= $vales['categoria']; ?></td>
				<td><?= $vales['telefone']; ?></td>
				<td><?= $vales['empresa']; ?></td>
				<td><?= $vales['data']; ?></td>
				<?php
						if($vales['data']!=$data){
					?>
						<td><center><img src="img/calendar.png"></center></td>
					<?php
						}else{
					?>
						<td><center><img src="img/calendar2.png"></center></td>
					<?php		
						}
				?>
				<?php
						if($vales['data']!=$data){
					?>
						<td><center>x</center></td>
					<?php
						}else{
					?>
						<td><center><a href="vale.php?id=<?= $vales['id']?>"><img src="img/print.png"></a></center></td>
					<?php		
						}
				?>
				
	</tr>