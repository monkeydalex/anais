@extends('layouts.app')

@section('title',  __('user.index.title'))

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="container">
        <h1>{{__('user.index.h1')}}</h1>
            @if(Session::has('delete')) 
            <div class="alert alert-danger">
                {{ Session::get('delete') }}
            </div>
            @endif
            @if(Session::has('insert')) 
            <div class="alert alert-success">
                {{ Session::get('insert') }}
            </div>
            @endif
        <!--
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
        -->
        <table class="table table-responsive-xl">
          <thead>
            <tr>
              <th>#</th>
              <th>Nom</th>
              <th>Email</th>
              <th>Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($users as $user)
              <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <form class="form-horizontal" method="POST" action="{{ route('users.destroy', $user->id) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                                <a class="btn btn-primary" href="{{ url('users/'.$user->id)}}" role="button">
                                    <i class="octicon octicon-eye"></i>
                                </a>
                                <a class="btn btn-warning" href="{{ url('users/'.$user->id.'/edit')}}" role="button">
                                    <i class="octicon octicon-pencil"></i>
                                </a>
                                <button type="submit" class="btn btn-danger">
                                    <span class="octicon octicon-trashcan"></span>
                                </button>
                        </div>
                    </form>
                </td>
              </tr>  
              @endforeach
        </table>
      </div>



@endsection


@section('script')

@endsection