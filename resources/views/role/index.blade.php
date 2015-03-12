@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Manage Roles</div>

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
                            <a href="{{ URL::action('RoleController@create') }}" class="btn btn-success">
                                <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Create Role
                            </a>
                        </div>
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Users</th>
                                <th>Updated</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $role)
                                <tr>
                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->roleName }}</td>
                                    <td>{{ $role->roleDescription }}</td>
                                    <td>{{ $role->users->count() }}</td>
                                    <td>{{ $role->updated_at }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        {!! HTML::linkAction('RoleController@edit', 'Edit',
                                        $role->id, 'class="btn btn-primary"') !!}
                                        @if ($role->users->count() == 0)
                                            {!! HTML::linkAction('RoleController@destroy', 'Delete',
                                            $role->id, 'class="btn btn-danger"') !!}
                                        @endif
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


