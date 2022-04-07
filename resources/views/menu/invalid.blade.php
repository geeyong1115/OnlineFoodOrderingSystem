<?php
/**
 * @author YapYoonEn
 */
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{asset('css/billing.css')}}" />
          <meta name="viewport" content="width=device-width, initial-scale=1">
    <title></title>
  </head>
  <body>
    <div class="content">
        <center>
        <div class="logo-wrapper">
            <?php
                $image = 'https://freepikpsd.com/file/2020/03/Time-PNG-Clipart.png';
                $imageData = base64_encode(file_get_contents($image));
                echo '<img id="image" src="data:image/png;base64,' . $imageData . '">';
                ?>
        </div>
            <hr id="hr">
            <p id="text">Expired</p>
            <hr id="hr">
            <br><br><br>
        </center>
    </div>
  </body>
</html>