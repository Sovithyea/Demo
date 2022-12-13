<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

{{-- {{$colors}} --}}

<a href="{{route('product-types.index')}}">Back</a>

<table class="table" border="1" style="width: 75%">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Create at</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        @foreach ($product_types as $p)
            <tr>
                <td>{{$p->id}}</td>
                <td>{{$p->name}}</td>
                <td>{{$p->created_at ? $p->created_at : 'N/A'}}</td>
                <td>
                    <div style="display: flex; gap: 1rem">
                        <a href="{{route('product-types.recovery', ['product_type' => $p->id])}}">Recovery</a>
                        <a href="{{route('product-types.force-delete', ['product_type' => $p->id])}}">Force Delete</a>
                        {{-- <form action="{{route('product-types.destroy', ['product_type' => $p->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form> --}}
                    </div>
                </td>
            </tr>រ
        @endforeach
    </tbody>
</table>
{{-- <div class="d-flex justify-content-center">
    {!! $product_types->links() !!}
</div> --}}
</body>
</html>
