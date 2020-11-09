@extends('layouts.app')

@section('style')
<style>
.btn.group{
    background-color: white;
}
</style>
@section('title')
    @foreach ($tables as $item)
        {{$item->title}}
    @endforeach
@endsection
@section('content')
<div v-on:dblclick="ghostMethod($event)">
    {{-- ghoslist --}}
    <div  v-show="addListShow" class="ghostList" v-bind:style="{ top: y + 'px', left: x + 'px' }">
        <form  action="@route('col.store')" method="POST" v-on:submit="addListShow = false">
            @csrf
            <label for="addTitle">Ajouter une Liste</label>
            <input type="text" name="title" id="addTitle">
            <input type="hidden" name="tableId" value="{{ $table }}">
            <input type="submit">
        </form>
    </div>
    {{-- finghostlist --}}

    @foreach ($tables as $item)

    <div v-on:click="closeAll()" style="background-image: url('/assets/images/{{$item->image}}.jpg '); background-size: cover; height: 40rem; padding: 30px 20px; witdh: 100%">
    @endforeach


    <div class="d-flex flex-wrap"  >
        @foreach ($cols as $col)
        <div class="acjatable" v-on:click="closeAll()">
            <div class="text-center mr-2 border acjaccol">
            <div class="acjaColStyle">
                <label for="{{ $col->title }}"><p v-on:click="colTitle =! colTitle" v-show="!colTitle">{{ $col->title }}</p></label>
                <form v-show="colTitle" v-on:submit="colTile = false" action="@route('col.update')" method="ANY">
                    <input type="text" name="colupdate" id="{{ $col->title }}" value=" {{ $col->title }} ">
                    <input type="hidden" name="id" value="{{ $col->id }}">
                </form>
                <div>
                    <button v-on:click="listCol =! listCol" >...</button>
                    <a href="@route('col.delete')?id={{ $col->id }}" v-show="listCol"><button>supprimer</button></a>
                </div>
            </div>
<!-- Button trigger modal -->
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



    {{-- Modal --}}
    <div class="modal fade" id="a{{ $card->id }}" tabindex="-1" role="dialog" aria-labelledby="a{{ $card->id }}Title" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 v-show="!cardTitle" v-on:click="cardTitle =! cardTitle" class="modal-title cardScale" id="exampleModalLongTitle"> {{ $card->title }} </h5>
{{-- Changement title card --}}
            <form v-show="cardTitle" v-on:submit="cardTitle = false" action="@route('card.update')" method="ANY">
                <input type="text" name="cardupdate" id="{{ $card->title }}" value=" {{ $card->title }} ">
                <input type="hidden" name="id" value="{{ $card->id }}">
            </form>
{{-- Fin Changement title card --}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            @foreach ($coms as $com)
            @if ($com->card_id == $card->id)
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-3">
                        <div class="d-flex justify-content-between mx-2">
                            <p class="acja-auteur"> Auteur:      </p>
                            <p style="text-indent:20px"> {{ $com->user_name }}</p>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="d-flex justify-content-between mx-2 acja-com-lign">
                            <p class="acja-com-content">{{ $com->comment }}</p>
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="d-flex justify-content-between mx-2">
                            {{ $com->created_at->format('d-m-y H:i') }}
                        </div>
                    </div>
                        <div class="col">
                            <div class="d-flex justify-content-between mx-2" >
                            <a href="@route('com.delete')?id={{ $com->id }}&card_id={{ $com->card_id }}"><img class="acja-del" src="assets/symbols/basket.png"/><br></a>
                        </div>
                    </div>
                </div>
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
    {{-- Choose yours background --}}

    <div class="btn-group fixed-bottom">
        <button type="button" class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Choisir votre image de fond
        </button>
        <div class="dropdown-menu">

            <div class="d-flex align-items-center">
            <form action="@route('table.image')" method="GET">
                @for ($i = 1; $i <= 10; $i++)

                <div class="dropdown-item">
                    <input type="radio" id="fonds{{$i}}" name="image" value="fonds{{$i}}" style="visibility: hidden" onclick="this.form.submit()">
                    <label for="fonds{{$i}}"><img style="width: 100px;heigth:80px;" src="assets/images/fonds{{$i}}.jpg" alt=""></label>
                    <input type="hidden" name="tableId" value="{{ $table }}">
                </div>

                @endfor
            </form>

        </div>
    </div>

    {{-- End background --}}

</div>
</div>
@endsection

