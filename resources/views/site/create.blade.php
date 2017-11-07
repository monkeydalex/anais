@extends('layouts.app')

@section('title',  __('site.create.title'))

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="container">
        <h1>{{__('site.create.h1')}}</h1>
        <!--
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
        -->
        {{ Form::open(['url' => 'sites']) }}
              <div class="form-group">
                {{ Form::label('nom_site', 'Ajouter le nom du site') }}
                <input id="nom_site" type="text" class="form-control{{ $errors->has('nom_site') ? ' is-invalid' : '' }}" name="nom_site" value="{{ old('nom_site') }}">
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
                {{ Form::label('code_site', 'Ajouter le code du site') }}
                <input id="code_site" type="text" class="form-control{{ $errors->has('code_site') ? ' is-invalid' : '' }}" name="code_site" value="{{ old('code_site') }}">
                <!--
                {{ Form::text('code_site', old('code_site'), ['class' => 'form-control', 'placeholder' => 'Ajouter le code du site']) }}
                -->
                {!! $errors->first('code_site', '<div class="invalid-feedback">:message</div>') !!}
              </div>
              <!--
                <div class="form-group">
                  {{ Form::label('code_site', 'Ajouter le code du site') }}
                  <input id="code_site" type="text" class="form-control{{ $errors->has('code_site') ? ' is-invalid' : '' }}" name="code_site" value="{{ old('code_site') }}">
                  
                  {{ 
                    Form::select('animal', array(
                        'Cats' => array('1' => 'British', '2' => 'Bengal'),
                        'Dogs' => array('1' => 'Jack Russel', '2' => 'Cavalier King Charles'),
                        ), 'NULL', ['class' => 'form-control']) 
                  }}
                  
                  {!! $errors->first('code_site', '<div class="invalid-feedback">:message</div>') !!}
                </div>
              -->
        {{ Form::submit(__('site.create.send'), ['class' => 'btn btn-primary']) }}      
        {{ Form::close() }}
      </div>



@endsection


@section('script')

@endsection