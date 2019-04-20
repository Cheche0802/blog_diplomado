@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default" >
                    <div class="panel-heading">

                        Editar Etiqueta
                    </div>

                <div class="panel-body">
                    <form method="POST" action="{{ route('tags.update', $tags->id) }}">
                        {{ method_field('PUT') }}
                        @csrf
                        <div class="form-group">
                            <label for="name">Nombre</label>
                        <input type="text" name="name" id="name" placeholder="Nombre" value="{{ old('name', $tags->name) }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="slug">Url amigable</label>
                            <input type="text" name="slug" id="slug" value="{{ old('slug', $tags->slug) }}" placeholder="url-amigable" class="form-control" readonly>{{ old('slug') }}
                        </div>


                        <input type="submit" value="Guardar" class="btn btn-success">

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script> document.addEventListener("DOMContentLoaded", function(e)
{ var name = document.getElementById('name'), slug = document.getElementById('slug');
name.onkeyup = function() { slug.value = string_to_slug(name.value); } });
function string_to_slug (str) { str = str.replace(/^\s+|\s+$/g, '');// trim
str = str.toLowerCase();
// remove accents, swap ñ for n, etc
var from = "àáäâèéëêìíïîòóöôùúüûñç·/_,:;";
var to = "aaaaeeeeiiiioooouuuunc------"; for (var i=0, l=from.length ; i<l ; i++)
{ str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i)); }
str = str.replace(/[^a-z0-9 -]/g, '')
// remove invalid chars
.replace(/\s+/g, '-') // collapse whitespace and replace by -
.replace(/-+/g, '-'); // collapse dashes
return str; } </script>
