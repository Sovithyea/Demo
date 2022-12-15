@if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
<form action="{{route('modells.update', ['modell' => $modell->id])}}" method="post" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="name">Name</label><br><br>
    <input type="text" name="name" value="{{old('name', $modell->name)}}" id="name"><br><br>
    <label for="modell">Choose a brands:</label><br><br>
    <select name="brand_id" id="brand">
        <option value="">Choose</option>
        @foreach ($brands as $brand)
            <option @selected($modell->brand_id == $brand->id)  value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select><br><br>

    <button type="submit">Update</button>
</form>
