<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <title>OrderList</title>
</head>
<body>
    <div>
       <table class="table table-striped">
           <thead class="thead-dark">
               <tr>
                    <th>ID</th>
                    <th>Total Price</th>
                    <th>Status</th>
                    <th>DateTime</th>
                    <th colspan="2">Action</th>
               </tr>
           </thead>
           <tbody>
               @foreach ($orders as $order)
                   <tr>
                       <td>{{$order['id']}}</td>
                       <td>{{$order['total_price']}}</td>
                       <td>{{$order['status']}}</td>
                       <td>{{$order['created_at']}}</td>

                       <td>
                           {{-- <a href="{{action('App\Http\Controllers\OrderController@approve',$order['id'])}}"
                           class="btn btn-warning">Approve</a> --}}
                       </td>
                       <td>
                        {{-- <a href="{{ App\Http\Controllers\OrderController::decline($order['id'])}}"
                        class="btn btn-danger">Decline</a> --}}
                        </td>
                    </tr>
               @endforeach
           </tbody>
       </table>
       

    </div>
</body>
</html>