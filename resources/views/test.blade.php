@extends('layouts.app')

@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
        <pre>{{ var_dump(Session::all()) }}</pre>
        <p class="lead">Use this document as a way to quickly start any new project.<br></p>
      </div>
@endsection


@section('script')

@endsection