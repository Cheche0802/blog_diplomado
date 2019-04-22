
@extends('errors::layout')

@section('title', '404')

@section('message', 'No se encuentra esa URL')
<a href="{{ url('/') }}" class="btn btn-lg btn-info">Pagina Principal</a>
