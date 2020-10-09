
@foreach ($contacts as $item)
    @if (isset($item->messages[0]))
        {{$item->messages[0]->priority}}
    @endif
@endforeach