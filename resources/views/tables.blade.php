@extends('layouts.app')
@section('title')
    @foreach ($tables as $item)
        {{$item->title}}
    @endforeach
@endsection
@section('content')

<div class="d-flex">
    @foreach ($cols as $col)
    <div class="text-center mr-2 border">
        <div class="bg-warning">
            {{ $col->title }}
        </div>

            @foreach ($cards as $card)
                @if ($card->col_id == $col->id)
                <div>
                    {{ $card->title }}
                    <a href="@route('card.delete')?id= {{ $card->id }} "><button>supprimer</button></a>
                </div>

        @foreach ($coms as $com)
            @if ($com->card_id == $card->id)
                {{ $com->comment }}
            @endif
        @endforeach

        <form action="@route('com.store')" method="POST">
                @csrf
                <input type="text" name="title">
                <input type="hidden" name="card_id" value=" {{ $card->id }} ">
        </form>
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


</div>
    <form v-show="test" action="@route('col.store')" method="POST">
        @csrf
        <label for="">Ajouter une Liste</label>
        <input type="text" name="title">
        <input type="hidden" name="tableId" value="{{ $table }}">
        <input type="submit">
    </form>
    <button v-on:click="test =! test">Test vue click</button>
@endsection
