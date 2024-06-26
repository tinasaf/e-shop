@extends('layouts.user')

@section('content')
<div class="container mt-5">
      <div style="font-size: 28px"> Keranjang Anda </div>
        <div class="row">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card border-0 rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tbody>
                                @forelse ($checkoutsWithProducts as $checkout)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/products/'.$checkout->product->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $checkout->product->title }}</td>
                                        <td>{{ "Rp " . number_format($checkout->product->price,2,',','.') }}</td>
                                        <td>
                                            <form action="{{ route('checkoutUpdate', $checkout->id) }}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="input-group">
                                                    <input type="number" name="quantity" class="form-control text-center" value="{{ $checkout->quantity }}" min="1" onchange="this.form.submit()">
                                                </div>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Checkout belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>

                        <div class="w-100 d-flex justify-content-end">
                            <a href="{{ route('userPayment') }}" class="btn btn-md btn-primary mb-3">Lanjutkan</a> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection