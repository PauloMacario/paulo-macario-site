@extends('adminlte::page')

@push('css')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    <style>
        .font-8 {
            font-size: 8px;
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
        .bold {
            font-weight: bold;
        }

        .card-task {
            width: 100px;
            height: 100px;
            padding: 6px;
            margin: 10px;
        }
    </style>
@endpush

@section('title', 'Metas')

@section('content_header')
    @include('routine-tasks.components.alerts')
@stop

@section('content')
    <div class="row mt-3">
        <div class="col-12 col-sm-12 col-md-6 col-lg-6">      
            @foreach( $goals as $goal)
                <div class="card card-lightblue collapsed-card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $goal->objective }}</h3>
                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body"> 
                        <form action="{{ route('goalTaskUpdate_post') }}" method="POST" id="form">
                            @csrf
                            <div class="row d-flex justify-content-around">
                                @foreach( $goal->goalTasks as $id => $task)                                              
                                    <div class="card-task border rounded-lg">
                                        <p class="font-10 mb-1 text-center">Semana - {{ $task->week }}</p>
                                        <p class="font-10 mb-1 text-center">
                                            <i class="@if($task->completed == 'O') fas fa-lock-open @else fas fa-lock @endif open" id="open-{{ $task->id }}"></i>
                                        </p>
                                        <p class="font-10 mb-1 text-center">{{ formatDateBR($task->date) }}</p>
                                        <div class="row d-flex justify-content-around">
                                            <div class="col-6 text-center mt-2">
                                                <i class="fas fa-thumbs-up completed @if($task->completed == 'Y') text-success @endif" id="up-{{ $task->id }}"></i>
                                            </div>
                                            <div class="col-6 text-center mt-2">
                                                <i class="fas fa-thumbs-down notcompleted @if($task->completed == 'N') text-danger @endif" id="down-{{ $task->id }}"></i>
                                            </div>
                                        </div>
                                    </div>                                            
                                @endforeach                                      
                            </div>                                             
                        </form>                                       
                    </div>
                </div>
            @endforeach       
        </div>
    </div>

@stop
@push('js')
    <script src="{{ asset('vendor/sweetalert2/dist/sweetalert2.all.min.js') }}"></script>
    <script src="{{ asset('js/yoda.js') }}"></script>
    <script>

        $(document).ready(function() {
            $('.completed').on('click', function(){
                let id = this.id.replace('up-', '');
                updateCompleteGoalTask(id, 'Y');
            })

            $('.notcompleted').on('click', function(){
                let id = this.id.replace('down-', '');
                updateCompleteGoalTask(id, 'N')
            })

            $('.open').on('click', function(){
                let id = this.id.replace('open-', '');
                updateCompleteGoalTask(id, 'O')
            })

            function updateCompleteGoalTask(id, completed) 
            {
                var form = $('#form');              
                var data = {
                    id: id,
                    completed: completed
                };

                console.log(data)
                  
                $.ajax({
                    url : form.attr('action'),
                    type: form.attr('method'),
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    data : data,
                    beforeSend : function(){
                       /*  $("#bsi-"+idNumber).css('display', 'none');
                        $("#spi-"+idNumber).css('display', 'block'); */
                    }
                })
                .done(function(response){

                    if (response.status == 401) {
                        return
                    }

                    if (response.status == 200) {

                        if (completed == 'Y') {                     
                            $('#up-'+id).addClass('text-success');
                            $('#down-'+id).removeClass('text-danger');
                            $('#open-'+id).removeClass('fas fa-lock-open');
                            $('#open-'+id).removeClass('fas fa-lock');
                            $('#open-'+id).addClass('fas fa-lock');
                            
                            let title = "Ok!";
                            let text = "QUE A FORÇA ESTEJA COM VOCÊ";
                            let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                            getYodaSwal(linkImg, title, text);
                        }
    
                        if (completed == 'N') {
                            $('#down-'+id).addClass('text-danger');
                            $('#up-'+id).removeClass('text-success');
                            $('#open-'+id).removeClass('fas fa-lock-open');
                            $('#open-'+id).removeClass('fas fa-lock');
                            $('#open-'+id).addClass('fas fa-lock');

                            let title = "!";
                            let text = "Meta não completada";
                            let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                            getYodaSwal(linkImg, title, text);
                        }
                        if (completed == 'O') {
                            $('#down-'+id).removeClass('text-danger');
                            $('#up-'+id).removeClass('text-success');
                            $('#open-'+id).addClass('fas fa-lock-open');

                            let title = "!";
                            let text = "Meta aberta";
                            let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                            getYodaSwal(linkImg, title, text);
                        }
                    }
                })
                .fail(function(jqXHR, textStatus, msg){
                    console.log('fail')   /*  let title = "";
                        let text = "## (( ERROOOO !!! )) ##";
                        let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                        getYodaSwal(linkImg, title, text) */
                });


            }

            function teste()
            {
                $.ajax({
                    url : form.attr('action'),
                    type: form.attr('method'),
                    data : mainArray,
                    beforeSend : function(){
                       /*  $("#bsi-"+idNumber).css('display', 'none');
                        $("#spi-"+idNumber).css('display', 'block'); */
                    }
                })
                .done(function(msg){
                    console.log('done')
                   /*  $("#spi-"+idNumber).css('display', 'none');
                    $("#bsi-"+idNumber).css('display', 'block');
                        let title = "";
                        let text = "QUE A FORÇA ESTEJA COM VOCÊ";
                        let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                        getYodaSwal(linkImg, title, text) */
                })
                .fail(function(jqXHR, textStatus, msg){
                    console.log('fail')   /*  let title = "";
                        let text = "## (( ERROOOO !!! )) ##";
                        let linkImg = '{{ asset('img/yoda_speak.jpg') }}' 

                        getYodaSwal(linkImg, title, text) */
                });
            }

            
        });

    </script>
@endpush