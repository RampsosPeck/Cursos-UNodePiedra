@extends('layouts.app')

@section('jumbotron')
    @include('partials.jumbotron', [
            "title" => __("Configurar tu perfil"),
            "icon" => "user-circle"
        ])
@endsection

@section('content')

<div class="pl-5 pr-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    {{ __("Actualiza tus datos") }}
                </div>
                <div class="card-body">
                    <form action="{{ route('profile.update') }}" method="POST" novalidate>
                        @csrf @method('PUT')

                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">
                                {{ __("Correo Electrónico") }}
                            </label>
                            <div class="col-md-6">
                                <input type="email"
                                    id="email"
                                    readonly
                                    class="form-control{{ $errors->has('email')? 'is-invalid' : '' }}"
                                    name="email"
                                    value="{{ old('email') ? : $user->email }}"
                                    required
                                    autofocus
                                 />
                                 @if($errors->has('email'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-sm-4 col-form-label text-md-right">
                                {{ __("Contraseña") }}
                            </label>
                            <div class="col-md-6">
                                <input type="password"
                                    id="password"
                                    readonly
                                    class="form-control{{ $errors->has('password')? 'is-invalid' : '' }}"
                                    name="password"
                                    value="{{ old('password') ? : $user->password }}"
                                    required
                                 />
                                 @if($errors->has('password'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                 @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-sm-4 col-form-label text-md-right">
                                {{ __("Confirma la contraseña") }}
                            </label>
                            <div class="col-md-6">
                                <input type="password"
                                    id="password-confirm"
                                    readonly
                                    class="form-control"
                                    name="password_confirmation"
                                    required
                                 />
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">{{ __("Actualizar datos") }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
