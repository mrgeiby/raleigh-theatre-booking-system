@if ($data->count() == 0)
    <p>No production was found.</p>
@else
    @foreach ($data as $production)
        <ul>
            <h3>{!! HTML::linkAction('ProductionController@show', $production->prodName,
                $production->prodSlug) !!}</h3>
            <i>Released: {{ $production->created_at }}</i>

            <p>{{ $production->prodDescription }}</p>
        </ul>
    @endforeach
@endif