@extends('layouts.app')



@section('content')




<div class="d-flex flex-wrap " style="display: flex;justify-content: center;align-items: center;">

    <div class="card">
        <h5 class="card-header" style="text-align: center;background-color: lightgrey;">Votre Profil</h5>
        <div class="card-body">
          <h5 class="card-title" style="text-align: center;">Informations actuelles</h5>
          <p> @foreach ($user as $item)
            <div>
                <p class="card-text">Votre nom : {{ $item->name }} </p>
                    <p class="card-text">Votre email : {{ $item->email }} </p>
            </div>
    @endforeach</p>
        <p class="card-text"> Si vous souhaitez les modifier, cliquer sur " Mettre à jour votre profil". </p>
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
        Mettre à jour votre profil
      </button>
        </div>
      </div>


</div>

<form action="@route('profile.update')" method="POST">


    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header" style="text-align: center;background-color: lightgrey;">
              <h5 class="modal-title text-center" id="exampleModalLongTitle" style="    font-family: 'Lobster', cursive;">Nouvelles informations</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            @foreach ($user as $item)
                <form action="@route('profile.update')" method="POST">
                    <div class="modal-body">
                        @csrf

                        <p class="card-text" style="font-family: 'Dancing Script', cursive;">Votre Nom : </p>
                        <input type="text" name="name">

                        <br>
                        <br>
                        <p class="card-text" style="font-family: 'Dancing Script', cursive;">Votre Email : </p>
                        <input type="email" name="email">
                        <br>
                        <br>
                        <p class="card-text" style="font-family: 'Dancing Script', cursive;">Votre nouveau mot de passe : </p>
                        <input type="password" name="password">
                        <br>
                        <br>
                        <p class="card-text" style="font-family: 'Henny Penny', cursive;">Confirmer votre mot de passe : </p>
                        <input type="password" name="password_confirmation">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <input type="submit" class="btn btn-primary" value="Enregistrer">
                    </div>
            </form>

            @endforeach

          </div>
        </div>
      </div>
</form>

@endsection
