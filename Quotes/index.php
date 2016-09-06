<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ARE YOU A QUOTE YET?</title>
    <link rel="stylesheet" href="../static/css/quotes.css">
  </head>
  <body>
    <?php 
      $FileName = "FlatFileDatabase.memes";
      $data = file($FileName);
      foreach($data as $line) {
    ?>
    <div class="quote">
      <?php           
        $data = explode("|", htmlspecialchars($line));
        echo '<div class="text">'.$data[0].'</div><div class="date">'.$data[1].'</div>';
      ?>
    </div>
    <?php
      }
    ?>
    <div id="corner">
      <a href="mailto:mikael@rubixy.com?subject=jef quote" "Quote">Suggest a quote</a>
    </div>
  </body>
</html>

<!-- Idea by Fed993 -->
