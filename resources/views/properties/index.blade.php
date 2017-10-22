@extends('layouts.app')

@section('title', 'Imóveis')

@section('content')
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

            <list-properties></list-properties>
            {{--
            <passport-clients></passport-clients>
            <passport-authorized-clients></passport-authorized-clients>
            <passport-personal-access-tokens></passport-personal-access-tokens>
            --}}
        </div>
    </div>
@endsection