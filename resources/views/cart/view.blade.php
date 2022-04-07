<?php
/**
 * @author YapYoonEn
 */
$o = session()->get('orderId');
$method = session()->get('method');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/cart.css')}}">
        <title>Cart</title>
    </head>
    <body>
        <div id="content">
            <center><br>
                @if(session($o) != null)
                <h2>Your Cart</h2>
                <div id="cartContent">
                    <table>
                        <thead>
                            <tr>
                                <th style="width: 40%">Item</th>
                                <th style="width: 10%">Quantity</th>
                                <th style="width: 20%">Price (RM)</th>
                                <th style="width: 20%">Subtotal (RM)</th>
                                <th style="width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php $total = 0 ?>
                            <!-- by this code session get all product that user chose -->
                            @foreach(session($o) as $id => $details)

                            <?php $total += $details['price'] * $details['quantity'] ?>

                            <tr>
                                <td data-th="Item">{{$details['name']}}</td>
                                <td data-th="Quantity"><a id="button" href="{{url('decrease-cart/'.$id)}}" role="button"><i class="fa fa-minus"></i>&nbsp;&nbsp;</a>{{$details['quantity']}}<a id="button" href="{{url('increase-cart/'.$id)}}" role="button">&nbsp;&nbsp;<i class="fa fa-plus"></i></a></td>
                                <td data-th="Price">{{$details['price']}}</td>
                                <?php $subtotal = $details['price'] * $details['quantity'] ?>
                                <td data-th="Subtotal" class="text-center"><?php echo number_format($subtotal, 2) ?></td>
                                <td class="actions" data-th="Action"><a id="button" href="{{url('remove-from-cart/'.$id)}}" role="button"><i class="fa fa-trash-o"></i></a></td>
                            </tr>
                            @endforeach

                        </tbody>

                        <tfoot>

                            <tr>
                                <td colspan="3" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total <?php echo number_format($total, 2) ?></strong></td>
                            </tr>
                        </tfoot>
                    </table>

                    <div id="buttonForm">
                        <a id="cart-btn" href="{{url('placeOrder/'.$total)}}" role="button">Place Order<i class="fa fa-check-circle" aria-hidden="true"></i></a>
                        <input id="cart-btn" type="button" value="Continue Order" onclick="window.location ='{{url("menu_$method")}}'" />
                    </div>
                </div>
                @else
                <div id="buttonForm">
                    <input id="cart-btn" type="button" value="Continue Order" onclick="window.location ='{{url("menu_$method")}}'" />
                </div>
                <?php
                $image = 'https://www.bardanstore.com/_nuxt/img/d0bcbce.png';
                $imageData = base64_encode(file_get_contents($image));
                echo '<img id="image" src="data:image/png;base64,' . $imageData . '">';
                ?>
                @endif
            </center>
        </div>
    </body>
</html>