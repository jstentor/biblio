<?php ?>

<table>
	<tbody>
		<thead>
			<tr><td>Título (search)</td></tr>
		</thead>
		<tbody>
			<?php 
			foreach ($hallados as $libro) {
				echo "<tr><td>" . $libro->titulo . "</td></tr>";
			}
			?>
		</tbody>
	</tbody>
</table>
