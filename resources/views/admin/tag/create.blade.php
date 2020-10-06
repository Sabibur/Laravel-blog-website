@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Category Create</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('blogsite') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('category.index') }}">Category List</a></li>
                        <li class="breadcrumb-item active">Category Create</li>
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

                        <form action="{{ route('category.store') }}" method="POST">
                            @csrf
                            <div class="card-body ">
                                <div class="form-group mt-3">
                                    <label for="">Category Name</label>
                                    <input type="text" class="form-control" name="name" id="" placeholder="Enter Name">
                                    @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-0">
                                    <label for="">Category Description</label>
                                    <textarea name="description" id="" class="form-control" rows="4"
                                        placeholder="Enter Description"></textarea>
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

