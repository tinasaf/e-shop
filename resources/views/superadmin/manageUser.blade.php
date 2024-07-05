@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        <div class="card border-0 shadow-sm rounded">
                    <div class="card-body">
                      @if (Session::has('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                      @endif
                        <a href="{{ route('manageUserCreate') }}" class="btn btn-md btn-success mb-3">ADD USER</a>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">ROLE</th>
                                    <th scope="col" style="width: 20%">ACTIONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                       
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->role }}</td>
                                        <td class="text-center">
                                          <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('manageUserDelete', $user->id) }}" method="POST">
                                            <a href="{{ route('manageUserEdit', $user->id) }}" class="btn btn-md btn-warning">Ubah</a> 
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger">HAPUS</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <div class="alert alert-danger">
                                        Data Products belum Tersedia.
                                    </div>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
