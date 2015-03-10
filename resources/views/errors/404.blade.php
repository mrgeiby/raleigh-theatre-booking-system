@extends('app')

@section('content')
    <meta http-equiv="refresh" content="3;url={{ URL::to('/') }}" />
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Unauthorised</div>

                    <div class="panel-body">
                        You are not authorised to access this page! Redirecting you home!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
