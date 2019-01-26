@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Add category</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/categories">Categories</a></li>
                            <li class="breadcrumb-item active">Add category</li>
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
                                                <h3 class="card-title">Add category</h3>
                                            </div>--}}
                    <!-- /.card-header -->
                        <div class="card-body">
                            {!! Form::open(['route' => 'categories.store']) !!}
                            <div class="form-group">
                                <label for="title">Name category</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Enter category title">
                            </div>
                            <div class="form-group">
                                <label for="description">Category description</label>
                                <textarea id="description" name="description" class="form-control" rows="3"
                                          placeholder="Enter category description"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Choose image for category</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="image" name="image">
                                        <label class="custom-file-label" for="image">Choose image</label>
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-info">Save category</button>
                                <a href="{{route('categories.index')}}" class="btn btn-default float-right">Cancel</a>
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