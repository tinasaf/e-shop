@extends('layouts.user')

@section('content')
<div class="container">
  <div>
      @if(session('success'))
          <div class="alert alert-succes">
              {{ session('success') }}
          </div>
      @endif

      <div class="d-flex justify-content-center flex-column align-items-center w-100">
        <div class="bg-success w-50 h-50 p-4 text-white d-flex justify-content-center" style="font-size: 32px;">
            Pembelian Berhasil
        </div>
        <div class="mt-4">
          Total Yang Belum Dibayar : Rp{{ $total_bayar }}
        </div>
      </div>
  </div>
</div>
@endsection