<?php
/**
 * @author YapYoonEn
 */
$ex = new QRExpired();
if ($ex->invalid() == "valid") {
    $tableNo = $_GET['tno'];
    $orderId = $_GET['oid'];
    session(['tableNo' => $tableNo]);
    session(['orderId' => $orderId]);
    $ex->expired($orderId);
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/startOrder.css')}}">
        <title>Start Order</title>
    </head>
    <body>
        <div class="content">
            <center>
                <div class="logo-wrapper">
                    <?php
                    $image = 'https://static.thenounproject.com/png/368797-200.png';
                    $imageData = base64_encode(file_get_contents($image));
                    echo '<img id="image" src="data:image/png;base64,' . $imageData . '">';
                    ?>
                </div>
                <div class="text">
                    <a id="a" href="menu_di"><span id="text">Dine In</span></a><br>
                    <a id="a" href="menu_ta"><span id="text">Take Away</span></a><br>
                </div>
            </center>
        </div>
    </body>
</html>