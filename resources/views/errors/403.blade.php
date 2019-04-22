@extends('errors::layout')

@section('title' , 403)
@section('message', 'Acceso no autorizado')
<a href="{{ url('/') }}" class="btn btn-lg btn-info">Pagina Principal</a>
@endsection

