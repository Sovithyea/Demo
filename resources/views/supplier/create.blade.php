<form action="{{route('suppliers.store')}}" method="post">
    @if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
    @csrf
    <label for="name">Company</label><br><br>
    <input type="text" name="company" value="{{old('company')}}" id="name"><br><br>
    <label for="owner_name">Owner Name</label><br><br>
    <input type="text" name="owner_name" value="{{old('owner_name')}}" id="owner_name"><br><br>
    <label for="telephone">Telephone</label><br><br>
    <input type="text" name="telephone" value="{{old('telephone')}}" id="telephone"><br><br>
    <label for="address">Address</label><br><br>
    <input type="text" name="address" value="{{old('address')}}" id="address"><br><br>
    <button type="submit">Create</button>
</form>
