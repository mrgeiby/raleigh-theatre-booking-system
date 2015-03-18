@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Checkout</div>

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

                        {{--@foreach($basket as $row)--}}
                        {{--@if($row->qty > 1)--}}
                        {{--@for ($x = 1; $x <= $row->qty; $x++)--}}
                        {{--{{ $row }}--}}
                        {{--@endfor--}}
                        {{--@else--}}
                        {{--{{ $row }}--}}
                        {{--@endif--}}
                        {{--@endforeach--}}

                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                            <tr>
                                <th class="col-md-6 text-left">Performance</th>
                                <th class="col-md-1 text-center"></th>
                                <th class="col-md-1 text-center"></th>
                                <th class="col-md-1 text-center"></th>
                                <th class="col-md-3 text-center">Available Seats</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach(Cart::content() as $row)--}}
                            @foreach($basket as $row)
                                @if($row->qty > 1)
                                    @for ($x = 1; $x <= $row->qty; $x++)
                                        <tr>
                                            <td class="text-left">{{ $row->name }}</td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center"></td>
                                            <td class="text-center">
                                                <select>
                                                    <option></option>
                                                    @foreach($row->options->seats as $seat)
                                                        <option>Row: {{ $seat->seatRow }}
                                                            Seat: {{ $seat->seatNumber }}</option>
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
                                        <td class="text-center"></td>
                                        <td class="text-center">
                                            <select>
                                                <option></option>
                                                @foreach($row->options->seats as $seat)
                                                    <option>Row: {{ $seat->seatRow }}
                                                        Seat: {{ $seat->seatNumber }}</option>
                                                @endforeach

                                                {{--@foreach ($basket as $row)--}}
                                                {{--$tickets = Ticket::where('perfID', '=', $row->id)->get();--}}
                                                {{--@foreach ($tickets as $ticket)--}}
                                                {{--@foreach ($seats as $seat)--}}
                                                {{--@if ($ticket->seatID == $seat->id)--}}
                                                {{--{{ $seats->find($ticket->seatID)->delete() }};--}}
                                                {{--@endif--}}
                                                {{--@endforeach--}}
                                                {{--@endforeach--}}
                                                {{--@endforeach--}}

                                                {{--@foreach($row->seats as $seat)--}}
                                                    {{--<option>Row: {{ $seat->seatRow }} Seat: {{ $seat->seatNumber }}</option>--}}
                                                {{--@endforeach--}}
                                            </select>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class="col-md-1"><a href="{!! URL::to('productions/') !!}" class="btn btn-primary">Continue
                                        Shopping</a></td>
                                <td></td>
                                <td class="col-md-2 text-center"><strong>Total Tickets<br/> {{ Cart::count() }}
                                    </strong></td>
                                <td class="col-md-1 text-center"><strong>Total £{{ Cart::total() }}</strong></td>
                                <td class="col-md-2"><a href="{!! URL::to('basket/checkout') !!}"
                                                        class="btn btn-success btn-block">Checkout</a></td>
                            </tr>
                            </tfoot>
                        </table>

                        {{--@foreach($basket as $row)--}}
                            {{--{{ $row }}--}}
                            {{--{{ $row->options->seats }}--}}
                            {{-------------------------------}}
                        {{--@endforeach--}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection