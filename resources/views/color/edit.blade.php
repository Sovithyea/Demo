{{-- Edit --}}
<form action="{{route('colors.update', ['color' => $color->id])}}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Name</label><br><br>
    <input type="text" name="name" value="{{old('name', $color->name)}}" id="name"><br><br>
    <button type="submit">Update</button>
</form>
