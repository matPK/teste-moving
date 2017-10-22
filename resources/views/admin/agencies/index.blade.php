@extends('layouts.app')

@section('title', 'Imóveis')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">

            <div class="row">
                <div class="col-sm-6">
                    <div class="panel panel-default card">
                        <fieldset>
                            <legend class="text-center">Imóveis</legend>
                            <div class="panel-body">
                                <a href="{{route('admin.properties.index')}}" class="btn btn-info btn-block">Ver Todos</a>
                                <a href="{{route('admin.properties.create')}}" class="btn btn-primary btn-block">Criar Novo</a>
                            </div>
                        </fieldset>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="panel panel-default card">
                        <fieldset>
                            <legend class="text-center">Agências</legend>
                            <div class="panel-body">
                                <a href="{{route('admin.agencies.index')}}" class="btn btn-info btn-block">Ver Todas</a>
                                <a href="{{route('admin.agencies.create')}}" class="btn btn-primary btn-block">Criar Nova</a>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection