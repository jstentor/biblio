<?php ?>

<table>
	<tbody>
		<thead>
			<tr><td>Título</td><td>Asignar</td></tr>
		</thead>
		<tbody>
			<?php 
			foreach ($hallados as $libro) {
				echo "<tr><td>" 
					. $libro->titulo  
				. "</td><td>"  
				    . $this->Form->button('ok', ['type' => 'button', 'class' => 'fi-check button tiny success',
				    'onclick' => 'agregaUno(\'libro' . $key . '\'); return false;'])
				    . $libro->id  
				. "</td></tr>";
			}
			?>
		</tbody>
	</tbody>
</table>

<?php
$this->Html->scriptStart(['block' => true]);
echo <<<EOL
let jsId;
function agregaUno( idLibro ) {
	// Convertir campo oculto a json
	let losLibros = JSON.parse($('#libros_hidden').val());
	// agregar elemento de json
	losLibros[] = idLibro;
	// actualizar campo oculto
	$('#libros_hidden').val(JSON.stringify(losLibros));
	// agregar elemento a la tabla
	// obtener tamaño de tabla para obtener índice
	//$('#titulo' + indice).add...();
}
EOL;
$this->Html->scriptEnd();
?>