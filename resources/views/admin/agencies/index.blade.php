@extends('layouts.app')

@section('title', 'Agências')

@section('content')
    <div class="row">
        <div class="col-sm-10 col-sm-offset-1 col-lg-8 col-lg-offset-2">
            <div class="panel panel-default card">
                <div class="panel-heading text-center">Agências</div>
                <admin-list-agencies></admin-list-agencies>
            </div>
        </div>
    </div>
@endsection