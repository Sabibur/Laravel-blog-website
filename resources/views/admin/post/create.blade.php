@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('blogsite') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('post.index') }}">Post List</a></li>
                        <li class="breadcrumb-item active">Post Create</li>
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

                        <form action="{{ route('post.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="card-body ">
                                <div class="form-group">
                                    <label for="title">Post title</label>
                                    <input type="name" name="title" value="{{ old('title') }}" class="form-control"
                                        placeholder="Enter title">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="category">Post Category</label>

                                    <select name="category" id="category" class="form-control">
                                        <option value="" style="display: none" selected>Select Category</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}"> {{ $category->name }} </option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="custom-file">
                                        <input type="file" name="image" class="custom-file-input" id="image">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                        @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Description</label>
                                    <textarea name="description" id="description" rows="4" class="form-control"
                                        placeholder="Enter description">{{ old('description') }}</textarea>
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
