@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Users</div>

                    <div class="panel-body">
                        @if(Session::has('success'))
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                <strong>{{ Session::get('success') }}</strong>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert"
                                        aria-hidden="true">&times;</button>
                                <strong>Whoops!</strong> There were some problems with your input.<br><br>

                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="text-right">
                            <a href="{{ URL::action('UserController@create') }}" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create User
                            </a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role->roleName }}</td>
                                    <td>
                                        {!! HTML::linkAction('UserController@edit', 'Edit',
                                        $user->id, 'class="btn btn-primary"') !!}
                                        {!! HTML::linkAction('UserController@destroy', 'Delete',
                                        $user->id, 'class="btn btn-danger"') !!}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>

                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center"> {!! $data->render() !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


