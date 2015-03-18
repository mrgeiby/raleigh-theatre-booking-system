@extends('app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <div class="panel-heading">Basket</div>

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

                        <table class="table table-striped table-hover table-responsive">
                            <thead>
                            <tr>
                                <th class="col-md-7 text-left">Performance</th>
                                <th class="col-md-1 text-center">Quantity</th>
                                <th class="col-md-1 text-center">Price</th>
                                <th class="col-md-1 text-center">Subtotal</th>
                                <th class="col-md-2 text-right"></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach(Cart::content() as $row)
                                <tr>
                                    <td class="text-left">{{ $row->name }}</td>
                                    <td class="text-center">{{ $row->qty }}</td>
                                    <td class="text-center">{{ $row->price }}</td>
                                    <td class="text-center">{{ $row->subtotal }}</td>
                                    <td class="text-center">
                                        <a href="{!! URL::to('basket/') !!}/{{ $row->rowid }}/remove"
                                           class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove"
                                                                               aria-hidden="true"></span></a>
                                    </td>
                                </tr>
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
                                <td class="col-md-2"><a href="{!! URL::to('basket/checkout') !!}" class="btn btn-success btn-block">Checkout</a></td>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


