<?php ?>

<table>
	<tbody>
		<thead>
			<tr><td>Título</td><td>id</td></tr>
		</thead>
		<tbody>
			<?php 
			foreach ($hallados as $libro) {
				echo "<tr><td>" . 
					$libro->titulo . 
				"</td><td>" . 
					$libro->id . 
				"</td></tr>";
			}
			?>
		</tbody>
	</tbody>
</table>
