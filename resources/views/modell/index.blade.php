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

@if(Session::has('message'))
    <div style="color: green; font-size: 1.5rem">
        {{ Session::get('message')}}
    </div>
@endif

<a href="{{route('modells.create')}}">Create</a>

<table class="table" border="1" style="width: 75%">
    <thead>
        <tr>
            <th>#</th>
            <th>Image</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody style="text-align: center">
        @foreach ($modells as $m)
            <tr>
                <td>{{$m->id}}</td>
                <td>
                    @if($m->brand->image)
                        <img src="{{$m->brand->image}}" width="50" height="50" alt="">
                    @else
                        N/A
                    @endif
                </td>
                <td>{{$m->name}}</td>
                <td>{{$m->brand->name}}</td>
                <td>
                    <div style="display: flex; gap: 1rem">
                        <a href="{{route('modells.edit', ['modell' => $m->id])}}">Edit</a>
                        <form action="{{route('modells.destroy', ['modell' => $m->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>រ
        @endforeach
    </tbody>
</table>
</body>
</html>
