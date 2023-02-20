@extends('layouts.app')

@section('content')
    <form class="row g-3 needs-validation" action="{{ route('admin.users.update', ['user' => $user])}}" method="post" novalidate enctype="multipart/form-data">
        @method('PUT')
        @csrf
        <div class="col-md-12">
            <label for="name" class="form-label">Nome</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}">
            <div class="invalid-feedback">
                @error('name')
                    <ul>
                        @foreach ($errors->get('name') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label for="last_name" class="form-label">Cognome</label>
            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
            <div class="invalid-feedback">
                @error('last_name')
                    <ul>
                        @foreach ($errors->get('last_name') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="col-md-12">
            <label for="address" class="form-label">Indirizzo</label>
            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{ old('address', $user->address) }}">
            <div class="invalid-feedback">
                @error('address')
                    <ul>
                        @foreach ($errors->get('address') as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="col-12">
                <label for="specializations[]" class="form-label">Specializzazioni</label>
                @foreach ($specializations as $specialization)
                    <div class="form-check">
                        <input
                            id="specialization-{{ $specialization->id }}"
                            class="form-check-input @error('specializations.'.$loop->index) is-invalid @enderror"
                            type="checkbox"
                            value="{{ $specialization->id }}"
                            name="specializations[]"
                            @if(in_array($specialization->id, old('specializations', $user->specializations->pluck('id')->all()))) checked
                            @endif
                        >
                        <label class="form-check-label" for="specialization-{{$specialization->id}}">
                            {{ $specialization->name }}
                        </label>
                        <div class="invalid-feedback">
                        @error('specializations.'.$loop->index)
                            <ul>
                                @foreach ($errors->get('specializations.' .$loop->index) as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @enderror
                        </div>
                    </div>
                @endforeach
        </div>

        <div class="mb-3">
            <label for="photo" class="form-label">Immagine</label>
            <input class="form-control @error('photo') is-invalid @enderror" type="file" id="photo" name="photo">
            <div class="invalid-feedback">
                @error('photo')
                    <ul>
                        @foreach ($errors->get('photo') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="curriculum_vitae" class="form-label">Curriculum vitae</label>
            <input class="form-control @error('curriculum_vitae') is-invalid @enderror" type="file" id="curriculum_vitae" name="curriculum_vitae">
            <div class="invalid-feedback">
                @error('curriculum_vitae')
                    <ul>
                        @foreach ($errors->get('curriculum_vitae') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-12">
            <label for="phone" class="form-label">Cellulare</label>
            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
            <div class="invalid-feedback">
                @error('phone')
                    <ul>
                        @foreach ($errors->get('phone') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>

        <div class="mb-12">
            <label for="services" class="form-label">Servizi</label>
            <textarea class="form-control @error('services') is-invalid @enderror" id="services" placeholder="services" name="services">{{ old('services', $user->services) }}</textarea>
            <div class="invalid-feedback">
                @error('services')
                    <ul>
                        @foreach ($errors->get('services') as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                @enderror
            </div>
        </div>
        <div class="col-12 text-center">
            <button class="btn btn-primary" type="submit">Modifica</button>
        </div>
    </form>
@endsection
