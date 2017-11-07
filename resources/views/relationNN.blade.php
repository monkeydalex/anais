@extends('layouts.app')

@section('title',  __('test_form.title'))

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="starter-template">
        <h1>{{__('test_form.title')}}</h1>
        <span class="iconic iconic-star" title="star" aria-hidden="true"></span>
        <!--
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
        -->
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

      <table class="table table-sm">
        <thead>
          <tr>
            @foreach ($sites as $site)
            <th colspan="4"><h3>{{ $site->nom_site }}</h3></th>
          </tr>   
        </thead>
        <tbody>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Email</th>
            <th scope="col">Name</th>
            <th scope="col">Date create</th>
          </tr>
          @foreach ($site->users as $user)
          <tr>
            <th scope="row">{{ $user->id }}</th>
            <td>{{ $user->email }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->created_at }}</td>
          </tr>
          @endforeach
          @endforeach
        </tbody>
      </table>



@endsection


@section('script')

@endsection