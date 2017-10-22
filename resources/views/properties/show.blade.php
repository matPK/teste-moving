@extends('layouts.app')

@section('title', 'Imóveis')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading">
                    {{$property->description}}
                </div>
                <div class="panel-body">
                    <div>
                        Tipo: {{$property->type}}
                    </div>
                    <div>
                        Endereço: {{$property->address}}
                    </div>
                    <div>
                        Agência: {{$property->agency->name}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection