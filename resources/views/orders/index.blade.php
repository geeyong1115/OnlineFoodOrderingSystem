@extends('orders.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Orders</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-warning" href="{{ 'order-history' }}">Order History</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Total Price</th>
            <th>Table No</th>
            <th>Status</th>
            <th>DateTime</th>
            <th >Action</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ $order->id }}</td>
            <td>{{ $order->total_price }}</td>
            <td>{{ $order->table_no }}</td>
            <td>{{ $order->status == '0' ? 'Pending' : 'Completed' }}</td>
            <td>{{ $order->datetime }}</td>

            <td>
               <form action="{{url('update-order/'.$order->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div>
                        <a href="{{url('view-order/'.$order->id)}}" class="btn btn-primary">View</a>

                        <button type="submit" class="btn btn-primary">Update</button>
            
                        <select class="pull-right form-select" name="order_status" >
                            <option {{$order->status =='0'?'selected':''}} value="0">Pending</option>
                            <option {{$order->status =='1'?'selected':''}} value="1">Completed</option>
                            {{-- <option {{$order->status =='2'?'selected':''}} value="2">Rejected</option> --}}
                        </select>
                    </div>
                </form>
            </td>
            
        </tr>
        @endforeach
    </table>
  
      
@endsection