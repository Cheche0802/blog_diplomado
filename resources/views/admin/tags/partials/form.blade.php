<div class="form-group">
    <label for="name">Nombre</label>
<input type="text" name="name" id="name" placeholder="Nombre" class="form-control">
</div>
<div class="form-group">
    <label for="slug">Url amigable</label>
    <input type="text" name="slug" id="slug"  placeholder="url-amigable" class="form-control" readonly>{{ old('slug') }}
</div>


<input type="submit" value="Guardar" class="btn btn-success">
