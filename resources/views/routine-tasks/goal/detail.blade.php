@extends('adminlte::page')

@push('css')
    <style>
        a {
            color: rgb(20, 20, 20);
            text-decoration: none;
        }

        a:hover {
            color: #3d9970;
        }
        .font-9 {
            font-size: 9px;
        }

        .font-10 {
            font-size: 10px;
        }
        .font-12 {
            font-size: 12px;
        }
        .font-14 {
            font-size: 14px;
        }
        .font-16 {
            font-size:16px;
        }
        .font-18 {
            font-size: 18px;
        }
        .font-20 {
            font-size: 20px;
        }
        .font-22 {
            font-size: 22px;
        }
        .value-paid {
            color: #b4b4b4;
        }
        .decoration {
            text-decoration: line-through;
        }
        #balance {
            background-color:#fff;
        }
    </style>
@endpush

@section('title', 'Metas')

@section('content_header')
    @include('routine-tasks.components.alerts')
@stop

@section('content')

    <div class="row mt-3">
        <div class="col-12">
            <div class="card">
                <form action="{{ route('goal_create') }}" method="POST">
                    @csrf
                    <div class="card card-lightblue mb-0">
                        <div class="card-header">
                            <h5 class="card-title">{{ $goal->objective }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="col-12 col-sm-12 col-md-12 col-lg-12 table-responsive">                            
                                <table class="table table-sm table-bordered font-10">                     
                                    <tr>
                                        <td rowspan="{{ $goal->goalTasks->count() }}" class="text-center" style="min-width:150px; vertical-align:middle;">{{ $goal->objective }}</td>
                                        @foreach( $goal->goalTasks as $goalTask)                                                             
                                            <td class="text-center">{{ formatDateBR($goalTask->date) }}</td>    
                                        @endforeach
                                    </tr>         
                                    <tr>
                                        @foreach($goal->goalTasks as $goalTask)                              
                                            <td class="text-center">
                                                <div class="d-flex justify-content-center align-items-center"><input type="radio" id="Y" name="completed-[{{ $goalTask->id }}]" value="Y" @if($goalTask->completed == "Y") checked @endif><i class="fas fa-thumbs-up fa-sm text-success ml-1"></i></div>
                                                <div class="d-flex justify-content-center align-items-center mt-2 mb-2"><input type="radio" id="N" name="completed-[{{ $goalTask->id }}]" value="N" @if($goalTask->completed == "N") checked @endif><i class="fas fa-thumbs-down fa-sm text-danger ml-1"></i></div>
                                                <div class="d-flex justify-content-center align-items-center"><input type="radio" id="O" name="completed-[{{ $goalTask->id }}]" value="O" @if($goalTask->completed == "O") checked @endif><i class="fas fa-minus-circle fa-sm text-secondary ml-1"></i></div>
                                            </td>    
                                        @endforeach
                                    </tr>                                  
                                </table>                                        
                            </div>                     
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success">SALVAR</button> 
                        </div>
                                  
                    </div>
                </form>
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