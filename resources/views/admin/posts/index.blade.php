@extends('adminlte::page')
@section('title', 'Blog Mario')

@section('content_header')
    <a class="btn btn-secondary btn-sm float-right" href="{{route('admin.posts.create')}}">Nuevo post</a>
    <h1>Lista de  post</h1>
@stop

@section('content')
    @if (session('info'))
        <div class="alert-success">
            <strong>{{session('info')}}</strong>
        </div>
    @endif
    @livewire('admin.posts-index')
@stop
