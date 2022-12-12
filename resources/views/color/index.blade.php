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

<a href="{{route('colors.create')}}">Create</a>

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
        @foreach ($colors as $c)
            <tr>
                <td>{{$c->id}}</td>
                <td>{{$c->name}}</td>
                <td>{{$c->created_at ? $c->created_at : 'N/A'}}</td>
                <td>
                    <div style="display: flex; gap: 1rem">
                        <a href="{{route('colors.edit', ['color' => $c->id])}}">Edit</a>
                        <form action="{{route('colors.destroy', ['color' => $c->id])}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center">
    {!! $colors->links() !!}
</div>
</body>
</html>
