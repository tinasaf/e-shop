@extends('layouts.user')

@section('content')
<div class="container mt-5">
      <div style="font-size: 28px"> FORM PEMBELIAN </div>
        <div class="row">
            <div class="col-md-12">
                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif
                <div class="card border-0 rounded">
                    <div class="card-body">
                        <div class="d-flex mb-4 justify-content-between">
                            <div>
                              Alamat
                            </div>
                            <div>
                              {{ $users->alamat }}
                            </div>
                        </div>
                        <div>
                          Produk
                        </div>
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
                                            {{ $checkout->checkout->quantity }}
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Checkout belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="w-full d-flex justify-content-end">
                          <div class="d-flex">
                            <div>Total Harga: </div>
                            <div>Rp{{$total}}</div>
                          </div>
                        </div>
                        <form action="{{ route('paymentProcess') }}" method="POST">
                          @csrf
                          {{-- Isi form pembayaran --}}
                          <div class="mb-3">
                              <label for="payment" class="form-label">Pilih Metode Pembayaran:</label>
                              <select name="payment" id="payment" class="form-select">
                                  @foreach ($payments as $payment)
                                      <option value="{{ $payment['type'] }}">{{ $payment['type'] }} - {{ $payment['norek'] }}</option>
                                  @endforeach
                              </select>
                          </div>
                          <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                      </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection