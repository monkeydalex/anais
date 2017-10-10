@extends('layouts.app')


@section('title', 'Accueil')

@section('sidebar')
    @parent

    <p>This is appended to the master sidebar.</p>
@endsection

@section('content')
    <div class="container">
      <h1>Liste Items</h1>
            @if(Session::has('delete')) 
            <div class="alert alert-success">
                {{ Session::get('delete') }}
            </div>
            @endif
      <p><a href="{{url('items/export/xls')}}" class="btn btn-success" role="button">Export</a></p>
      <table class="table">
          <thead>
            <tr>
              <th>#</th>
              <th>Item Name</th>
              <th>Item Code</th>
              <th>Itemp Price</th>
              <th>#</th>             
            </tr>
          </thead>
          <tbody>
            @foreach ($items as $go)
            <tr>
              <th scope="row">{{ $go->id }}</th>
              <td>{{ $go->item_name }}</td>
              <td>{{ $go->item_code }}</td>
              <td>{{ $go->item_price }}</td>
              <td><a href="http://127.0.0.1/test/blog/public/items-list/{{ $go->id }}" onclick="return confirm('Voulez-vous vraiment supprimer l\'item {{ $go->item_name }}')">Delete</a></td>
            </tr>
            @endforeach
            <tr>
              <td colspan="5">
                <div class="p-3 mb-2 bg-secondary text-white"><strong>{{ $total }}</strong> items dans la table</div>
              </td>
            </tr>
          </tbody>
      </table>
    </div>
@endsection


@section('script')

@endsection