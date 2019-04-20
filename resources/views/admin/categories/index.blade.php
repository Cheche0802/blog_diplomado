@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-heading">
                        Lista de Categorías
                        <a href="{{ route('categories.create')}}" class="btn btn-sm btn-primary pull-right">
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
                            @foreach ($categories as $category)
                                <tr>
                                    <td>{{$category->id}}</td>
                                    <td>{{$category->name}}</td>
                                    <td>{{ $category->slug }}</td>
                                    <td width="10px">
                                        <a href="{{route('categories.show', $category->id)}}" class="btn btn-sm btn-info">Ver</a>
                                    </td>
                                    <td width="10px">
                                            <a href="{{route('categories.edit', $category->id)}}" class="btn btn-sm btn-secondary">Editar</a>
                                    </td>
                                    <td width="10px">
                                             <form action="{{ route('categories.destroy', $category->id) }} " method="POST">
                                                 {{ csrf_field() }}
                                                {{method_field('DELETE')}}
                                                <button type="submit" class="btn btn-sm btn-danger"> <span class="oi oi-trash">Eliminar</span></button>
                                    </form>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $categories->render()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
