@extends('orders.layout')
  
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Order Details</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> Back</a>
            </div>
        </div>
    </div>
   
    <table class="table table-bordered">
        <tr>
            <th>Food</th>
            <th>Quantity</th>
            <th>Price</th>
        </tr>
        @foreach ($order_details as $order)
        <tr>
            <td>{{ $order->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->price }}</td>  
        </tr>
        @endforeach
 
    </table>
    
    
@endsection