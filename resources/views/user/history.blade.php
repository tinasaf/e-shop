@extends('layouts.user')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>User History</title>
</head>
<body>
    <h1>User History</h1>

    @if($historys->isEmpty())
        <p>No history found for this user.</p>
    @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product ID</th>
                    <th>Checkout ID</th>
                    <th>Price</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historys as $history)
                    <tr>
                        <td>{{ $history->id }}</td>
                        <td>{{ $history->product_id }}</td>
                        <td>{{ $history->checkout_id }}</td>
                        <td>{{ $history->price }}</td>
                        <td>{{ $history->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
@endsection