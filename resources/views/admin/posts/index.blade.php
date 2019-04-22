@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        Lista de Entrada
                        <a href="{{ route('posts.create')}}" class="btn btn-sm btn-primary pull-right">
                            Crear
                        </a>
                    </div>

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Slug</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($posts as $post)
                                <tr>
                                    <td>{{$post->id}}</td>
                                    <td>{{$post->name}}</td>
                                    <td>{{ $post->slug }}</td>
                                    <td width="10px">
                                        <a href="{{route('posts.show', $post->id)}}" class="btn btn-sm btn-info">Ver</a>
                                    </td>
                                    <td width="10px">
                                            <a href="{{route('posts.edit', $post->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                                    </td>
                                    <td width="10px">
                                             <form action="{{ route('posts.destroy', $post->id) }} " method="POST">
                                                 {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-sm btn-danger"> <span class="oi oi-trash">Eliminar</span></button>
                                    </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $posts->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
