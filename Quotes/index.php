<!DOCTYPE html>
<html>
    <header>
        <title>ARE YOU A QUOTE YET?</title>
        <link rel="stylesheet" href="css.css">
    </header>
    <body>
    <?php 
        $FileName = "FlatFileDatabase.memes";
        $data = file($FileName);
        foreach($data as $line){
            ?><div class="quote">
            <?php 
            
            $data = explode("|", htmlspecialchars($line));
            echo $data[0].'<div class="date">'.$data[1].'</div>';
            
            ?></div>
            
            
            <?php
        }
    ?>
        <div id="corner">
                <a href="mailto:mikael@rubixy.com?subject=jef quote" "Quote">Suggest a quote</a>
        </div>
    </body>
</html>

<!-- Idea by Fed993 -->
