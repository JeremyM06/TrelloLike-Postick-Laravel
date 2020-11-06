@extends('layouts.app')

@section('content')



<div class="d-flex">
    @foreach ($cols as $item)
    <div>
{{ $item->title }}
    </div>

    @endforeach


</div>

Macarte



@endsection
