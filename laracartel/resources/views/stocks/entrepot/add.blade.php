@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouvel entrepôt</div>

                    <div class="card-body">
                        <form action="{{ route('stocks.entrepot.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="localisation" class="col-md-6 col-form-label">{{ __('Localisation') }}</label>

                                <div class="col-md-12">
                                    <input id="localisation" type="text" class="form-control @error('localisation') is-invalid @enderror" name="localisation" value="{{ old('localisation') }}" required autocomplete="localisation" autofocus>

                                    @error('localisation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="capacite" class="col-md-6 col-form-label">{{ __('Adresse E-Mail ') }}</label>

                                <div class="col-md-12">
                                    <input id="capacite" type="number" class="form-control @error('capacite') is-invalid @enderror" name="capacite" value="{{ old('capacite') }}" required autocomplete="capacite" autofocus>

                                    @error('capacite')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label for="gerant">Gérant</label>
                                <select name="gerant" class="form-select">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                </select>

                                @error('gerant')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
