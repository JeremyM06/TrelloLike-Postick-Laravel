@extends('layouts.app')

@section('content')
<form action="@route('table.store')" method="POST">
    @csrf
    <label for="">tableau</label>
    <input type="text" name="title">
    <input type="submit">
</form>

<div>
    @foreach ($table as $item)
        <div>
            <h2> {{ $item->title }} </h2>
            <a href="@route('col.index')/?tableId={{$item->id}}">Ajouter une colonne</a>
            <div>
                @foreach ($cols as $item)
                    <p>{{ $item->title }}</p>
                @endforeach
            </div>
        </div>
    @endforeach
</div>

@endsection
