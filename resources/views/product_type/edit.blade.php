{{-- Edit --}}
<form action="{{route('product-types.update', ['product_type' => $product_type->id])}}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Name</label><br><br>
    <input type="text" name="name" value="{{old('name', $product_type->name)}}" id="name"><br><br>
    <button type="submit">Update</button>
</form>
