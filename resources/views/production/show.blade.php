@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Productions</div>

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

                        <h1>{{ $data['prodName'] }}</h1>
                        <i>Released: {{ $data['created_at'] }}</i>

                        <p>{{ $data['prodDescription'] }}</p>

                        <h3>Performances</h3>
                        @if($data->performance->count() > 0)
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Date</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($data->performance as $performance)
                                    <tr>
                                        <td>{{ $performance->perfName }}</td>
                                        <td>{{ $performance->perfDate }}</td>
                                        <td>
                                            {{--{!! HTML::linkAction('PerformanceController@edit', 'Edit',--}}
                                            {{--$performance->id, 'class="btn btn-primary"') !!}--}}
                                            {{--{!! HTML::linkAction('PerformanceController@destroy', 'Delete',--}}
                                            {{--$performance->id, 'class="btn btn-danger"') !!}--}}
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        @else
                            This production does not have any performances.
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection