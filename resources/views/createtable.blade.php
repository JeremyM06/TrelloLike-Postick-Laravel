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
            <h6> {{ $item->title }} </h6>
            <a href="@route('col.index')/?table={{$item->id}}">Ajouter une colonne</a>
            <div>

            </div>
        </div>
    @endforeach
</div>

@endsection
