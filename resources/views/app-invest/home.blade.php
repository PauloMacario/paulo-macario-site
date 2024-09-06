@extends('adminlte::page')

@section('title', 'App Invest')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Acesso rápido</h1>
        </div>
        <div class="col-sm-6">
            
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-12">
                            <a href="{{ route('debt_get') }}">
                                <div class="info-box bg-olive">
                                    <span class="info-box-icon">
                                        <i class="fas fa-plus-circle"></i>
                                    </span>
                                    <div class="info-box-content">
                                        <span class="">ssssss</span>
                                    </div>                            
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop


@push('js')
    <script>
        $(document).ready(function () {

        })
    </script>   
@endpush
