@extends('layouts.app')
<?php $value = session('coltest');

?>
@section('content')

<div class="d-flex">
    @foreach ($cols as $col)
    <div class="text-center mr-2 border">
        <div class="bg-warning">
            {{ $col->title }}
        </div>

            @foreach ($cards as $card)
                @if ($card->col_id == $col->id)
                    <div class="text-center border">
                        {{ $card->title }}
                    </div>
                @endif
            @endforeach

            {{-- <button>Ajouter une cards</button> --}}
            <form action="@route('card.store')" method="POST">
                @csrf
                <label for="">Ajouter une cards</label>
                <input type="text" name="title">
                <input type="submit">
                <input type="hidden" name="col_id" value=" {{ $col->id }} ">
            </form>

    </div>
    @endforeach

    <hr><hr><hr>
</div>
    <form action="@route('col.store')" method="POST">
        @csrf
        <label for="">Ajouter une Liste</label>
        <input type="text" name="title">
        <input type="hidden" name="tableId" value="{{ $table }}">
        <input type="submit">
    </form>
<p> {{ $value->id }} </p>

Macarte

id de mon tableau: {{ $table }}

@endsection
