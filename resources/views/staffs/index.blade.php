@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Staffs</h1>
        <a href="{{ route('staffs.create') }}" class="btn btn-primary">Add Staff</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Staff ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Position</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($staffs as $staff)
                    <tr>
                        <td>{{ $staff->staff_id }}</td>
                        <td>{{ $staff->first_name }}</td>
                        <td>{{ $staff->last_name }}</td>
                        <td>{{ $staff->address_id }}</td>
                        <td>{{ $staff->email }}</td>
                        <td>{{ $staff->store_id }}</td>
                        <td>{{ $staff->active }}</td>
                        <td>{{ $staff->username }}</td>
                        <td>
                            <a href="{{ route('staffs.edit', $staff->staff_id) }}" class="btn btn-primary">Edit</a>
                            <form action="{{ route('staffs.destroy', $staff->staff_id) }}" method="POST" style="display: inline;">
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
            {{ $staffs->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection