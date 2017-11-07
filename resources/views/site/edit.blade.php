@extends('layouts.app')

@section('title',  __('site.edit.title'))

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="container">
        <h1>{{__('site.edit.h1')}}</h1>
        <!--
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
        -->
              <form method="POST" action="{{ route('sites.update', $site->id_site) }}">
                  {{ csrf_field() }}
                  {{ method_field('PUT') }}
              <div class="form-group">
                {{ Form::label('nom_site', 'Modifier le nom du site') }}
                <input id="nom_site" type="text" class="form-control{{ $errors->has('nom_site') ? ' is-invalid' : '' }}" name="nom_site" value="{{  $site->nom_site }}">
                <!--
                {{ Form::text('nom_site', old('nom_site'), ['class' => 'form-control', 'placeholder' => 'Ajouter le nom du site']) }}
                -->
                @if ($errors->has('nom_site'))
                  <div class="invalid-feedback">
                    {{ $errors->first('nom_site') }}
                  </div>
                @endif
              </div>
              <div class="form-group">
                {{ Form::label('code_site', 'Modifier le code du site') }}
                <input id="code_site" type="text" class="form-control{{ $errors->has('code_site') ? ' is-invalid' : '' }}" name="code_site" value="{{ $site->code_site }}">
                <!--
                {{ Form::text('code_site', old('code_site'), ['class' => 'form-control', 'placeholder' => 'Ajouter le code du site']) }}
                -->
                {!! $errors->first('code_site', '<div class="invalid-feedback">:message</div>') !!}
              </div>
        {{ Form::submit(__('site.create.send'), ['class' => 'btn btn-primary']) }}      
        {{ Form::close() }}
      </div>



@endsection


@section('script')

@endsection