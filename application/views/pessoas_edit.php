<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="<?php echo base_url(); ?>assets/css/style.css"/>
    </head>
    <body>
        <?php echo form_open('pessoas/atualizar', 'id="form-pessoas"'); ?>

        <input type="hidden" name="idusuario" value="<?php echo $dados_pessoa[0]->idusuario; ?>"/>

        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" value="<?php echo $dados_pessoa[0]->nome; ?>"/>
        <div class="error"><?php echo form_error('nome'); ?></div>

        <label for="email">Email:</label><br/>
        <input type="text" name="email" value="<?php echo $dados_pessoa[0]->email; ?>"/>
        <div class="error"><?php echo form_error('email'); ?></div>

        <label for="senha">Senha:</label><br/>
        <input type="password" name="senha" value="<?php echo $dados_pessoa[0]->senha; ?>"/>
        <div class="error"><?php echo form_error('senha'); ?></div>

        <label for="foto">Foto:</label><br/>
        <input type="text" name="foto" value="<?php echo $dados_pessoa[0]->foto; ?>"/>
        <div class="error"><?php echo form_error('foto'); ?></div>
        
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" 
        <?php if (isset($sexo) && $sexo == "masculino")$dados_pessoa[0]->sexo; ?>
            value="masculino">Masculino
        <input type="radio" name="sexo" 
        <?php if (isset($sexo) && $sexo == "feminino")$dados_pessoa[0]->sexo; ?>
            value="feminino">Feminino
        <div class="error"><?php echo form_error('sexo'); ?></div>
        
        <label for="cidade">Cidade:</label><br/>
        <input type="text" name="cidade" value="<?php echo $dados_pessoa[0]->cidade; ?>"/>
        <div class="error"><?php echo form_error('cidade'); ?></div>
        
        <label for="estado">Estado:</label><br/>
        <input type="text" name="estado" value="<?php echo $dados_pessoa[0]->estado; ?>"/>
        <div class="error"><?php echo form_error('estado'); ?></div>

        <label for="endereco">Endereço:</label><br/>
        <input type="text" name="endereco" value="<?php echo $dados_pessoa[0]->endereco; ?>"/>
        <div class="error"><?php echo form_error('endereco'); ?></div>
        
        <label for="´cep">CEP:</label><br/>
        <input type="text" name="cep" value="<?php echo $dados_pessoa[0]->cep; ?>"/>
        <div class="error"><?php echo form_error('cep'); ?></div>
        
        
        <input type="submit" name="atualizar" value="Atualizar" />

        <?php echo form_close(); ?>
    </body>
</html>