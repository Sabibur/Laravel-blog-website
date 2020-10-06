@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag Edit</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('blogsite') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('tag.index') }}">Tag List</a></li>
                        <li class="breadcrumb-item active">Tag Edit</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="card card-primary col-lg-12 ">
                    <div class=" col-lg-6 offset-lg-3 col-md-8 offset-md-2 m-auto">

                        <form action="{{ route('tag.update', [$tag->id]) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="card-body ">
                                <div class="form-group mt-3">
                                    <label for="">Tag Name</label>
                                    <input type="text" class="form-control" name="name" id="" placeholder="Enter Name"
                                        value="{{ $tag->name }}">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-0">
                                    <label for="">Tag Description</label>
                                    <textarea name="description" id="" class="form-control" rows="4"
                                        placeholder="Enter Description">{{ $tag->description }}</textarea>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-white mb-3">
                                <button type="submit" class="btn btn-primary ">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection
