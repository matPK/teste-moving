@extends('layouts.app')

@section('title', 'Imóveis')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default card">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                            <img src="http://s2.glbimg.com/QWNxtZSOaTbBY7HmJbzeoUDwlEU=/s.glbimg.com/jo/g1/f/original/2017/06/13/matjunho_2.jpg"
                                 alt="imagem"
                                 width="100%">
                        </div>
                        <div class="col-sm-6">
                            <p class="lead">
                                {{$property->description}}
                            </p>
                            <p>
                                Tipo de imóvel: {{$property->type}}
                            </p>
                            <p>
                                Endereço: {{$property->address}}
                            </p>
                            <h3 class="text-center">Anunciado por {{$property->agency->name}}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection