@extends('layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
        </ol>
    </div>
</div>
<!-- row -->
<div class="text-center">

    <h3>{{$category->name}}</h3>
    <h3>{{$category->created_at}}</h3>

</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Data Table</h4>
                    <a href="{{route('posts.create')}}" class="btn btn-primary">Create</a>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered zero-configuration">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Category</th>
                                    <th>Created</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($category->posts as $c)
                                <tr>
                                    <td>{{$c->id}}</td>
                                    <td>{{$c->title}}</td>
                                    <td>{{$c->description}}</td>
                                    <td>{{$c->category->name}}</td>
                                    <td>{{$c->created_at ? $c->created_at : 'N/A'}}</td>
                                    <td>
                                        <div style="display: flex; gap: 1rem">
                                            <a class="btn btn-success" href="{{route('posts.edit', ['post' => $c->id])}}">Edit</a>
                                            <form action="{{route('posts.destroy', ['post' => $c->id])}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger" type="submit">Delete</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('plugins/tables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('plugins/tables/js/datatable-init/datatable-basic.min.js')}}"></script>
@endpush



