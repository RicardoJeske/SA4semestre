<div id="content">
    <div class="inner">

        <!-- Post -->
        <article class="box post post-excerpt">
            <header>
                <!--
                        Note: Titles and subtitles will wrap automatically when necessary, so don't worry
                        if they get too long. You can also remove the <p> entirely if you don't
                        need a subtitle.
                -->
                <h2><a href="#">Cadastro de Usuário</a></h2>
               <!--<p>A free, fully responsive HTML5 site template by HTML5 UP</p>-->
            </header>
            <div class="info">
                <!--
                        Note: The date should be formatted exactly as it's shown below. In particular, the
                        "least significant" characters of the month should be encapsulated in a <span>
                        element to denote what gets dropped in 1200px mode (eg. the "uary" in "January").
                        Oh, and if you don't need a date for a particular page or post you can simply delete
                        the entire "date" element.
                        
                -->
                <span class="date"><span class="month">Jul<span>y</span></span> <span class="day">14</span><span class="year">, 2014</span></span>
                <!--
                        Note: You can change the number of list items in "stats" to whatever you want.
                -->
                <ul class="stats">
                    <li><a href="#" class="icon fa-comment">16</a></li>
                    <li><a href="#" class="icon fa-heart">32</a></li>
                    <li><a href="#" class="icon fa-twitter">64</a></li>
                    <li><a href="#" class="icon fa-facebook">128</a></li>
                </ul>
            </div>

            <?php echo form_open_multipart('pessoas/inserir', 'id="form-pessoas"'); ?>

            <label for="nome">Nome:</label><br/>
            <input type="text" name="nome" value="<?php echo set_value('nome'); ?>"/>
            <div class="error"><?php echo form_error('nome'); ?></div>

            <label for="senha">Senha</label><br/>
            <input type="password" name="senha" value="<?php echo set_value('senha'); ?>"/>
            <div class="error"><?php echo form_error('senha'); ?></div>

            <label for="email">Email:</label><br/>
            <input type="text" name="email" value="<?php echo set_value('email'); ?>"/>
            <div class="error"><?php echo form_error('email'); ?></div>


            <label for="foto">Foto:</label><br/>
            <input type="file" name="userfile" />
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
                            <a title="Editar" href="<?php echo base_url() . 'pessoas/editar/' . $pessoa->idusuario; ?>"><?php echo $pessoa->nome; ?></a>
                            <span> - </span>
                            <span><?php echo $pessoa->email; ?></span>                     
                        </li>
                    <?php endforeach ?>
                </ul>
            </div>
            <!-- Fim Lista -->

        </article>



        <!-- Pagination -->
        <div class="pagination">
            <!--<a href="#" class="button previous">Previous Page</a>-->
            <!--
            <div class="pages">
                <a href="#" class="active">1</a>
                <a href="#">2</a>
                <a href="#">3</a>
                <a href="#">4</a>
                <span>&hellip;</span>
                <a href="#">20</a>
            </div>
            <a href="#" class="button next">Next Page</a>
        </div>
            -->
        </div>
    </div>
</div>