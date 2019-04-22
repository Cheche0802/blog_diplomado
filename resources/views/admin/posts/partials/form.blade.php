{{Form::hidden('user_id', auth()->user()->id)}}



 <div>
    <label for="category_id">Categorías</label>
    {{Form::select('category_id', $categories, null, ['class' => 'form-control'])}}
 </div>

<div class="form-group">
    <label for="name">Nombre</label>
<input type="text" name="name" id="name" placeholder="Nombre" class="form-control">
</div>
<div class="form-group">
    <label for="slug">Url amigable</label>
    <input type="text" name="slug" id="slug"  placeholder="url-amigable" class="form-control" readonly>{{ old('slug') }}
</div>
<div class="form-group">
    {{Form::label('image', 'Imagen')}}
    {{Form::file('image')}}
</div>
<div class="form-group">
    {{Form::label('status', 'Estado')}}
    <label>
        {{Form::radio('status', 'PUBLISHED')}} Publicado
    </label>
    <label>
            {{Form::radio('status', 'Draft')}} Borrador
        </label>
</div>
<div class="form-group">
        {{Form::label('tags', 'Etiquetas')}}
        <div>
            @foreach ($tags as $tag)
                <label>
                    {{Form::checkbox('tags[]', $tag->id)}} {{$tag->name}}
                </label>
            @endforeach
        </div>
</div>
<div>
        {{Form::label('exerpt', 'Extracto')}}
        <textarea name="exerpt" id="exerpt" cols="85" rows="2"></textarea>
</div>
<div class="form-group">
    {{ Form::label('body', 'Descripción') }}
    {{ Form::textarea('body', null, ['class' => 'form-control']) }}
</div>


<input type="submit" value="Guardar" class="btn btn-success">

<script src="{{ asset('vendor/stringToSlug/jquery.stringToSlug.min.js') }}"></script>
<script src="{{ asset('vendor/ckeditor/ckeditor.js') }}"></script>
<script>
	$(document).ready(function(){
	    $("#name, #slug").stringToSlug({
	        callback: function(text){
	            $('#slug').val(text);
	        }
	    });

	    CKEDITOR.config.height = 400;
		CKEDITOR.config.width  = 'auto';

		CKEDITOR.replace('body');
	});
</script>
