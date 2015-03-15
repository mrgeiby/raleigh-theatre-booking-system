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

                        <table class="table table-striped">
                            <thead>
                            <tr>
                                {{--<th>ID</th>--}}
                                <th>Performance</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                {{--<th>Updated</th>--}}
                                {{--<th>Created</th>--}}
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            {{--@foreach(Cart::content() as $row)--}}
                                {{--<tr>--}}
{{--                                    <td class="col-md-1">{{ $row->id }}</td>--}}
                                    {{--<td>--}}
                                        {{--<p><strong>{{ $row->name }}</strong></p>--}}

{{--                                        <p>{{ $row->options->has('size') ? $row->options->size : '' }}</p>--}}
                                    {{--</td>--}}
                                    {{--<td><input type="text" value="{{ $row->qty }}"></td>--}}
                                    {{--<td>£{{ $row->price }}</td>--}}
{{--                                    <td>{{ $row->subtotal }}</td>--}}
                                    {{--<td>--}}
                                        {{--<button type="button" class="btn btn-default btn-sm" aria-label="Left Align">--}}
                                            {{--<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>--}}
                                        {{--</button>--}}
                                        {{--<button type="button" class="btn btn-default btn-sm" aria-label="Left Align">--}}
                                            {{--<span class="glyphicon glyphicon-remove" aria-hidden="true"></span>--}}
                                        {{--</button>--}}
                                    {{--</td>--}}
                                {{--</tr>--}}
                            {{--@endforeach--}}

                            @foreach(Cart::content() as $row)
                            <tr>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-2 hidden-xs"><img src="http://placehold.it/100x100" alt="..." class="img-responsive"/></div>
                                        <div class="col-sm-10">
                                            <h4 class="nomargin">Performance</h4>
                                            <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
                                        </div>
                                    </div>
                                </td>
                                <td data-th="Price">£1.99</td>
                                <td data-th="Quantity">
                                    <input type="number" class="form-control text-center" value="1">
                                </td>
                                <td data-th="Subtotal" class="text-center">1.99</td>
                                <td class="actions" data-th="">
                                    <button class="btn btn-info btn-sm"><span class="glyphicon glyphicon-refresh" aria-hidden="true"></span></button>
                                    <button class="btn btn-danger btn-sm"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr class="visible-xs">
                                <td class="text-center"><strong>Total 1.99</strong></td>
                            </tr>
                            <tr>
                                <td><a href="{!! URL::to('productions/') !!}" class="btn btn-primary"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
                                <td colspan="2" class="hidden-xs"></td>
                                <td class="hidden-xs text-center"><strong>Total £1.99</strong></td>
                                <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
                            </tr>
                            </tfoot>
                        </table>

                            {{--<div class="container-fluid">--}}
                                {{--<div class="row">--}}
                                    {{--<div class="col-md-2 col-md-offset-10">--}}
                                        {{--Items: {{ Cart::count() }} <br />--}}
                                        {{--Total: £{{ Cart::total() }}--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}


                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-1 col-md-offset-11">
                                    {{--<div class="text-center"> {!! $data->render() !!}</div>--}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


