<?php
/**
 * @author YapYoonEn
 */
$method = session()->get('method');
$o = session()->get('orderId');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/billing.css')}}">
        <title>Bill</title>
    </head>
    <body>
        <div class="content">
            <center>
                @if(isset($bill))
                <table id="display-bill">
                    <tr id="display-bill2">
                        <th id="item">Item</th>
                        <th id="quantity">Qty</th>
                        <th id="price">RM&nbsp;&nbsp;</th>
                    </tr>

                    <?php $subtotal = 0;
                    $i = 0; ?>
                    @foreach($bill as $b) 
                    <?php 
                    $name = session('billname')[$i];
                    $i++;?>
                        <?php $subtotal += $b['price'] ?>
                        <tr>
                            <td id="item">{{$name}}</td>
                            <td id="quantity">{{$b['quantity']}}</td>
                            <td id="price">{{$b['price']}}</td>
                        </tr>
                    @endforeach
                    <tr id="dot">
                        <td id="title" colspan="2" align="right">Subtotal &nbsp;</td>
                        <td id="price"><?php echo number_format($subtotal, 2) ?></td>
                    </tr>
                    @if($order != null)
                    <?php $service = $subtotal * 10 / 100 ?>
                    <tr>
                        <td id="title" colspan="2" align="right">Service (10%) &nbsp;</td>
                        <td id="price"><?php echo number_format($service, 2) ?></td>
                    </tr>
                    @endif
                    <tr>
                        <?php $tax = $subtotal * 6 / 100 ?>
                        <td id="title" colspan="2" align="right">Tax (6%) &nbsp;</td>
                        <td id="price"><?php echo number_format($tax, 2) ?></td>
                    </tr>

                    <tr id="dot">
                        <td colspan="2" align="right">Total &nbsp;</td>
                        <td id="price">
                            <?php
                            $context = new TotalPriceContext();
                            $context->initInstance($o);
                            echo $context->sub($subtotal);
                            ?>
                        </td>
                    </tr>
                </table>
                <div>
                    <input id="button" type="button" value="Continue Order" onclick="window.location ='{{url("menu_$method")}}'" />
                </div>
                @else
                <div>
                    <br><br><input id="button" type="button" value="Continue Order" onclick="window.location ='{{url("menu_$method")}}'" />
                </div>
                <?php
                $image = 'https://cdn-icons-png.flaticon.com/512/242/242637.png';
                $imageData = base64_encode(file_get_contents($image));
                echo '<img id="image" src="data:image/png;base64,' . $imageData . '">';
                echo '<p id="text">Your Bill Is Empty</p>';
                ?>
                @endif
            </center>
        </div>
    </body>
</html>