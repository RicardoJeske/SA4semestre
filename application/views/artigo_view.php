<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type=”text/css” rel=”stylesheet” href=”<?php echo base_url(); ?>assets/css/estilo.css”/>
    </head>
    <body>
        <?php echo form_open('artigos/inserir', 'id="form-artigos"'); ?>

        <label for="titulo">Título:</label><br/>
        <input type="text" name="titulo" value="<?php echo set_value('titulo'); ?>"/>
        <div class="error"><?php echo form_error('titulo'); ?></div>
        <label for="corpo">Corpo:</label><br/>
        <input type="text" name="corpo" value="<?php echo set_value('corpo'); ?>"/>
        <div class="error"><?php echo form_error('corpo'); ?></div>
       
        
        
        <input type="submit" name="cadastrar" value="Cadastrar" />
        
        <?php echo form_close(); ?>
        <!-- Lista as Pessoas Cadastradas -->
        <div id="grid-artigos">

            <ul>
                <?php foreach ($artigos as $artigo): ?>
                    <li>
                        <a title="Deletar" href="<?php echo base_url() . 'artigos/deletar/' . $artigo->idartigo; ?>" onclick="return confirm('Confirma a exclusão deste registro?')">X</a>
                        <span> - </span>
                        <a title="Editar" href="<?php echo base_url() . 'artigos/editar/' . $artigo->idartigo; ?>"><?php echo $artigo->titulo; ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- Fim Lista -->
    </body>
</html>