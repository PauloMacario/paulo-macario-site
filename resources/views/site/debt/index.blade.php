@extends('adminlte::page')

@section('title', 'Divida')

@section('content_header')
<div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
            <h1>Dívidas</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Dívida</li>
            </ol>
        </div>
    </div>
</div>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Nova dívida</h3>
                    </div>
                    <form>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="id">Categoria</label>
                                <select class="form-control">
                                    <option>Selecione...</option>
                                    @foreach ($categories as $category)
                                        <option 
                                            value="{{ $category->id }}"
                                            @isset($category->style->color)
                                                style="color:{{ $category->style->color }}"
                                            @endisset
                                        >
                                        {{ $category->description }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="form-group">
                                <label for="id">Forma de pagamento</label>
                                <select class="form-control">
                                    <option>Selecione...</option>
                                    
                                    @foreach ($paymentTypes as $paymentType)                                  
                                        <option value="{{ $paymentType->id }}" >{{ $paymentType->description }}</option>
                                    @endforeach
                                </select>
                            </div>                           
                    
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop