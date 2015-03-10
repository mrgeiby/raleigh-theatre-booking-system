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

                        @foreach ($data as $productionType)
                            @if ($productionType->production->count() != 0)
                                <h1>{{ $productionType->prodType }}</h1>

                                <ul>
                                    @foreach($productionType->production as $production)
                                        <h3>{!! HTML::linkAction('ProductionController@show', $production->prodName, $production->prodSlug) !!}</h3>
                                        <i>Released: {{ $production->created_at }}</i>
                                        <p>{{ $production->prodDescription }}</p>
                                    @endforeach
                                </ul>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection