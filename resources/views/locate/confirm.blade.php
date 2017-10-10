@extends('layouts.app')


@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="starter-template">
        @if(Session::has('insert')) 
        <div class="alert alert-success">
            {{ Session::get('insert') }}
        </div>
        @endif

        @if(Session::has('update')) 
        <div class="alert alert-info">
            {{ Session::get('update') }}
        </div>
        @endif

      </div>
@endsection


@section('script')


@endsection