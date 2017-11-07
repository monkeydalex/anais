@extends('layouts.app')

@section('title', 'Relation')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="starter-template">
        <h1>Relation N:N</h1>
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
      </div>
      <div>
        <div class="alert alert-secondary" role="alert"><strong>"User" appartient à plusieurs "Site"</strong></div>
        @foreach ($users as $user)
            <ul><strong>{{ $user->email }}</strong> appartient à {{$user->sites_count}} Site(s)
            @foreach ($user->sites as $site)
              <li>{{ $site->code_site }} / {{ $site->nom_site }}</li>
            @endforeach
            </ul>
        @endforeach
      </div>

      <div>
        <div class="alert alert-secondary" role="alert"><strong>"Site" appartient à plusieurs "User"</strong></div>
        @foreach ($sites as $site)
            <ul><strong>{{ $site->nom_site }}</strong>  appartient à {{$site->users_count}} Utilisateur(s)
            @foreach ($site->users as $user)
              <li>{{ $user->email }}</li>
            @endforeach
            </ul>
        @endforeach
      </div>
@endsection


@section('script')

@endsection