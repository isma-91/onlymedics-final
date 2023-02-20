@extends('layouts.app')

@section('content')
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Durata</th>
                <th scope="col">Costo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($sponsors as $sponsor)
                <tr>
                    <th scope="row">{{ $sponsor->id }}</th>
                    <td>{{ $sponsor->title }}</td>
                    <td>{{ $sponsor->duration }}</td>
                    <td>{{ $sponsor->cost}}€</td>
                    <td>
                        <a href="{{ route('admin.sponsors.show', ['sponsor' => $sponsor]) }}" class="btn btn-primary text-light fw-bold">Visualizza Dettagli</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
