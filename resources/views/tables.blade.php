@extends('layouts.app')

@section('style')
<style>
    body{
        background-image: url("https://i.pinimg.com/originals/ab/0e/61/ab0e6142a4c03a09db9f39939aef9519.jpg");
        background-size: cover;


    }

</style>
@section('title')
    @foreach ($tables as $item)
        {{$item->title}}
    @endforeach
@endsection
@section('content')

<div class="d-flex flex-wrap" v-on:dblclick="ghostMethod($event)">
    @foreach ($cols as $col)
    <div class="acjatable" v-on:click="closeAll()">
        <div class="text-center mr-2 border acjaccol">
        <div class="acjaColStyle">
            <p v-on:click="colTitle =! colTitle" v-show="!colTitle">{{ $col->title }}</p>
            <form v-show="colTitle" v-on:submit="colTile = false" action="@route('col.update')" method="ANY">
                <input type="text" name="colupdate" value=" {{ $col->title }} ">
                <input type="hidden" name="id" value="{{ $col->id }}">
            </form>
            <div>
                <button v-on:click="listCol =! listCol" >...</button>
                <a href="@route('col.delete')?id={{ $col->id }}" v-show="listCol"><button>supprimer</button></a>
            </div>
        </div>

            @foreach ($cards as $card)
                @if ($card->col_id == $col->id)
                <div class="acjaCardStyle">
                    <div class="d-flex flex-column" style="width: 90%;text-align: left;" data-toggle="modal" data-target="#a{{ $card->id }}">
                        <div class="my-2">
                            {{ $card->title }}

                        </div>
                        <div>

                            @if ($card->numberOfCom > 0 )
                            <img class="imgcom" src="assets/symbols/com.png" alt="symbol comment">
                                {{ $card->numberOfCom }}
                            @endif
                        </div>

                    </div>
                      <div class="acjaCardStyleImg">
                        <img v-on:click="listCard =! listCard" src="assets/symbols/pencil.png" alt="modifier">
                        <a href="@route('card.delete')?id={{ $card->id }}" v-show="listCard"><button>supprimer</button></a>
                    </div>
                </div>
                                    <!-- Button trigger modal -->


   {{-- Modal --}}
  <div class="modal fade" id="a{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="a{{ $card->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle"> {{ $card->title }} </h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @foreach ($coms as $com)
            @if ($com->card_id == $card->id)
            <div class="d-flex justify-content-between mx-2">
                 {{ $com->comment }}
                 {{ $com->user_name }}
                 {{ $com->created_at }}
                <a href="@route('com.delete')?id={{ $com->id }}&card_id={{ $com->card_id }}" ><button>supprimer</button></a>
            </div>
            @endif
        @endforeach

        <form action="@route('com.store')" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="title" placeholder="Laissez un commentaire">
                    <input type="hidden" name="card_id" value=" {{ $card->id }} ">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <input type="submit" class="btn btn-primary" value="Enregistrer">
                </div>
        </form>

      </div>
    </div>
  </div>

                @endif
            @endforeach
<hr>
            <form action="@route('card.store')" method="POST">
                @csrf
                <label for="">Ajouter une cards</label>
                <input type="text" name="title">
                <input type="submit">
                <input type="hidden" name="col_id" value=" {{ $col->id }} ">
            </form>
        </div>
    </div>
    @endforeach

    <button v-on:click="show =! show" v-show="!show" style="max-height: 30px">Ajouter une liste</button>

        <div >
            <form v-show="show"  action="@route('col.store')" method="POST" v-on:submit="show = false">
                @csrf
                <label for="">Ajouter une Liste</label>
                <input type="text" name="title">
                <input type="hidden" name="tableId" value="{{ $table }}">
                <input type="submit">
                <div style="height: 100%;width: 100%; position: absolute; z-index:1;" v-on:click="show = false"></div>
            </form>
        </div>
    </div>

    <div  v-show="addListShow" class="ghostList" v-bind:style="{ top: y + 'px', left: x + 'px' }">
        <form  action="@route('col.store')" method="POST" v-on:submit="addListShow = false">
            @csrf
            <label for="">Ajouter une Liste</label>
            <input type="text" name="title">
            <input type="hidden" name="tableId" value="{{ $table }}">
            <input type="submit">
            <div style="height: 100%;width: 100%; position: absolute; z-index:1;" v-on:click="show = false"></div>
        </form>
    </div>
@endsection

