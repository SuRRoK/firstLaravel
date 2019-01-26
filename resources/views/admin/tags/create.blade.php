@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add tag</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/tags">Tags</a></li>
                            <li class="breadcrumb-item active">Add tag</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                    @include('admin.errors')
                    {{--                        <div class="card-header">
                                                <h3 class="card-title">Add tag</h3>
                                            </div>--}}
                    <!-- /.card-header -->
                        <div class="card-body">
                            {!! Form::open(['route' => 'tags.store']) !!}
                            <div class="form-group">
                                <label for="title">Name tag</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter tag name">
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save tag</button>
                                <a href="{{route('tags.index')}}" class="btn btn-default float-right">Cancel</a>
                            </div>
                            {!! Form::close() !!}

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
    </div>
@endsection