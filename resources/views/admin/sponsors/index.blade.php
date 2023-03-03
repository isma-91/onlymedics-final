@extends('layouts.app')

@section('content')
    {{-- <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Titolo</th>
                <th scope="col">Durata</th>
                <th scope="col">Costo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sponsors as $sponsor)
                <tr>
                    <th scope="row">{{ $sponsor->title }}</th>
                    <td>{{ $sponsor->duration }}</td>
                    <td>{{ $sponsor->cost}}€</td>
                    <td>
                        <a href="{{ route('admin.sponsors.show', ['sponsor' => $sponsor]) }}" class="btn btn-primary text-light fw-bold">Visualizza Dettagli</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> --}}
    <div class="container d-flex justify-content-center flex-wrap">

            @foreach ($sponsors as $sponsor)
                <div class="box premium-card">
                    <div class="content">
                        <h2>{{ $sponsor->title }}</h2>
                        <p>
                            <div>Durata: {{ $sponsor->duration }}h</div>
                            <div>Costo: {{ $sponsor->cost}}€</div>
                        </p>
                        <a href="{{ route('admin.sponsors.show', ['sponsor' => $sponsor]) }}">Visualizza dettagli</a>
                    </div>
                </div>
            @endforeach

</div>
@endsection


