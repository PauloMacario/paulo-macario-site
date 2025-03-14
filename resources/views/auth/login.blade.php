@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6">
            <div class="card {{-- bg-dark --}} text-white" style="background-color:rgb(34, 34, 34);">
                <div class="card-header">{{-- {{ __('Login') }} --}}Entrar</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{-- {{ __('Email Address') }} --}}Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{-- {{ __('Password') }} --}}Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{-- {{ __('Remember Me') }} --}}Lembrar 
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">&nbsp;</label>
                            <div class="col-md-6">
                                <div class="d-grid gap-2">
                                    <button type="submit" class="btn btn-light btn-block">
                                        {{ __('Login') }}
                                    </button>                                    
                                  </div>
                            </div>
                        </div>

                       {{--  <div class="row mb-3">
                            <label for="" class="col-md-4 col-form-label text-md-end">&nbsp;</label>
                            <div class="col-md-6">
                                @if (Route::has('password.request'))
                                    <div class="d-grid gap-2">
                                        <a class="btn btn-secondary btn-block btn-sm" href="{{ route('password.request') }}">
                                            {{-- {{ __('Forgot Your Password?') }} 
                                            Esqueceu sua senha?
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
