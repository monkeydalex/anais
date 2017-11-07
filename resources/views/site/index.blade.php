@extends('layouts.app')

@section('title',  __('site.index.title'))

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
      <div class="container">
        <h1>{{__('site.index.h1')}}</h1>
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
            @if(Session::has('update')) 
            <div class="alert alert-warning">
                {{ Session::get('update') }}
            </div>
            @endif
        <!--
                @if(Session::has('success'))
                    <div class="alert alert-success">{!! Session::get('success') !!}</div>
                @endif
        -->
        @foreach ($sites as $site)
          <div class="row">
            <div class="col-1">
              {{ $site->id_site }}
            </div>
            <div class="col">
              {{ $site->nom_site }}
            </div>
            <div class="col">
              {{ $site->code_site }}
            </div>
            <div class="col-auto">
                   <form class="form-horizontal" method="POST" action="{{ route('sites.destroy', $site->id_site) }}">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <div class="form-group">
                                <a class="btn btn-primary" href="{{ url('sites/'.$site->id_site.'/edit')}}" role="button">
                                    <i class="octicon octicon-pencil"></i>
                                </a>
                                <button type="submit" class="btn btn-danger">
                                    <span class="octicon octicon-trashcan"></span>
                                </button>
                        </div>
                    </form>
            </div>
          </div>
        @endforeach
      </div>



@endsection


@section('script')

@endsection