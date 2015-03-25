@extends('app')

@section('content')
    <script type="text/javascript">
        $(function() {
            $( ".datepicker" ).datepicker({
                dateFormat: "yy-mm-dd"
            });
        });
    </script>


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Performance</div>

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

                        <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('/performances/update') !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-4 control-label">ID</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="id" value="{{ $data['id'] }}" readonly>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Name</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="Name" value="{{ old('Name', $data['perfName']) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Date</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control datepicker" name="Date" value="{{ old('Date', $data['perfDate']) }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-4 control-label">Production</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="Production">
                                        @foreach($data2 as $production)
                                            <option value="{{ $production->id }}" @if (old('Production', $data['prodID'] ) == $production->id) selected="selected" @endif >{{ $production->prodName }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-md-6 col-md-offset-4">
                                    <button type="submit" class="btn btn-primary">
                                        Edit Performance
                                    </button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


