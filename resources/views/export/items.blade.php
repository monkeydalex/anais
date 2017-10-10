@extends('layouts.app')


@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="container">
      <h1>Import</h1>
                  @if(Session::has('insert')) 
                  <div class="alert alert-success">
                      {{ Session::get('insert') }}
                  </div>
                  @endif
          <form action="{{url('items/import')}}" method="post" enctype="multipart/form-data">
            {{csrf_field()}}
              <div class="form-group">
                <label for="exampleFormControlFile1">Fichier Import CSV</label>
                <input type="file" class="form-control-file" id="imported-file" name="imported-file">
                <br />
                <button class="btn btn-primary" type="submit">Import</button>
              </div>
          </form>
    </div>
@endsection


@section('script')

@endsection