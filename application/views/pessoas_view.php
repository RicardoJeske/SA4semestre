<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <title><?php echo $titulo; ?></title>
        <meta charset="UTF-8" />
        <link type="text/css" rel="stylesheet" href="http://localhost/SA4semestre/assets/css/style.css"/>
    </head>
    <body>
        
        <?php echo form_open('pessoas/inserir', 'id="form-pessoas"'); ?>

        <label for="nome">Nome:</label><br/>
        <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
        <div class="error"><?php echo form_error('nome'); ?></div>

        <label for="senha">Senha</label><br/>
        <input type="password" name="senha" value="<?php echo set_value(md5('senha')); ?>"/>
        <div class="error"><?php echo form_error('senha'); ?></div>

        <label for="email">Email:</label><br/>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
        <div class="error"><?php echo form_error('email'); ?></div>


        <label for="foto">Foto:</label><br/>
        <input type="file" name="foto"/>
        <div class="error"><?php echo form_error('foto'); ?></div>


        <label for="sexo">Sexo:</label><br/>
        <input type="radio" name="sexo" 
        <?php if (isset($sexo) && $sexo == "Masculino") echo "checked"; ?>
               value="masculino" checked>Masculino
        <input type="radio" name="sexo"
        <?php if (isset($sexo) && $sexo == "Feminino") echo "checked"; ?>
               value="feminino">Feminino
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
        <input type="number" name="cep" value=""/>
        <div class="error"><?php echo form_error('cep'); ?></div>

        <input type="submit" name="cadastrar" value="Cadastrar" />



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
