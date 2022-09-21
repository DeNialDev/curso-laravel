@csrf
    <label for="">Titulo</label>
        <input type="text" name="title" value="{{ old('title', $post->title) }}">
    <label for="">Slug</label>
        <input type="text" name="slug" value="{{ old('slug', $post->slug) }}">
    <label for="">Contenido</label>
        <textarea name="content">{{old('content', $post->content)}}</textarea>
    <label for="">Description</label>
        <textarea name="description">{{old('description', $post->description)}}</textarea>
    <label for="">Categoria</label>
        <select name="category_id">
        <option></option>
        @foreach($categories as $title => $id)
            <option value="{{$id}}">{{$title}}</option>
        @endforeach
        </select>
<label for="">Posteado</label>
<select name="posted" id="">
    <option value="yes">Sí</option>
    <option value="not">No</option>
</select>

@if(isset($task) &&$task == 'edit')
    <label for="">Imagen</label>
    <input type="file" name="image">
@endif
<button type="submit">Enviar</button>
