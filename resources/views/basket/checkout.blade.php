@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Checkout - Seat Selection</div>

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
                        <form class="form-horizontal" role="form" method="POST" action="{!! URL::to('basket/purchase') !!}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <table class="table table-striped table-hover table-responsive">
                                <thead>
                                <tr>
                                    <th class="col-md-6 text-left">Performance</th>
                                    <th class="col-md-1 text-center"></th>
                                    <th class="col-md-1 text-center"></th>
                                    <th class="col-md-4 text-center">Available Seats</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($basket as $row)
                                    @if($row->qty > 1)
                                        @for ($x = 1; $x <= $row->qty; $x++)
                                            <tr>
                                                <td class="text-left">{{ $row->name }}</td>
                                                <td class="text-center"></td>
                                                <td class="text-center"></td>
                                                <td class="text-center">
                                                    <select class="form-control" name="Seat">
                                                        <option></option>
                                                        @foreach($row->options->seats as $seat)
                                                            <option value="{{ $seat->id }}" @if(old('Seat') == $seat->id) selected="selected" @endif > Row: {{ $seat->seatRow }} Seat: {{ $seat->seatNumber }}</option>
                                                        @endforeach
                                                    </select>
                                                </td>
                                            </tr>
                                        @endfor
                                    @else
                                        <tr>
                                            <td class="text-left">{{ $row->name }}</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">
                                                <select class="form-control" name="Seat">
                                                    <option></option>
                                                    @foreach($row->options->seats as $seat)
                                                        <option value="{{ $seat->id }}" @if(old('Seat') == $seat->id) selected="selected" @endif > Row: {{ $seat->seatRow }} Seat: {{ $seat->seatNumber }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                                <tfoot>
                                <tr>
                                    <td class="col-md-1"><a href="{!! URL::to('productions/') !!}"
                                                            class="btn btn-primary">Continue Shopping</a></td>
                                    <td class="col-md-2 text-center"><strong>Total Tickets<br/>{{ Cart::count() }}</strong></td>
                                    <td class="col-md-1 text-center"><strong>Total £{{ Cart::total() }}</strong></td>
                                    <td class="col-md-3 text-right"><button type="submit" class="btn btn-success">
                                            Purchase Tickets
                                        </button></td>
                                </tr>
                                </tfoot>
                            </table>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection