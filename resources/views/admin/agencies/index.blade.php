@extends('layouts.app')

@section('title', 'Imóveis')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading text-center">Agências</div>
                <admin-list-agencies></admin-list-agencies>
                <div class="panel-footer text-center">
                    <a href="{{route('admin.agencies.create')}}" class="btn btn-primary">Criar Nova</a>
                </div>
            </div>
        </div>
    </div>
@endsection