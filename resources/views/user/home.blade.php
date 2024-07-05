@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Doloribus, consequatur. Sint consequatur earum quibusdam, delectus eum quaerat alias illo nostrum repudiandae quia ipsum a enim iure. Explicabo, doloremque. Exercitationem, quia?
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
