@extends('layouts.user')

@section('content')

<!DOCTYPE html>
<html>
<head>
    <title>User History</title>
</head>
<body>
    <h1>User History</h1>

    @if($repot->isEmpty())
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
                @foreach($repot as $rep)
                    <tr>
                        <td>{{ $rep->id }}</td>
                        <td>{{ $rep->user_id }}</td>
                        <td>{{ $rep->product_id }}</td>
                        <td>{{ $rep->checkout_id }}</td>
                        <td>{{ $rep->price }}</td>
                        <td>{{ $rep->created_at }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
@endsection