<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
    </head>
    <body>
        <?php echo form_open('artigos/atualizar', 'id="form-artigos"'); ?>

        <input type="hidden" name="idartigo" value="<?php echo $dados_artigo[0]->idartigo; ?>"/>

        <label for="titulo">Título:</label><br/>
        <input type="text" name="titulo" value="<?php echo $dados_artigo[0]->titulo; ?>"/>
        <div class="error"><?php echo form_error('titulo'); ?></div>

        <label for="corpo">Corpo:</label><br/>
        <input type="text" name="corpo" value="<?php echo $dados_artigo[0]->corpo; ?>"/>
        <div class="error"><?php echo form_error('corpo'); ?></div>
        
        
        <input type="submit" name="atualizar" value="Atualizar" />

        <?php echo form_close(); ?>
    </body>
</html>