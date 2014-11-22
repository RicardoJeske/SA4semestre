<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url();?>assets/css/estilo.css"/>
    </head>
    <body>
        
        <?php echo form_open('categoria/inserir', 'id="form-categoria"'); ?>

        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
        <div class="error"><?php echo form_error('nome'); ?></div>

        <label for="descricao">Descrição:</label><br/>
        <input type="text" name="senha" value="<?php echo set_value('descricao'); ?>"/>
        <div class="error"><?php echo form_error('descricao'); ?></div>
        
        
        <input type="submit" name="cadastrar" value="Cadastrar" />



        <!-- Lista as Pessoas Cadastradas -->
        <div id="grid-pessoas">
            <ul>
                <?php foreach ($categoria as $categoria): ?>
                    <li>
                        <a title="Deletar" href="<?php echo base_url() . 'categoria/deletar/' . $categoria->id; ?>" onclick="return confirm('Confirma a exclusão deste registro?')">X</a>
                        <span> - </span>
                        <a title="Editar" href="<?php echo base_url() . 'categoria/editar/' . $categoria->id; ?>"><?php echo $categoria->nome; ?></a>
                     
                        
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- Fim Lista -->
    </body>
</html>
