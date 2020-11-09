@extends('layouts.app')
@section('style')
<style>
    body{

	background-image: url("https://proaugust.com/images/slider/start1.jpg");
	background-position: center center;
}
</style>

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

    <div class="container-fluid">
{{-- Affichage des tableaux --}}
        <div class="d-flex flex-wrap flex-2 my-2">
            @foreach ($table as $item)
                @if ($item->team == 0)
                <div class="d-flex flex-column align-items-center mx-2 border acjaBoards" style="background-image: url('assets/images/{{$item->image}}.jpg');background-size: cover;">
                    <a href="@route('table.destroy')/?tableId={{$item->id}}">supprimer</a>
                    <a href="@route('table.edit')/?tableId={{$item->id}}">
                        <div class="d-flex justify-content-center align-items-center text-center"  style="background-image: url('assets/images/{{$item->image}}.jpg');background-size: cover;width: 200px;heigth: 200px;padding:20px;margin:10px">
                            <h2> {{ $item->title }} </h2>
                        </div>
                    </a>
                {{-- Debut Partage --}}
                <div>
                    <button v-on:click="partage =! partage" v-show="!partage" type="button" class="btn">Partager avec...</button>
                    <button v-on:click="partage =! partage" v-show="partage">Partager</button>
                        <div v-show="partage">
                            <form action="@route('table.update')" method="GET">
                                <label for="user"> {{ $item->title }} avec</label>
                                <input v-model="mail"  type="text" v-on:keyup="isAMail(mail)" :class="{mjjalertform : mailShow}" name="email" placeholder="mail">
                                <p class="textFormAlert" v-show="mailShow">Le mail n'est pas conforme</p>
                                <input type="hidden" name="tableId" value="{{$item->id}}">
                            </form>
                        </div>
                    </div>
                </div>
                {{-- Fin Partage --}}
                @endif
            @endforeach
        </div>
        <div class="my-2 mx-2">
            <h4>Mes tableaux partagés</h4>
            <div class="d-flex flex-column" style="width: 250px; min-heigth: 500px;">
            @foreach ($table as $item)
                @if ($item->team > 0)
                    @if ($item->user_id == Auth::user()->id)
                    <a href="@route('table.destroy')/?tableId={{$item->id}}">Supprimer</a>
                    @endif
                    <a href="@route('table.edit')/?tableId={{$item->id}}">
                        <div class="d-flex justify-content-center align-items-center text-center" style="background-image: url('assets/images/{{$item->image}}.jpg');background-size: cover;">
                            <h2> {{ $item->title }} </h2>
                        </div>
                    </a>
                @endif
            @endforeach
            </div>
            <div class="d-flex flex-column" style="max-width: 250px; min-heigth: 250px;">
            @foreach ($tableTeam as $element)
                <a href="@route('table.edit')/?tableId={{$element->id}}">
                    <div class="d-flex justify-content-center align-items-center text-center" style="background-image: url('assets/images/{{$item->image}}.jpg');background-size: cover;">
                    <h2> {{ $element->title }} </h2>
                    </div>
                </a>
            @endforeach
        </div>
        </div>
    </div>
</div>

@endsection

