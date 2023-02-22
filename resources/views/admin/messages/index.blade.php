@extends('layouts.app')

@section('content')
    @if (session('success_delete'))
        <div class="alert alert-warning" role="alert">
            Il messaggio con id {{ session('success_delete')->id }} di {{ session('success_delete')->guest_name }} {{ session('success_delete')->guest_last_name }} e' stato eliminato correttamente
        </div>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Titolo</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Azioni</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <th scope="row">{{ $message->id }}</th>
                    <td>{{ $message->title }}</td>
                    <td>{{ $message->guest_name }}</td>
                    <td>{{ $message->guest_last_name}}</td>
                    <td>
                        <a href="{{ route('admin.messages.show', ['message' => $message]) }}" class="btn btn-primary">Visualizza</a>
                    </td>

                    <td>
                        <form action="{{ route('admin.messages.destroy', ['message' => $message]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-delete-me">Elimina</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

        {{ $messages->links() }}
@endsection
