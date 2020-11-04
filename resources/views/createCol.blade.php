
@extends('layouts.app')

@section('content')
<form action="@route('col.store')" method="POST">
    @csrf
    <label for="">Columns</label>
    <input type="text" name="title">
    <input type="submit">
</form>
@endsection
