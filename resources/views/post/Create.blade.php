
@extends('layouts.master')

@section('content')
<div class="row page-titles mx-0">
    <div class="col p-md-0">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">Post</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Create</a></li>
        </ol>
    </div>
</div>
<!-- row -->

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-validation">
                        <form class="form-valide" action="{{route('posts.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group row">
                                <label class="col-lg-4 col-form-label" for="name">Title<span class="text-danger">*</span>
                                </label>
                                <div class="col-lg-6">
                                    <input type="text" class="form-control" id="name" name="title" placeholder="Enter a name">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Select Category (select one):</label>
                                <select name="category_id" class="form-control" id="sel1">
                                        <option>Choose</option>
                                    @foreach ($categories as $c)
                                        <option value="{{$c->id}}">{{$c->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-12">
                                {{-- <div class="card"> --}}
                                    {{-- <div class="card-body"> --}}
                                        {{-- <h4 class="card-title">Bootstrap Input File</h4> --}}
                                        <div class="basic-form">
                                            <form>
                                                <div class="form-group">
                                                    <input type="file" name="image" class="form-control-file">
                                                </div>
                                            </form>
                                        </div>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </div>
                            <div class="col-lg-12">
                                {{-- <div class="card"> --}}
                                    {{-- <div class="card-body"> --}}
                                        {{-- <h4 class="card-title">Textarea</h4> --}}
                                        <div class="basic-form">
                                            <form>
                                                <div class="form-group">
                                                    <label>Comment:</label>
                                                    <textarea class="form-control h-150px" rows="6" name="description" id="comment"></textarea>
                                                </div>
                                            </form>
                                        </div>
                                    {{-- </div> --}}
                                {{-- </div> --}}
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-8 ml-auto">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script src="{{asset('plugins/validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('plugins/validation/jquery.validate-init.js')}}"></script>
@endpush
