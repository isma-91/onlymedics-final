@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center super-margin">
        <div class="col-md-8 text-center">
            <h1>Bentornato <span class="text-capitalize mb-5">{{ $user->name}}!!</span></h1>
            <div class="dash-buttons mt-5"></div>
            <a class="btn btn-primary" href="{{ route('guest.home') }}">Vai alla Home del sito</a>
            <a class="btn btn-primary" href="{{ route('admin.users.show', ['user' => $user]) }}">Vai al tuo Profilo</a>
            {{-- <div class="card">
                <div class="card-header text-center">{{ __('Dashboard') }}</div>

                <div class="card-body text-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Bentornato <span class="text-capitalize ">{{ $user->name}}!!</span>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection
