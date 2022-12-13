<form action="{{route('product-types.store')}}" method="post">
    @csrf
    <label for="name">Name</label><br><br>
    <input type="text" name="name" value="{{old('name')}}" id="name"><br><br>
    <button type="submit">Create</button>
</form>
