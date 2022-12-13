@if($errors->any())
        {{ implode('', $errors->all('<div>:message</div>')) }}
    @endif
<form action="{{route('suppliers.update', ['supplier' => $supplier->id])}}" method="post">
    @csrf
    @method('PUT')
    <label for="name">Company</label><br><br>
    <input type="text" name="company" value="{{old('company', $supplier->company)}}" id="name"><br><br>
    <label for="owner_name">Owner Name</label><br><br>
    <input type="text" name="owner_name" value="{{old('owner_name', $supplier->owner_name)}}" id="owner_name"><br><br>
    <label for="telephone">Telephone</label><br><br>
    <input type="text" name="telephone" value="{{old('telephone', $supplier->telephone)}}" id="telephone"><br><br>
    <label for="address">Address</label><br><br>
    <input type="text" name="address" value="{{old('address', $supplier->address)}}" id="address"><br><br>
    <button type="submit">Update</button>
</form>
