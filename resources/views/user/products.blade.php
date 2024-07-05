@extends('layouts.user')

@section('content')
<div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div>
                  @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                  @endif
                </div>

                <div class="row">
                @forelse ($products as $product)
                  <div class="col-4 col-md-3">
                    <div class="card" style="width: 100%;">

                    <img class="card-img-top" src="{{ asset('/storage/products/'.$product->image) }}" alt="Card image cap">
                      <div class="card-body">
                        <h5 class="card-title">{{ $product->title }}</h5>
                        <p class="card-text">{{ "Rp " . number_format($product->price,2,',','.') }}</p>
                        <div class="w-100 d-flex justify-content-center">
                        <form action="{{ route('addToCheckout', $product->id) }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <button type="submit" class="btn btn-primary">Tambahkan ke Keranjang</button>
                        </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  @empty
                  <div class="alert alert-danger col-12">
                      Data Products belum Tersedia.
                  </div>
                @endforelse
                </div>
                <!-- <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">IMAGE</th>
                                    <th scope="col">TITLE</th>
                                    <th scope="col">PRICE</th>
                                    <th scope="col">STOCK</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($products as $product)
                                    <tr>
                                        <td class="text-center">
                                            <img src="{{ asset('/storage/products/'.$product->image) }}" class="rounded" style="width: 150px">
                                        </td>
                                        <td>{{ $product->title }}</td>
                                        <td>{{ "Rp " . number_format($product->price,2,',','.') }}</td>
                                        <td>{{ $product->stock }}</td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
@endsection