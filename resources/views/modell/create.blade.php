@if($errors->any())
{{ implode('', $errors->all('<div>:message</div>')) }}
@endif

<form action="{{route('modells.store')}}" method="post">
    @csrf
    <label for="name">Name</label><br><br>
    <input type="text" name="name" value="{{old('name')}}" id="name"><br><br>
    <label for="modell">Choose a brands:</label><br><br>
    <select name="brand_id" id="brand">
        <option value="">Choose</option>
        @foreach ($brands as $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>
        @endforeach
    </select><br><br>
    <button type="submit">Create</button>
</form>
