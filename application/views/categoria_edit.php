<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/estilo.css"/>
    </head>
    <body>
        <?php echo form_open('categoria/atualizar', 'id="form-categoria"'); ?>

        <input type="hidden" name="id" value="<?php echo $dados_categoria[0]->id; ?>"/>

        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" value="<?php echo $dados_categoria[0]->nome?>"/>
        <div class="error"><?php echo form_error('nome'); ?></div>

        <label for="descricao">Descrição:</label><br/>
        <input type="text" name="descricao" value="<?php echo $dados_categoria[0]->descricao; ?>"/>
        <div class="error"><?php echo form_error('descricao'); ?></div>
     
       
       

        <input type="submit" name="atualizar" value="Atualizar" />

        <?php echo form_close(); ?>
    </body>
</html>
