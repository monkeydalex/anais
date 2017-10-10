@extends('layouts.app')


@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="starter-template">
        <h1>Listing Déploiement</h1>
        <br>
        <table class="table table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Site</th>
              <th>Société</th>
              <th>Type</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($joncs as $jonc)
            <tr>
              <th scope="row">{{ $jonc->deploiement_id }}</th>
              <td>{{ $jonc->nom_site }}</td>
              <td>{{ $jonc->nom_societe }}</td>
              <td>{{ $jonc->nom_type }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection


@section('script')

@endsection