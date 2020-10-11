@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Post List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('blogsite') }}">Home</a></li>
                        <li class="breadcrumb-item active">Post List</li>
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
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between align-items-center">
                                <h3 class="card-title">Post List</h3>
                                <a href="{{ route('post.create') }}" class="btn btn-primary">Create Category</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SI</th>
                                        <th>Image</th>
                                        <th>Title</th>
                                        <th>Category</th>
                                        {{-- <th>Tags</th> --}}
                                        <th>Author</th>
                                        <th style="width: 130px">Created Date</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($posts as $post)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>
                                                <div style="max-width: 70px; max-height:70px;overflow:hidden">
                                                    <img src="{{ asset($post->image) }}" class="img-fluid img-rounded" alt="">
                                                </div>
                                            </td>

                                            <td>{{ $post->title }}</td>
                                            <td>{{ $post->category->name }}</td>
                                            <td>{{ $post->user->name }}</td>
                                            <td>{{ $post->created_at->format('d M, Y') }}</td>
                                            <td>
                                                {{-- <a
                                                    href="{{ route('post.show', [$post->id]) }}"
                                                    class="btn btn-sm btn-secondary mr-2"><i class="fa fa-eye"></i></a>
                                                --}}
                                                <a href="{{ route('post.edit', [$post->id]) }}"
                                                    class="btn btn-sm btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('post.destroy', [$post->id]) }}" method="POST"
                                                    class="mr-1 d-inline-block">
                                                    @method('DELETE')
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-danger"><i
                                                            class="fa fa-trash"></i></button>
                                                </form>


                                            </td>
                                        </tr>

                                    @empty
                                        <tr class="text-danger text-center">
                                            <td colspan="5">No Data available</td>
                                        </tr>
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        @if ($posts->count())
                            <div class="card-footer m-auto bg-white">
                                {{ $posts->links() }}
                            </div>
                        @endif

                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection



@section('ToastrJs')

@if (Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
@endif

@endsection
