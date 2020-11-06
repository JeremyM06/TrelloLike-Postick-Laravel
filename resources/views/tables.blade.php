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

                    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
    <div class="text-center">
        {{ $card->title }}
    </div>
  </button>

   {{-- Modal --}}
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Laissez un commentaire</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        @foreach ($coms as $com)
            @if ($com->card_id == $card->id)
                {{ $com->comment }}
            @endif
        @endforeach

        <form action="@route('com.store')" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="text" name="title">
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

@endsection
