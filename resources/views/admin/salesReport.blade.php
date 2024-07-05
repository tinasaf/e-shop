@extends('layouts.user')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>User History</title>
</head>
<body>
    <h1>User History</h1>

    @if($sales->isEmpty())
        <p>No history found for this user.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Product ID</th>
                    <th>Checkout ID</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sales as $sale)
                    <tr>
                        <td>{{ $sale->id }}</td>
                        <td>{{ $sale->user_id }}</td>
                        <td>{{ $sale->product_id }}</td>
                        <td>{{ $sale->checkout_id }}</td>
                        <td>{{ $sale->price }}</td>
                        <td>{{ $sale->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
@endsection