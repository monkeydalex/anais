@extends('layouts.app')

@section('title',  __('user.show.title'))

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="container">
        <h1>{{__('user.show.h1')}}</h1>
        <p>{{ $id }}</p>
        <ul>
        {{ Form::select('sites', $users->sites->pluck('code_site', 'id_site'), FALSE, ['class' => 'form-control', 'multiple' => 'multiple', 'name'=>'sites[]', 'id'=>'sites']) }}
        @foreach ($users->sites as $user)
            <li>{{ $user->code_site }} > {{ $user->nom_site }}</li>
        @endforeach
        </ul>
      </div>



@endsection


@section('script')

@endsection