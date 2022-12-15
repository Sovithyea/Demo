@if($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif

<form action="{{route('brands.store')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="name">Name</label><br><br>
    <input type="text" name="name" value="{{old('name')}}" id="name"><br><br>
    <label for="image">Image</label><br><br>
    <input type="file" name="image" id="owner_name"><br><br>
    <button type="submit">Create</button>
</form>
