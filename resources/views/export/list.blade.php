@extends('layouts.app')


@section('title', 'Accueil')

@section('css')
@endsection

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

        <table class="table table-sm" id="item">
        <thead>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Item Code</th>
                <th>Price</th>
                <th class="no-sort"></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>#</th>
                <th>Item Name</th>
                <th>Item Code</th>
                <th>Price</th>
                <th></th>
            </tr>
        </tfoot>
          <tbody>
            @foreach ($items as $go)
            <tr>
              <td>{{ $go->id }}</td>
              <td>{{ $go->item_name }}</td>
              <td>{{ $go->item_code }}</td>
              <td>{{ $go->item_price }}</td>
              <td><a href="http://127.0.0.1/test/blog/public/items-list/{{ $go->id }}" onclick="return confirm('Voulez-vous vraiment supprimer l\'item {{ $go->item_name }}')">Delete</a></td>
            </tr>
            @endforeach
          </tbody>
        </table>
    </div>
@endsection


@section('script')


@endsection