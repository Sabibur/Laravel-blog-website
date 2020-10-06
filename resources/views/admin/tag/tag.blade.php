@extends('layouts.admin')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Tag List</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('blogsite') }}">Home</a></li>
                        <li class="breadcrumb-item active">Tag List</li>
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
                                <h3 class="card-title">Tag List</h3>
                                <a href="{{ route('tag.create') }}" class="btn btn-primary">Create Tag</a>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body p-0">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">SI</th>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Post Count</th>
                                        <th style="width: 15%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @forelse ($tags as $tag)
                                        <tr>
                                            <td>{{ $loop->index + 1 }}</td>
                                            <td>{{ $tag->name }}</td>
                                            <td>{{ $tag->slug }}</td>
                                            <td>{{ $tag->id }}</td>
                                            <td>
                                                {{-- <a href="{{ route('tag.show', [$tag->id]) }}"
                                                    class="btn btn-sm btn-secondary mr-2"><i class="fa fa-eye"></i></a>
                                                --}}
                                                <a href="{{ route('tag.edit', [$tag->id]) }}"
                                                    class="btn btn-sm btn-warning mr-1"><i class="fa fa-edit"></i></a>
                                                <form action="{{ route('tag.destroy', [$tag->id]) }}" method="POST"
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
                        @if ($tags->count())
                            <div class="card-footer m-auto bg-white">
                                {{ $tags->links() }}
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
