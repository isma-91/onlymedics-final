@extends('layouts.app')

@section('content')
    <div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col" class="d-none d-md-table-cell">Recensione</th>
                <th scope="col">Voto</th>
                <th scope="col">Visualizza</th>
                {{-- <th scope="col">Azioni</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($reviews as $review)
                <tr>
                        <th scope="row">
                            <div class="table-rows">
                                {{ $review->id }}
                            </div>
                        </th>
                        <td>
                            <div class="table-rows">
                                {{ $review->guest_name }}
                            </div>
                        </td>
                        <td>
                            <div class="table-rows">
                                {{ $review->guest_last_name}}
                            </div>
                        </td>
                        <td class="text-truncate review-message d-none d-md-table-cell">

                                {{ $review->text}}

                        </td>
                        <th>
                            <div class="review-vote d-flex align-items-center justify-content-center bg-dark text-warning">
                                {{ $review->vote}}
                            </div>
                        </th>
                        <td>
                            <div class="table-rows">
                                <a href="{{ route('admin.reviews.show', ['review' => $review]) }}" class="btn btn-primary">Visualizza</a>
                            </div>
                        </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    {{ $reviews->links() }}
@endsection

