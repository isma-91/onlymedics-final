@extends('layouts.app')

@section('content')
    @if (session('success_delete'))
        <div class="alert alert-warning" role="alert">
            Il messaggio con id {{ session('success_delete')->id }} di {{ session('success_delete')->guest_name }} {{ session('success_delete')->guest_last_name }} e' stato eliminato correttamente
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-striped table-sm mb-5">
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
                        <th scope="row">
                            <div class="table-rows">{{ $message->id }}</div>
                        </th>
                        <td>
                            <div class="table-rows">{{ $message->title }}</div>
                        </td>
                        <td>
                            <div class="table-rows">{{ $message->guest_name }}</div>
                        </td>
                        <td>
                            <div class="table-rows">{{ $message->guest_last_name}}</div>
                        </td>
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
    </div>

        {{ $messages->links() }}
@endsection
