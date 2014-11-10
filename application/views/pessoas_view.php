<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type=”text/css” rel=”stylesheet” href=”<?php echo base_url(); ?>assets/css/style.css”/>
    </head>
    <body>
        <?php echo form_open('pessoas/inserir', 'id="form-pessoas"'); ?>

        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
        <div class="error"><?php echo form_error('nome'); ?></div>
        <label for="senha">Senha:</label><br/>
        <input type="password" name="senha" value="<?php echo set_value('senha'); ?>"/>
        <div class="error"><?php echo form_error('senha'); ?></div>
        <label for="email">Email:</label><br/>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
        <div class="error"><?php echo form_error('email'); ?></div>
        <label for="foto">Foto:</label><br/>
        <input type="text" name="foto" value="<?php echo set_value('foto'); ?>"/>
        <div class="error"><?php echo form_error('foto'); ?></div>
        <label for="sexo">Sexo:</label>
        <input type="radio" name="sexo" 
        <?php if (isset($sexo) && $sexo == "Masculino") $dados_pessoa[0]->sexo; ?>
               value="Masculino">Masculino
        <input type="radio" name="sexo" 
        <?php if (isset($sexo) && $sexo == "Feminino") $dados_pessoa[0]->sexo; ?>
               value="Feminino">Feminino
        <div class="error"><?php echo form_error('sexo'); ?></div>
        <label for="cidade">Cidade:</label><br/>
        <input type="text" name="cidade" value="<?php echo set_value('cidade'); ?>"/>
        <div class="error"><?php echo form_error('cidade'); ?></div>
        <label for="estado">Estado:</label><br/>
        <input type="text" name="estado" value="<?php echo set_value('estado'); ?>"/>
        <div class="error"><?php echo form_error('estado'); ?></div>
        <label for="endereco">Endereço:</label><br/>
        <input type="text" name="endereco" value="<?php echo set_value('endereco'); ?>"/>
        <div class="error"><?php echo form_error('endereco'); ?></div>
        <label for="cep">CEP:</label><br/>
        <input type="text" name="cep" value="<?php echo set_value('cep'); ?>"/>
        <div class="error"><?php echo form_error('cep'); ?></div>
        <input type="submit" name="cadastrar" value="Cadastrar" />


        <?php echo form_close(); ?>
        <!-- Lista as Pessoas Cadastradas -->
        <div id="grid-pessoas">

            <ul>
                <?php foreach ($pessoas as $pessoa): ?>
                    <li>
                        <a title="Deletar" href="<?php echo base_url() . 'pessoas/deletar/' . $pessoa->idusuario; ?>" onclick="return confirm('Confirma a exclusão deste registro?')">X</a>
                        <span> - </span>
                        <a title="Editar" href="<?php echo base_url() . 'pessoas/editar/' . $pessoa->idusuario; ?>"><?php echo $pessoa->nome; ?></a>
                    </li>
                <?php endforeach ?>
            </ul>
        </div>
        <!-- Fim Lista -->
    </body>
</html>