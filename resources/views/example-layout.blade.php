@extends('adminlte::page')

@section('title', 'TITLEXXXXX')

@section('content_header')
@include('components.alerts')
{{-- <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h5>TITLEXXXXX</h5>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">TITLEXXXXX</li>
            </ol>
        </div>
    </div>
</div> --}}
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-primary mb-0">
                    <div class="card-header">
                        <h5 class="card-title">RECURSOXXXX</h5>
                    </div>
                    <div class="card-body">

                        {{-- <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                
                            </div>
                        </div> --}}

                        
                    </div>
                    <div class="card-footer">
                        
                        {{-- <div class="row">
                            <div class="col-xs-12 col-md-6 col-lg-4">
                                
                            </div>
                        </div> --}}
                           
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <script src=""></script>
    <script>
        $(document).ready(function() {

        });
    </script>
@endpush