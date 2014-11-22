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
                <h2><a href="#">Login</a></h2>
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



            <?php echo form_open('verifylogin'); ?>

            <label for="email">Email:</label><br/>
            <input type="email" name="email" value="<?php echo set_value('email'); ?>"/>
            <div class="error"><?php echo form_error('email'); ?></div>

            <label for="senha">Senha:</label><br/>
            <input type="password" name="senha" value="<?php echo set_value('senha'); ?>"/>
            <div class="error"><?php echo form_error('senha'); ?></div>

            <input type="submit" value="Login"/>
    </div>
</div>
