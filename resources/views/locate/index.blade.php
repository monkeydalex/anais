@extends('layouts.app')


@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="starter-template">
        <h1>Formulaire Déploiement</h1>
        <div>
            {{ Form::open(['url' => 'deploiement']) }}
            {{ csrf_field() }}
              <div class="form-group">
                {{ Form::label('site', 'Selectionnez le site') }}
                <select class="form-control" id="site" name="site">
                    @foreach ($sites as $site)
                    <option value="{{ $site->id_site }}">{{ $site->nom_site }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                {{ Form::label('societe', 'Selectionnez la societé') }}
                <select class="form-control" id="societe" name="societe">
                    @foreach ($societes as $societe)
                    <option value="{{ $societe->id_societe }}">{{ $societe->nom_societe }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                {{ Form::label('type', 'Selectionnez le type') }}
                <select class="form-control" id="type" name="type">
                    @foreach ($types as $type)
                    <option value="{{ $type->id_type }}">{{ $type->nom_type }}</option>
                    @endforeach
                </select>
              </div>
              <div class="form-group">
                {{ Form::label('latitude', '') }}
                {{ Form::text('latitude', '', ['class' => 'form-control', 'placeholder' => 'Latitude']) }}
                <small id="latitudeHelp" class="form-text text-muted">La latitude correspond aux coordonnées Y</small>
              </div>
              <div class="form-group">
                {{ Form::label('longitude', '') }}
                {{ Form::text('longitude', '', ['class' => 'form-control', 'placeholder' => 'Longitude']) }}
                <small id="longitudeHelp" class="form-text text-muted">La longitude correspond aux coordonnées X</small>
              </div>
              {{ Form::submit('Envoyer', ['class' => 'btn btn-primary']) }}
            {{ Form::close() }}
        </div>
      </div>
@endsection


@section('script')

<script>
var x = document.getElementById("error");

window.onload(getLocation()); // Récupération des coordonnées au chargement de la page

function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    /*
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "<br>Longitude: " + position.coords.longitude;
    */

    $("#latitude").val(position.coords.latitude);
    $("#longitude").val(position.coords.longitude);

}

function showError(error) {
    switch(error.code) {
        case error.PERMISSION_DENIED:
            x.innerHTML = "User denied the request for Geolocation."
            break;
        case error.POSITION_UNAVAILABLE:
            x.innerHTML = "Location information is unavailable."
            break;
        case error.TIMEOUT:
            x.innerHTML = "The request to get user location timed out."
            break;
        case error.UNKNOWN_ERROR:
            x.innerHTML = "An unknown error occurred."
            break;
    }
}

</script>

@endsection