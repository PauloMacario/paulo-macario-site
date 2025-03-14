@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-3">
        <div class="col-12">
            <div class="card card-warning mb-0">
                <div class="card-header">
                    <h5 class="card-title">Parado!</h5>
                </div>
                <div class="card-body">
                    <div class="row d-flex justify-content-center">        
                        
                        <div class="col-12 text-center">
                            <img src="{{ asset('/img/stormtrooper_block.webp') }}" title="Stopped!!!" width="120px" height="300px">
                        </div>

                        <div class="col-12 text-center">
                            <p>O que você está fazendo aqui?</p>
                            <p><i class="fas fa-ban"></i><i> Acesso não autorizado!</i></p>
                        </div>                       
                    </div>
                </div>
            </div>
        </div>
    </div>
  {{--   <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div> --}}
</div>
@endsection
