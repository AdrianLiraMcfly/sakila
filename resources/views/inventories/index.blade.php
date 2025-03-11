@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inventories</h1>
        <a href="{{ route('inventories.create') }}" class="btn btn-primary">Add Inventory</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Film</th>
                    <th>Store</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inventories as $inventory)
                    <tr>
                        <td>{{ $inventory->film_id }}</td>
                        <td>{{ $inventory->store_id }}</td>
                        <td>
                            <a href="{{ route('inventories.edit', $inventory->inventory_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('inventories.destroy', $inventory->inventory_id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $inventories->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection