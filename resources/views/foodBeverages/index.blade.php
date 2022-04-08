@extends('foodBeverages.layout')
 
@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Food and Beverages</h2>
            </div>
            
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('foodBeverages.create') }}"> Create New Food and Beverage</a>
            </div>
            <div class="pull-right">
                <a class="btn btn-info" href="{{ url('xml-foodBeverages') }}"> XML</a>
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
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Instock_Qty</th>
            <th>Status</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($foodBeverages as $foodBeverage)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $foodBeverage->name }}</td>
            <td>{{ $foodBeverage->desc }}</td>
            <td>{{ $foodBeverage->price }}</td>
            <td>{{ $foodBeverage->instock_qty }}</td>
            <td>{{ $foodBeverage->status }}</td>
            <td>
                <form action="{{ route('foodBeverages.destroy',$foodBeverage->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('foodBeverages.show',$foodBeverage->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('foodBeverages.edit',$foodBeverage->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $foodBeverages->links() !!}
      
@endsection