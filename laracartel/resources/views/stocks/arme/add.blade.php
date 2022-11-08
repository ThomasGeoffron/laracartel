@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Nouvelle arme</div>

                    <div class="card-body">
                        <form action="{{ route('stocks.arme.store') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form-group row">
                                <label for="designation" class="col-md-6 col-form-label">{{ __('Designation') }}</label>

                                <div class="col-md-12">
                                    <input id="designation" type="text" class="form-control @error('designation') is-invalid @enderror" name="designation" value="{{ old('designation') }}" required autocomplete="designation" autofocus>

                                    @error('designation')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="description" class="col-md-6 col-form-label">{{ __('Description ') }}</label>

                                <div class="col-md-12">
                                    <input id="description" type="description" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" required autocomplete="description" autofocus>

                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="munition" class="col-md-6 col-form-label">{{ __('Munition ') }}</label>

                                <div class="col-md-12">
                                    <input id="munition" type="munition" class="form-control @error('munition') is-invalid @enderror" name="munition" value="{{ old('munition') }}" required autocomplete="munition" autofocus>

                                    @error('munition')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button class="btn btn-primary">Ajouter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
