<?php
/**
 * @author YapYoonEn
 */
$o = session()->get('orderId');
$t = session()->get('tableNo');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/onlineOrder.css')}}">
        <title>Menu</title>
    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{url('/?tno='.$t.'&oid='.$o)}}"><i id="icon" class="fa fa-angle-double-left"></i>&nbsp;Back</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href=""><i id="icon" class="fa fa-book"></i>&nbsp;Menu</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="cart"><i id="icon" class="fa fa-shopping-cart"></i>&nbsp;Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="bill"><i id="icon" class="fa fa-file-text"></i>&nbsp;Bill</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </header>
        <div id="base">
            <h2>Menu</h2>
            <div id="base2">
                @foreach($food_beverages as $food)
                <div class="content-wrapper">
                    <span id="price">RM&nbsp;{{$food->price}}</span>
                    <span id="name">{{$food->name}}</span>
                    <span id="desc">{{$food->desc}}</span>
                    <div class="order">
                        <a id="button" href="{{url('add-to-cart/'.$food->id)}}" role="button">Add To Cart</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </body>
</html>