@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Edit user</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/admin">Home</a></li>
                            <li class="breadcrumb-item"><a href="/admin/users">Users</a></li>
                            <li class="breadcrumb-item active">Edit user</li>
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
                         
                        <div class="card-body">
                            {!! Form::open(['route' => [
                            'users.update', $user->id],
                            'method' => 'put',
                            'files' => 'true',
                            ]) !!}
                            <div class="form-group">
                                <label for="name">Name user</label>
                                <input type="text" id="name" name="name" class="form-control" value="{{$user->name}}" placeholder="Enter name">
                            </div>
                            <div class="form-group">
                                <label for="email">E-mail</label>
                                <input type="text" id="email" name="email" class="form-control"  value="{{$user->email}}" placeholder="Enter email">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" id="password" name="password" class="form-control" placeholder="Enter password">
                            </div>
                            <div class="form-group">
                                <p>Avatar</p>
                                <img src="{{$user->getAvatar()}}" alt="" width="200" class="img-thumbnail">
                            </div>
                            <div class="form-group">
                                <label for="avatar">Choose avatar for user</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" {{--class="custom-file-input"--}} id="avatar" name="avatar">
                                        {{--<label class="custom-file-label" for="avatar">Choose avatar</label>--}}
                                    </div>

                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-warning">Modify user</button>
                                <a href="{{route('users.index')}}" class="btn btn-default float-right">Cancel</a>
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