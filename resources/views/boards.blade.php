@extends('layouts.app')
@section('title')
    Mes tableaux
@endsection

@section('content')
<div class="container">

<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    Ajouter un nouveau tableau
  </button>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Nom du tableau</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form action="@route('table.store')" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="title">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                </div>
        </form>
      </div>
    </div>
  </div>

    <div class="d-flex flex-wrap ">
{{-- Affichage des tableaux --}}
        @foreach ($table as $item)
            <a href="@route('table.edit')/?tableId={{$item->id}}">
                <div class="d-flex justify-content-center align-items-center text-center" style="background-color: green; width: 150px; height:150px; margin: 30px">
                <h2> {{ $item->title }} </h2>
                </div>
            </a>
        @endforeach
    </div>
</div>

@endsection
