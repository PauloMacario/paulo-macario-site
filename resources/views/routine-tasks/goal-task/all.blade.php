@extends('adminlte::page')

@section('title', 'Metas')

@section('content_header')
    @include('routine-tasks.components.alerts')
@stop

@section('content')
{{ dd('goal-tasks') }}
    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <div class="card card-lightblue mb-0">
                    <div class="card-header">
                        <h5 class="card-title">Metas</h5>
                    </div>
                    <div class="card-body">
                        <div class="col-12 col-sm-12 col-md-8 col-lg-6">

                            @foreach( $goals as $goal)
                                <div class="card card-lightblue collapsed-card">
                                    <div class="card-header">
                                        <h3 class="card-title">{{ $goal->objective }}</h3>
                                        <div class="card-tools">
                                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="card-body" style="display: none;">
                                        <table class="table table-sm">
                                            <tr>
                                                <td>Ínicio</td>
                                                <td>{{ formatDateBR($goal->start) }} </td>
                                            </tr>
                                            <tr>
                                                <td>Final</td>
                                                <td>{{ formatDateBR($goal->end) }} </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Status
                                                </td>
                                                <td>
                                                    @switch($goal->completed)
                                                        @case('Y')
                                                            <span class="text-success">
                                                                Concluído
                                                            </span>
                                                            @break
                                                        @case('N')
                                                            <span class="text-danger">
                                                                Não concluído
                                                            </span>
                                                            @break
                                                        @default
                                                            <span class="text-info">
                                                                Aberto
                                                            </span>
                                                    @endswitch
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Criado em</td>
                                                <td>{{ formatDateBR($goal->created_at) }}</td>
                                            </tr>
                                            <tr>
                                                <td colspan="2">
                                                    <a href="#" class="btn-block btn btn-sm btn-warning">
                                                        Ver tarefas                                                        
                                                        <i class="fas fa-eye ml-4"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @endforeach
                          </div>
                        {{-- <table class="table table-striped table-sm table-responsive">
                            <thead>
                                <th class="text-center">Objetivo</th>
                                <th class="text-center">Ínicio - Fim</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Criado em</th>
                            </thead>
                            <tbody>
                                @foreach( $goals as $goal)
                                    <tr>                                        
                                        <td class="text-center"  width="40%">
                                            {{ $goal->objective }}
                                        </td>
                                        <td class="text-center">
                                            {{ formatDateBR($goal->start) }} - {{ formatDateBR($goal->end) }}
                                        </td>
                                        <td class="text-center">
                                            @switch($goal->completed)
                                                @case('Y')
                                                    <span class="text-success">
                                                        Concluído
                                                    </span>
                                                    @break
                                                @case('N')
                                                    <span class="text-danger">
                                                        Não concluído
                                                    </span>
                                                    @break
                                                @default
                                                    <span class="text-info">
                                                        Aberto
                                                    </span>
                                            @endswitch
                                        </td>
                                        <td class="text-center">
                                            {{ formatDateBR($goal->created_at) }}
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop
@push('js')
    <script src="{{ asset('vendor/bs-custom-file-input/dist/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('vendor/jquery/jquery.mask.min.js') }}"></script>
    <script>

        $(document).ready(function() {
            
        });

    </script>
@endpush