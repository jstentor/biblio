<?php ?>

<table>
	<tbody>
		<thead>
			<tr><td>Autor</td><td>Asignar</td></tr>
		</thead>
		<tbody>
		<?php foreach ($hallados as $autor) : ?>
			<tr id=<?= 'busca-autor' . $autor['id']?>>
				<td><?= $autor->ape_nom ?></td>
				<td><?= $this->Form->button('', [
					'type' => 'button', 
					'class' => 'fi-check button tiny success nomargin',
			    	'onclick' => 'agregaUno(' . $autor['id'] . ', \'' . $autor['ape_nom'] . '\'); return false;'
			    ]) ?></td>
			</tr>
		<?php endforeach;	?>
		</tbody>
	</tbody>
</table>

<?php
$this->Html->scriptStart(['block' => true]);
echo <<<EOL
EOL;
$this->Html->scriptEnd();
?>