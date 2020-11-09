@extends('layouts.app')
@section('style')
<style>
    body{

	background-image: url("https://proaugust.com/images/slider/start1.jpg");
    background-position: center center;
}
.my-2  h4 {
    color: wheat;

}
.d-flex {
    margin-bottom: 10px;

}
.acjaboard {
    background-size: cover;
    width: 250px;
    height: 250px;
}

.share-button {
 width:150px;
 margin-left:5px;
 border-radius: 10px;
 background-color: wheat;
 box-shadow:1px 1px 1px black;
 cursor:pointer;
}
.label-user {
    color: ghostwhite;
}
</style>

@section('title')
    Mes tableaux
@endsection

@section('content')
<div class="container">



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
                <div class="d-flex flex-column mx-2 border">
                    <a href="@route('table.edit')/?tableId={{$item->id}}">
                        <div class="d-flex justify-content-center align-items-center text-center acjaboard"  style="background-image: url('assets/images/{{$item->image}}.jpg');"
                            >
                            <h2> {{ $item->title }} </h2>
                        </div>
                    </a>

                {{-- Debut Partage --}}
                <div class="share">
                    <button v-on:click="partage =! partage" v-show="!partage" class="share-button" type="button" class="btn">Partager avec...</button>
                    <button v-on:click="partage =! partage" v-show="partage" class="share-button">Partager</button>
                        <div v-show="partage">
                            <form action="@route('table.update')" method="GET" class="d-flex flex-column">
                                <label for="user" class="label-user"> {{ $item->title }} avec : </label>
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
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
                Ajouter un nouveau tableau
            </button>
                </div>
            </div>
            <div class="my-2 mx-2">
            <h4>Mes tableaux partagés</h4>

            @foreach ($table as $item)
                @if ($item->team > 0)
                    <a href="@route('table.edit')/?tableId={{$item->id}}">
                        <div class="d-flex justify-content-center align-items-center text-center border acjaboard" style="background-image: url('assets/images/{{$item->image}}.jpg')">
                            <h2> {{ $item->title }} </h2>
                        </div>
                    </a>
                @endif
            @endforeach
            @foreach ($tableTeam as $element)
                <a href="@route('table.edit')/?tableId={{$element->id}}">
                    <div class="d-flex justify-content-center align-items-center text-center border acjaboard" style="background-image: url('assets/images/{{$element->image}}.jpg')">
                    <h2> {{ $element->title }} </h2>
                    </div>
                </a>
            @endforeach

        </div>

        <!-- Button trigger modal -->


@endsection

