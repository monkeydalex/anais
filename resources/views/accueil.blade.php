@extends('layouts.app')

@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="starter-template">
        <h1>Bootstrap starter template</h1>
        <p class="lead">Use this document as a way to quickly start any new project.<br> Hello {{ $name }}</p>
        URL => {{ url('user/profile') }}<BR>
        ASSET => {{ asset('img/photo.jpg') }}<BR>
        {{ Form::text('username') }}<br>
        {{ link_to_asset('foo/bar.zip', $title = "null", $attributes = array(), $secure = null) }}
      </div>
@endsection


@section('script')

@endsection