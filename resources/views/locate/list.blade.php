@extends('layouts.app')


@section('title', __('deploiement.title.meta'))

@section('css')
@endsection

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="container">
        <h1>{{__('deploiement.title.h1')}}</h1>
        <br>
        <table class="table table-sm" id="example">
          <!--
          <thead>
            <tr>
              <th><a href="{{ url('deploiement-list/nom_site/asc') }}">Site</a></th>
              <th><a href="{{ url('deploiement-list/nom_societe/asc') }}">Société</a></th>
              <th><a href="{{ url('deploiement-list/nom_type/asc') }}">Type</a></th>
            </tr>
          </thead>
        -->
        <thead>
            <tr>
                <th>Nom Site</th>
                <th>Nom Société</th>
                <th class="no-sort">Type</th>
                <th>Agent</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Nom Site</th>
                <th>Nom Société</th>
                <th>Type</th>
                <th>Agent</th>
            </tr>
        </tfoot>
          <tbody>
            @foreach ($joncs as $jonc)
            <tr>
              <td>{{ $jonc->nom_site }}</td>
              <td>{{ $jonc->nom_societe }}</td>
              <td>{{ $jonc->nom_type }}</td>
              <td>{{ $jonc->name }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection


@section('script')

@endsection