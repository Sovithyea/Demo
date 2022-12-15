@if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
<form action="{{route('brands.update', ['brand' => $brand->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Company</label><br><br>
    <input type="text" name="name" value="{{old('name', $brand->name)}}" id="name"><br><br>
    <label for="image">Image</label><br><br>
    <input type="file" name="image" id="image"><br><br>

    @if ($brand->image)
        <img src="{{asset( 'storage/' . $brand->image)}}" alt="" width="100" height="100">
    @endif
    <br>
    <button type="submit">Update</button>
</form>
