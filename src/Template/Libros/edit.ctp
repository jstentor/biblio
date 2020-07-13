<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Libro $libro
 */
?>

<nav class="large-2 medium-3 columns" id="actions-sidebar">
    <ul class="side-nav">
        <li class="heading"><?= __('Actions') ?></li>
        <li><?=
            $this->Form->postLink(
                    __('Delete'),
                    ['action' => 'delete', $libro->id],
                    ['confirm' => __('Are you sure you want to delete # {0}?', $libro->id)]
            )
            ?></li>
        <li><?= $this->Html->link(__('List Libros'), ['action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('List Temas'), ['controller' => 'Temas', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Tema'), ['controller' => 'Temas', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Autores'), ['controller' => 'Autores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Autor'), ['controller' => 'Autores', 'action' => 'add']) ?></li>
        <li><?= $this->Html->link(__('List Old Autores'), ['controller' => 'OldAutores', 'action' => 'index']) ?></li>
        <li><?= $this->Html->link(__('New Old Autore'), ['controller' => 'OldAutores', 'action' => 'add']) ?></li>
    </ul>
</nav>
<div class="libros form large-10 medium-9 columns content">
    <?= $this->Form->create($libro) ?>
    <fieldset>
        <legend><?= __('Edit Libro') ?></legend>

        <div class="row">
            <?php
            echo $this->Form->control('nombreautor', ['label' => 'Nombre del autor', 'disabled', 'templates' => [
                    'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('titulo', ['templates' => [
                    'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
            ]]);
            ?>
        </div>
        <div class="row">
            <?php
            echo $this->Form->control('tema', ['templates' => [
                    'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('topografia', ['templates' => [
                    'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
            ]]);
            ?>
        </div>
        <div class="row">
            <?php
            echo $this->Form->control('idioma', ['templates' => [
                    'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('traductor', ['templates' => [
                    'inputContainer' => '<div class="large-6 columns">{{content}}</div>'
            ]]);
            ?>
        </div>
        <div class="row">
            <?php
            echo $this->Form->control('tipo', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('editorial', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('ciudad', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            ?>
        </div>
        <div class="row">
            <?php
            echo $this->Form->control('edicion', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('anio_edicion', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('primera_edicion', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            ?>
        </div>
        <div class="row">
            <?php
            echo $this->Form->control('paginas', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('tomos', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            echo $this->Form->control('baja', ['templates' => [
                    'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
            ]]);
            ?>
        </div>

        <div class="row">
            <h3>Autores relacionados</h3>
            <?= $this->Form->hidden('autores_hidden', ['id' => 'autores_hidden', 'value' => $autores_hidden]); ?> 	
            <table class="noborder">
                <tr>
                    <td class="noborder" width="50%">
                        <div id="autores-div">
                            <table id="tabla_autores">
                                <tr>
                                    <th>Autor</th>
                                    <th>¿Desasignar?</th>
                                </tr>
                                <?php
                                if (!empty($libro['autores'])):
                                    foreach ($libro['autores'] as $key => $output):
                                        ?>
                                        <tr id="autor<?= $key ?>">
                                            <td><?php echo $output['ape_nom']; ?></td>

                                            <td><?php
                                                echo $this->Form->button('', [
                                                    'type' => 'button',
                                                    'class' => 'button alert tiny fi-x nomargin',
                                                    //'id'=>$key,
                                                    'onclick' => 'borraUno(\'autor' . $key . '\'); return false;'
                                                ]);
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </table>
                        </div>
                    </td>
                    <td class="noborder" width="50%">

                        <table>
                            <tr><th>Asignar Autor</th></tr>
                            <tr><td class="ui-widget">
                                    <div class="large-8 columns">
                                        <?=
                                        $this->Form->text('busca-autores', ['label' => 'Autores: ', 'id' => 'busca-autores', 'templates' => [
                                                'inputContainer' => '<div class="large-4 columns">{{content}}</div>'
                                        ]]);
                                        ?>
                                    </div>
                                    <div class="large-2 columns">
                                        <?=
                                        $this->Form->button('', [
                                            'type' => 'button',
                                            'class' => 'button warning tiny fi-x nomargin',
                                            'alt' => 'Borrar entrada',
                                            'onclick' => 'borraEntrada(); return false;'
                                        ]);
                                        ?>
                                    </div>
                                    <div class="large-2 columns">
                                        <?=
                                        $this->Form->button('', [
                                            'type' => 'button',
                                            'class' => 'button tiny fi-plus nomargin disabled',
                                            'alt' => 'Añadir autor',
                                            'id' => 'button-add',
                                            'disabled' => 'true',
                                            'onclick' => 'addAutor(); return false;'
                                        ]);
                                        ?>
                                    </div>
                                    <div class="error columns" id="errores"></div>
                                    <div id="datos-autores">

                                    </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
            </table>
        </div>
        <?= $this->Form->button(__('Submit')) ?>
    </fieldset>
    <?= $this->Form->end() ?>

    <!-- https://discourse.cakephp.org/t/how-to-make-simple-jquery-ajax-in-cakephp-3-7/5834/2 -->

<script>
    let jsId;
    function borraUno(idTr) {
        // Convertir campo oculto a json
        let losAutores = JSON.parse($('#autores_hidden').val());
        // borrar elemento de json
        delete losAutores[idTr];
        // actualizar campo oculto
        $('#autores_hidden').val(JSON.stringify(losAutores));
        // borrar elemento de la tabla
        $('#' + idTr).remove();
    }

    /* <<< común a todos los livesearch */
    var accentMap = {
        "á": "a", "Á": "A", "é": "e", "É": "E", "ë": "e", "Ë": "E", "í": "i", "Í": "I", "ó": "o", "Ó": "o", "ú": "u", "Ú": "U", "ü": "u", "Ü": "U"
    };

    var normalize = function (term) {
        var ret = "";
        for (var i = 0; i < term.length; i++) {
            ret += accentMap[ term.charAt(i) ] || term.charAt(i);
        }
        return ret;
    };
    /* común a todos los livesearch >>>*/

    $("#busca-autores").keyup(function () {
        var searchkey = $(this).val();
        $('#errores').html("");
        if (searchkey.length == 0) {
            $('#datos-autores').empty();
            $('#button-add').attr('disabled', 'disabled')
                    .addClass('disabled');
        } else {
            searchAutores(searchkey);
            if (searchkey.length > 5) {
                $('#button-add').removeAttr('disabled')
                        .removeClass('disabled');
            }
        }
    });

    function addAutor() {
        let autor = $("#busca-autores").val();
        var retVal = confirm("¿Desea añadir este autor a la base de datos?: " + autor);
        if (retVal =! true) {
            return;
        }
        $.ajax({
            method: 'post',

            url: "<?= $this->url->build(['controller' => 'autores', 'action' => 'addautor']) ?>" + "/" + autor,

            success: function (response) {
                if (response == null || response == undefined) { // es un error
                    $('#errores').html('Se ha producido un error al guardar el autor.');
                } else {
                    console.log(response);
                    agregaUno( response.id, response.ape_nom)
                }
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                $('#errores').html('Se ha producido un error al guardar el autor.');
            }
        });

    }

    function borraEntrada() {
        $('#busca-autores').val('');
        $('#datos-autores').empty();
    }

    function searchAutores(keyword) {
        var data = keyword;
        $.ajax({
            method: 'get',

            url: "<?= $this->url->build(['controller' => 'autores', 'action' => 'search']) ?>" + "/" + keyword + "/<?= $libro->id ?>",

            success: function (response) {
                // TODO: Aquí filtrar y quitar los autores que ya estén asociados
                $('#datos-autores').html(response);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                console.log(xhr.status);
                console.log(thrownError);
                $('#errores').html('Se ha producido un error al buscar el autor.');
            }
        });
    }

    function agregaUno(idAutor, ape_nom) {
        // Convertir campo oculto a json
        let losAutores = JSON.parse($('#autores_hidden').val());
        console.log(losAutores);

        // obtener número de autor más alto y sumar uno
        let proximoNumero = -1;
        for (var key of Object.keys(losAutores)) {
            console.log(key + " -> " + losAutores[key]);
            let num = parseInt(key.substr(5));
            proximoNumero = (num > proximoNumero) ? num : proximoNumero;
        }
        proximoNumero += 1;

        // agregar elemento de json: hay que agregar un elemento al objeto losAutores, no al array... a ver cómo
        losAutores['autor' + proximoNumero] = idAutor;

        // actualizar campo oculto
        $('#autores_hidden').val(JSON.stringify(losAutores));
        console.log(losAutores);

        // eliminar autor de la tabla de búsquda
        $('#busca-autor' + idAutor).remove();
        console.log('#busca-autor' + idAutor);

        // agregar elemento a la tabla
        let newTr = $("<tr>");
        newTr.attr('id', 'autor' + proximoNumero);
        newTr.append('<td>' + ape_nom + '</td>');
        newTr.append('<td><button type="button" class="button alert tiny fi-x" onclick="borraUno(\'autor' + proximoNumero + '\'); return false;"></button></td>');


        $('#tabla_autores > tbody').append(newTr);
        console.log(idAutor, ape_nom);
    }

</script>

